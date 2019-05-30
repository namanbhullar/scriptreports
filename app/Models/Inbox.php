<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Inboxdetail;

use App\Models\Documetns;

use App\Models\Attachments;
use App\Models\Notification;

use App\Events\NewNotificationEvent;

use Auth;

use Event;


class Inbox extends Model
{
    protected $table	=	'lr_inbox';
	
	public function inboxdetail()
	{
		return $this->hasMany('App\Models\Inboxdetail');
	}
	
	public function sender()
	{
		return $this->belongsTO('App\Models\User','sender_id');
	}
	
	public function receiver()
	{
		return $this->belongsTO('App\Models\User','receiver_id');
	}
	
	public function privatenotes()
	{
		return $this->hasMany('App\Models\PrivateNotes','item_id','id');
	}
	
	public function getNextAttribute()
	{
		if(!Auth::check()) return false;
		$userid	=	auth()->user()->id;
		$query		=	Inbox::where('id','<',$this->id);
				$query->where(function($query) use ($userid) {
						$query->where('receiver_id',$userid)->orwhere('sender_id',$userid);
				});
					   
			   $query->orderBy('id', 'desc');
			   return $query->Pluck('id')->first();
		
	}
	
	public function getPreviousAttribute()
	{
		if(!Auth::check()) return false;
		$userid	=	auth()->user()->id;
		$query		=	Inbox::where('id','>',$this->id);
				$query->where(function($query) use ($userid) {
						$query->where('receiver_id',$userid)->orwhere('sender_id',$userid);
				});
					   
			   $query->orderBy('id', 'asc');
			   return $query->Pluck('id')->first();
	}
	
	public function SendMessage($receiver, $sub, $message, $other){
				
		if(is_null($other)) $other	=	array();
		$user_id	=	isset($other['sent_by'])	?	$other['sent_by']	:	auth()->user()->id;
		$source		=	array_key_exists('redirect_url',$other)	?	$other['redirect_url']	:	'message-recieve'; 
		
		//Entry in Inbox Table
		$inbox					=	new Inbox;
		$inbox->sender_id		=	$user_id;
		$inbox->receiver_id		=	$receiver;
		$inbox->subject			=	$sub;
		$inbox->r_status		=	'1';
		$inbox->save();
		
		//Entry in Inboxdetail Table
		$inboxdetail				=	new Inboxdetail;
		$inboxdetail->sent_by		=	$user_id;
		$inboxdetail->message		=	$message;
		$inboxdetail->inbox_id		=	$inbox->id;
		$inboxdetail->save();
		
		//Krys that function will accept as an  attachments
		$attacments	=	['template_id','report_id','script_id','document_id','request_id'];
		
		foreach($other as $key=>$data)
		{
			if(!in_array($key,$attacments)) continue;
			
			if($key	==	'document_id'){
				$documents	=		explode(',',$data);
				if(count($documents))
				{
					foreach($documents as $document)
					{	
						Attachments::SaveAttchment($inboxdetail->id,$document,'document');
					}
				}
			}
			else
			{
				Attachments::SaveAttchment($inboxdetail->id,$data,substr($key,0,-3));
			}
		}
		
		//Entry In script Share Table
		if(array_key_exists('template_id',$other))
		{
			ShareTemplate::Share($other['template_id'],$inbox);
		}
		
		
		
		if(request()->hasFile('attach_file'))
		{
			foreach(request()->file('attach_file') as $file)
			{
				
				if(is_object($file) && $file->isValid())
				{
					$dox_name	=	$file->getClientOriginalName();
					$mime	=	$file->getClientMimeType();
					
					$dox	=	new Documents();
					$dox->user_id	=	auth()->user()->id;
					$dox->title	=	$dox_name;
					$dox->file_name	=	$dox_name;
					$dox->type	=	'other';
					$dox->file_mime	=	$mime;
					$dox->status	=	-1;
					$dox->save();
					
					$destinationPath    = 'public/uploads/profiles/users/'.auth()->user()->id.'/mydocuments/'.$dox->id; 
					$file->move($destinationPath,$dox_name);
					
					Attachments::SaveAttchment($inboxdetail->id,$dox->id,'attachment');
				}
			}
		}
		
		//Add Notifiation 
		$inboxdetail->load('inbox','attachments','template','script','report','request','sender');
		Event::fire( new NewNotificationEvent($inboxdetail,new Notification,$source) );
		
		return array('inbox_id'=>$inbox->id, 'inboxdetail_id'=>$inboxdetail->id);
	}
}
