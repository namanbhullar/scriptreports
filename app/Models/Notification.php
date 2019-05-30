<?php

namespace App\Models;

use App\Models\Inbox;
use auth;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lr_notification';
	
	
	/**
	 * The database table Columns that are mass assignable.
	 *
	 * @var array
	 */
	 protected $fillable = ['type','is_seen','item_id','message','notification_type','user_id','sender_id'];
	 
	 
	 
	public function user()
	{
		return $this->belongsTo('App\Models\User','user_id','id');
	}
	
	public function sender()
	{
		return $this->belongsTo('App\Models\User','sender_id','id');
	}
	
	
	public function request()
	{
		return $this->belongsTo('App\Models\RequestsAll','item_id','id');
	}
	
	public function getLinkAttribute()
	{
		switch($this->type){
			case 'contect-request-accept':
			case 'contect-request-decline':
			default						:		return url('/myaccount/contacts/');	
				
			default						:		return url('/myaccount/message/'.$this->item_id.'/view');			
		}
	}
	
	
	public function getDeletedAttribute()
	{
		switch($this->type){
			case 'message-recieve':
			case 'script-view-request':
			
			$check	=	Inbox::find($this->item_id);
			
			if(($check->receiver_id == auth()->user()->id && $check->r_status==-1) || ($check->sender_id == auth()->user()->id && $check->s_status==-1))
				return true;
			else
				return false;	
			
			default					  :	return false;	
			
						
		}
	}
	
	public function getIconAttribute()
	{
		switch($this->type){
			
			
			case 'script-with-template'	:
			case 'script-share'			:
			case 'script-view-request'	:
			case 'message-with-script'	:		return 'scripts.png';
			
			case 'template-with-script'	:
			case 'template-share'		:
			case 'message-with-template':		return 'template.png';
			
			case 'report-with-both'		:
			case 'report-with-script'	:
			case 'report-with-template'	:
			case 'report-return'		:
			case 'report-rturned'		:
			case 'report-share'			:		return 'report.png';
			
			case 'invite-friend'		:
			case 'contect-request-accept':
			case 'contect-request-decline':
			case 'addprofile-request-decline':
			case 'addprofile-request-accept':
			case 'invite-friend-added'	:		return 'profile.png';
			
			case 'request-script'		:		return 'scripts.png';
			
			case 'subm-add-prof-req'	:		return 'check-circle.png';
			
			case 'message-with-both'	:
			case 'message-recieve'		:		return 'message-blue.png';
			default						:		return 'message-blue.png';
			
		}
	}
	
}
