<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WritingProjects extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lr_writing_projects';
	
	// Setup event bindings...
	/*public static function boot()
	{
		 parent::boot();
		 
		 WritingProjects::deleted(function($project){
			$path	=	public_path()."\\uploads\\profiles\\users\\".$dox->user_id."\\mydocuments\\".$dox->id."\\".$dox->file_name; 
			if(file_exists($path))
			{
				unlink($path);
			}			
		 });
	}*/
	
	
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
	
	public function scriptFile()
	{
		return $this->belongsTo('App\Models\Documents','script_id','id');
	}
	
	public function profile()
	{
		return $this->belongsTo('App\Models\Profile','profile_id','id');
	}
	
	public function SaveNew($scripts,$profile,$request)
	{
		///store update or created projects'id in array
		$SArray	=	[];
		
		foreach($scripts as $key=>$script)
		{
			$WritingProject	=	((int) $script[id]) ? WritingProjects::find($script[id]) : new WritingProjects;
					
			$WritingProject->profile_id	=	$profile->id;
			$WritingProject->title	=	$script['title'];
			$WritingProject->form	=	$script["form"];
			$WritingProject->genre	=	$script["genre"];
			$WritingProject->subgenre	=	$script["subgenre"];
			$WritingProject->pages	=	$script["pages"];
			$WritingProject->logline	=	$script["logline"];
			$WritingProject->status	=	$script["status"];
			$WritingProject->permissions	=	($script["permissions"] == 'View' ) ? 1 : 0  ;
			$fileStatus				=	$script["script_file_status"];
			
			$WritingProject->save();
			
			if($request->hasFile("scriptFile.$key") &&  $fileStatus == 'change')
			{
				$scriptfile	=	$request->file("scriptFile.$key");
				if($scriptfile->isValid())
				{	
					$docData	=	array(
										'title'=>$script['title'],
										'type'=>'script',
										'description'=>'Uploaded with Your profile writing projects  "'.$script['title'].'"'
										);
					
					$document	=	Documents::SaveDocuments($docData,$scriptfile,$profile->user_id);
					
					if($document)
					{						
						$WritingProject->script_id = $document;
						$WritingProject->save();
					}
				}
			}
			if(!empty($WritingProject->script_id) && $fileStatus == 'no-select')
			{
				
				$WritingProject->script_id	=	0;
				$WritingProject->save();
			}
			
			$SArray[]	=	$WritingProject->id;
		}
		
		//tottal Script
		$twp	=	$profile->WrittingProjects()->get();
		
		$deletedWP	=	$twp->filter(function($value,$index) use($SArray){
			return !in_array($value->id,$SArray);
		});
		
		$deletedWP->map(function($value,$index){
			$value->delete();
		});	
		
		return true;
	}
}
