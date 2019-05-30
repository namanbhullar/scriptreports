<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Storage;

use File;

use App\Models\Profile;

use App\Models\Documents;

class DownloadsController extends Controller
{
  public function sampleCoverage($id)
  {
	$profile	=	Profile::findOrFail($id);	
	$filename = "/uploads/profiles/users/".$profile->user_id."/".$profile->sample_coverage;
	$fullpath	=	public_path().$filename;
	
	if(!file_exists($fullpath)) return view('errors.not-found')->with(['heading'=>'Document','message'=>'Sorry, the file you are looking for does not exists or deleted by auther.']);
		
	return $this->viewFile($filename,$fullpath);
  }
  
  public function ViewDocuments($id,Request $request)
  {
	  $doc	=	Documents::findOrFail($id);
	  if(md5('mydocuments/'.$doc->id.'/'.$doc->user_id) == $request->get('_token'))
	  {
		  
		$filename = "/uploads/profiles/users/".$doc->user_id."/mydocuments/".$doc->id."/".$doc->file_name;
		$fullpath	=	public_path().$filename;
		
		//dd($fullpath);
		
		return $this->viewFile($filename,$fullpath);
	  }
  }
  
  public function download($id,Request $request)
  {
	   $doc	=	Documents::findOrFail($id);
	  if(md5('mydocuments/'.$id.'/downloads') == $request->get('_token'))
	  {
		  
		$filename = "/uploads/profiles/users/".$doc->user_id."/mydocuments/".$doc->id."/".$doc->file_name;
		$fullpath	=	public_path().$filename;
		
		//dd($fullpath);
		
		return $this->downloadFile($filename,$fullpath,$doc->file_name);
	  }
  }
  
  public function downloadFile($filepath,$fullpath,$name)
  {
	return response()->download($fullpath,$name, [
		'Content-Type'        => Storage::getMimeType($filepath),
	]);	  
  }
  
  
  
  public function viewFile($filename,$fullpath)
  {
	return response()->file($fullpath, [
		'Content-Disposition' => "inline; $filename",
		'Content-Type'        => Storage::getMimeType($filename),
	]);	  
  }
}
