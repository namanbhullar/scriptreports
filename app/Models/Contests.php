<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contests extends Model
{
   	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 protected $table = 'lr_contests';
	 
	// Setup event bindings...
	public static function boot()
	{
		 parent::boot();
		 
		 Classes::deleted(function($contest){
			$path	=	public_path()."\\uploads\\profiles\\users\\".$contest->profile->user_id."\\contest\\".$contest->id; 
			if(file_exists($path))
			{
				unlink($path);
			}			
		 });
	}
	
	public function profile()
	{
		$this->belongsTo('App\Models\Profile','profile_id','id');
	}
	
	public function SaveNew($contests,$profile,$request)
	{
		$CArray	=	[];
		
		foreach($contests as $key=>$contest)
		{
			
			$ContestObj	=	((int) $contest[id]) ? Contests::find($contest[id]) : new Contests;
					
			$ContestObj->profile_id	=	$profile->id;
			$ContestObj->title	=	$contest['title'];
			$ContestObj->date	=	$contest["date"];
			$ContestObj->entry_deadline	=	$contest["entry_deadline"];
			$ContestObj->entry_fee	=	$contest["entry_fee"];
			$ContestObj->description	=	$contest["description"];
			$ContestObj->link	=	$contest["link"];
			$ImageStauts		=	$contest['images_status'];
			
			$ContestObj->save();
			
			if($request->hasFile("contestImage.$key") && $ImageStauts == 'change')
			{
				$image	=	$request->file("contestImage.$key");
				if($image->isValid())
				{	
					$destinationPath    = 	'public/uploads/profiles/users/'.$profile->user_id.'/contest/'.$ContestObj->id; 
					$name	=	$image->getClientOriginalName();
					
					if($image->move($destinationPath,$name))
					{
						if(!empty($ContestObj->poster) && file_exists($destinationPath."/".$ContestObj->image))
						{
							unlink($destinationPath."/".$ContestObj->image);
						}
						
						$ContestObj->image = $name;
						$ContestObj->save();
					}
				}
			}
			
			if(!empty($ContestObj->image) && $ImageStauts == 'no-select')
			{
				$destinationPath    = 	'public/uploads/profiles/users/'.$profile->user_id.'/contest/'.$ContestObj->id."/".$ContestObj->image;
				if(file_exists($destinationPath))
				{
					unlink($destinationPath);
				} 
				$ContestObj->image = "";
				$ContestObj->save();
			}
			
			$CArray[]	=	$ContestObj->id;
		}
		
		//tottal Script 
		$tc	=	$profile->Contests()->get();
		
		$deletedC	=	$tc->filter(function($value,$index) use($CArray){
			return !in_array($value->id,$CArray);
		});
		
		$deletedC->map(function($value,$index){
			$value->delete();
		});	
		
		return true;
	}
}
