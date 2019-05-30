<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use URL;

use DB;

use Auth;

use File;

class Documents extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table	=	'lr_documents';
	
	
	// Setup event bindings...
	public static function boot()
	{
		 parent::boot();
		 
		 Documents::deleted(function($dox){
			$path	=	public_path()."\\uploads\\profiles\\users\\".$dox->user_id."\\mydocuments\\".$dox->id."\\".$dox->file_name; 
			if(file_exists($path))
			{
				File::delete($path);
			}			
		 });
	}
	
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
	
	/**
	 * $data is an aray which contains information like file type, title, draft, description;
	 * $files_name contains files input var name which files have to uplosd 
	**/
	public function SaveDocuments($data, $file, $userid=NULL){
		if(is_null($userid)) $userid	=	auth()->user()->id;
	
		if($file->isValid()){
			 
		$dox		=	new Documents;		
		$dox->user_id		=	$userid;
		$dox->title			=	$data['title'];	
		$dox->type			=	$data['type'];	
		$dox->draft			=	!empty($data['draft']) ? $data['draft'] : '';	
		$dox->description	=	!empty($data['description']) ?  $data['description'] : '';
		$dox->save();
	   			// upload documents
			$destinationPath    = 'public/uploads/profiles/users/'.$userid.'/mydocuments/'.$dox->id; 
			$name				=	$file->getClientOriginalName(); 
			$mimes				=	$file->getClientOriginalExtension(); 
			$upload_success     = 	$file->move($destinationPath, $name);
			

			
			$dox->file_name	=	$name;
			$dox->file_mime	=	$mimes;
			$dox->save();
			
			return $dox->id;
		}
		//echo $dox->id; exit;	
		return false;
	}
	
	
	/**
	 * $dox is object of Documents Model
	 * $file Input file 
	**/
	public function updateFile($dox,$file)
	{
		if($file->isValid())
		{
			$destinationPath    = 'public/uploads/profiles/users/'.$dox->user_id.'/mydocuments/'.$dox->id; 
			$name				=	$file->getClientOriginalName(); 
			$mime				=	$file->getClientOriginalExtension(); 
			
			$oldFilePath	=	public_path()."\\uploads\\profiles\\users\\".$dox->user_id."\\mydocuments\\".$dox->id."\\" ;
			$tempName	=	str_random(20);
			
			if(file_exists($oldFilePath.$dox->file_name)){
				rename($oldFilePath.$dox->file_name,$oldFilePath.$tempName);
				//dd("file exists");
			}
			$uploadSucces	=	$file->move($destinationPath,$name);
			
			if($uploadSucces)
			{
				if(file_exists($oldFilePath.$tempName)){
					unlink($oldFilePath.$tempName);
				}
				
				$dox->file_name	=	$name;
				$dox->file_mime	=	$mime;
				$dox->save();
				
				return true;
			}
			else
			{
				if(file_exists($oldFilePath.$tempName)){
					rename($oldFilePath.$tempName,$oldFilePath.$odx->file_name);
				}
				
				return false;
			}
		}
		return false;
	}
	
	public  function getLinkAttribute()
	{
		return URL::to("/documents/view/".$this->id."?_token=".md5('mydocuments/'.$this->id.'/'.$this->user_id));	
	}
	
	public function getDlinkAttribute()
	{
		return URL::to("/myaccount/script-manager/my-documents/downloads/".$this->id."?_token=".md5('mydocuments/'.$this->id.'/downloads'));	
	}
	
	
	public function GetMyScript(){
		$script	=	DB::table('lr_documents')
					->where('user_id','=',auth()->user()->id)
					->where(function($script){
							$script->where('type','=','script')->orwhere('type','=','scripts');
					})
					->get();
		return $script;
	}
	
		
}
