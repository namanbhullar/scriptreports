<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use File;

use Html;


class FeaturedProjets extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lr_featured_projects';
	
	
	
	 /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
	protected $casts = [
        'form' => 'array',
		'genre'=>'array',
		'subgenre'=>'array',
    ];
	
	
	// Setup event bindings...
	public static function boot()
    {
        parent::boot(); 
		
		FeaturedProjets::deleted(function($project){
			$path	=	public_path()."\\uploads\\profiles\\users\\".$project->profile->user_id."\\projects\\".$project->id; 
			if(file_exists($path))
			{
				File::delete($path);
			}			
		 });		
    }
	
	public function profile()
	{
		return $this->belongsTo('App\Models\Profile','profile_id','id');
	}
	
	public function scriptFile()
	{
		return $this->belongsTo('App\Models\Documents','script_id','id');
	}
	
		
	public function SaveNew($projects,$profile,$request)
	{
		///store update or created projects'id in array
		$PArray	=	[];
		
		foreach($projects as $key=>$project)
		{
			$featuredproject	=	((int) $project[id]) ? FeaturedProjets::find($project[id]) : new FeaturedProjets;
					
			$featuredproject->profile_id	=	$profile->id;
			$featuredproject->title			=	$project['title'];
			$featuredproject->form			=	$project["form"];
			$featuredproject->release_date	=	$project["release_date"];
			$featuredproject->minutes		=	$project["minutes"];
			$featuredproject->rating		=	$project["rating"];
			$featuredproject->genre			=	$project["genre"];
			$featuredproject->subgenre		=	$project["subgenre"];
			$featuredproject->brief			=	$project["brief"];
			$featuredproject->link			=	$project["link"];
			
			$ScriptFilestatus				=	$project["script_file_status"];
			$PosterFilestatus				=	$project["poster_file_status"];
			
			$featuredproject->save();
			
			if($request->hasFile("projectPoster.$key") && $PosterFilestatus == 'change' )
			{
				$poster	=	$request->file("projectPoster.$key");
				if($poster->isValid())
				{
					$destinationPath    = 'public/uploads/profiles/users/'.$profile->user_id.'/projects/'.$featuredproject->id;
					$name	=	$poster->getClientOriginalName();
					
					if($poster->move($destinationPath,$name))
					{
						if(!empty($featuredproject->poster) && file_exists($destinationPath."/".$featuredproject->poster))
						{
							unlink($destinationPath."/".$featuredproject->poster);
						}
						
						$featuredproject->poster = $name;
						$featuredproject->save();
					}
				}
			}
			
			if(!empty($featuredproject->poster) && $PosterFilestatus == 'no-select')
			{
				$destinationPath    = 'public/uploads/profiles/users/'.$profile->user_id.'/projects/'.$featuredproject->id."/".$featuredproject->poster;
				if(file_exists($destinationPath))
				{
					unlink($destinationPath);
					$featuredproject->poster = "";
					$featuredproject->save();
				}
			}
			
			if($request->hasFile("projectScript.$key") && $ScriptFilestatus == 'change')
			{
				$script	=	$request->file("projectScript.$key");
				if($script->isValid())
				{	
					$docData	=	array(
										'title'=>$project['title'],
										'type'=>'script',
										'description'=>'Uploaded with Your profile Feature Projects  "'.$project['title'].'"'
										);
					
					$document	=	Documents::SaveDocuments($docData,$script,$profile->user_id);
					
					if($document)
					{						
						$featuredproject->script_id = $document;
						$featuredproject->save();
					}
				}
			}
			
			if(!empty($featuredproject->script_id) && $ScriptFilestatus == 'no-select')
			{
			
				$featuredproject->script_id	=	0;
				$featuredproject->save();
			}
			
			$PArray[]	=	$featuredproject->id;
		}
		
		//tottal Projects 
		$tfp	=	$profile->FeatureProjects()->get();
		
		$deletedFP	=	$tfp->filter(function($value,$index) use ($PArray){
			return !in_array($value->id,$PArray);
		});
		
		$deletedFP->map(function($value,$index){
			$value->delete();
		});	
		
		return true;
	}
}
