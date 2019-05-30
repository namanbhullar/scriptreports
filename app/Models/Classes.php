<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lr_classes';
	
	
	/**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'category' => 'array',
    ];
	
	// Setup event bindings...
	public static function boot()
    {
        parent::boot(); 
		
		Classes::deleted(function($classess){
			$path	=	public_path()."\\uploads\\profiles\\users\\".$classess->profile->user_id."\\projects\\".$classess->id; 
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
	
	public function SaveNew($classes,$profile,$request)
	{
		$CArray	=	[];
		//dd($profile);
		foreach($classes as $key=>$classe)
		{
			$ClassesObj	=	((int) $classe[id]) ? Classes::find($classe[id]) : new Classes();
				//dd($classe[id]);	
			$ClassesObj->profile_id	=	$profile->id;
			$ClassesObj->title	=	$classe['title'];
			$ClassesObj->class_dates	=	$classe["date"];
			$ClassesObj->location	=	$classe["location"];
			$ClassesObj->category	=	$classe["category"];
			$ClassesObj->description	=	$classe["description"];
			$ClassesObj->bullet1	=	$classe["bullet1"];
			$ClassesObj->bullet2	=	$classe["bullet2"];
			$ClassesObj->bullet3	=	$classe["bullet3"];
			$ClassesObj->link	=	$classe["link"];
			$ImageStatus		=	$classe["images_status"];
			
			$ClassesObj->save();
			
			if($request->hasFile("classesImage.$key") && $ImageStatus == 'change')
			{
				$image	=	$request->file("classesImage.$key");
				if($image->isValid())
				{	
					$destinationPath    = 	'public/uploads/profiles/users/'.$profile->user_id.'/classes/'.$ClassesObj->id; 
					$name	=	$image->getClientOriginalName();
					
					if($image->move($destinationPath,$name))
					{
						if(!empty($ClassesObj->poster) && file_exists($destinationPath."/".$ClassesObj->image))
						{
							unlink($destinationPath."/".$ClassesObj->image);
						}
						
						$ClassesObj->image = $name;
						$ClassesObj->save();
					}
				}
			}
			
			if(!empty($ClassesObj->image) && $ImageStatus == 'no-select')
			{
				$destinationPath    = 	'public/uploads/profiles/users/'.$profile->user_id.'/classes/'.$ClassesObj->id."/".$ClassesObj->image;
				if(file_exists($destinationPath))
				{
					unlink($destinationPath);
				}
				$ClassesObj->image = "";
				$ClassesObj->save();
			}
			
			$CArray[]	=	$ClassesObj->id;
		}
		
		//tottal Classes 
		$tc	=	$profile->Classes()->get();
		
		
		$deletedC	=	$tc->filter(function($value,$index) use($CArray){
			return !in_array($value->id,$CArray);
		});
		
		$deletedC->map(function($value,$index){
			$value->delete();
		});	
		
		return true;
	}
}
