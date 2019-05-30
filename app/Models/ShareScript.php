<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareScript extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 
	protected $table = 'lr_sharescript';
	
	public function sender()
	{
		return $this->belongsTo('App\Models\User','sender_id','id');
	}
	
	public function receiver()
	{
		return $this->belongsTo('App\Models\User','share_to','id');
	}
	
	public function notes()
	{
		return $this->hasOne('App\Models\PrivateNotes','item_id','id')->where('item_type','script')->where('user_id',$this->share_to);
	}
	
	public function script()
	{
		return $this->belongsTo('App\Models\Scripts','script_id','id');
	}
	
	// Setup event bindings...
	public static function boot()
	{
		 parent::boot();
		 
		 ShareScript::creating(function($share){
			 if($report->sender_id != $share->share_to)
				 $share->is_seen	=	0;
			else
				$share->is_seen = 1;
				
			return true;
		 });
	}
	
	public function getIsSeenAttribute($value)
	{
		if($this->sender_id != $this->share_to)
			return $value;
		else
			return 1;
	}
	
	public function getTabAttribute()
	{
		if(auth()->user()->user_group == 4)
		{
			if($this->status == 0)
			{				
				$tab	=	'archived';				
			}
			else
			{
				switch($this->feedback_icon){
					case 'Priority':
						$tab	=	'Priority';
					break;
					
					case 'Rejected':
						$tab	=	'Rejected';
					break;
					
					case 'Considered':
						$tab	=	'Considered';
					break;
					
					case 'Recommended':
						$tab	=	'Recommended';
					break;
					
					case 'buy':
						$tab	=	'buy';
					break;
					
					case 'recomd-writer':
						$tab	=	'recomd-writer';
					break;
					
					default:
						$tab	=	'new';
					break;
				}
			}			
		}
		else
		{
			switch($this->status){
				case 0:
					$tab	=	'archived';
					$liArchived	=	false;
				break;
				
				case 3:
					$tab	=	'priority';
					$liPriority	=	false;
				break;
				
				case 1:
					$tab	=	'read';
					$liDefault	=	false;
				break;
				
				default:
					$tab	=	'read';
					$liDefault	=	false;
				break;
			}
		}
	
		return $tab;
	}
	
	public function getTabauthorAttribute()
	{		
		if(auth()->user()->user_group == 4)
		{
			switch($this->status){
				case 0:
					$tab	=	'archived';
					$liArchived	=	false;
				break;
									
				case 1:
					$tab	=	'my-script';
				break;
									
				default:
					$tab	=	'my-script';
				break;					
			}
		}
		else
		{
			switch($this->status){
				case 0:
					$tab	=	'archived';
				break;
				
				case 3:
					$tab	=	'priority';
				break;
									
				case 1:
					$tab	=	'my-script';
				break;
									
				default:
					$tab	=	'my-script';
				break;					
			}
		}
		return $tab;
	}
	
	public function share($script_id,$sender_id,$share_to)
	{
		ShareScript::where('sender_id',$sender_id)->where('share_to',$share_to)->where('script_id',$script_id)->update(['status'=>-2]);
		
		$share	=	new ShareScript;
		$share->status	=	1;
		$share->sender_id	=	$sender_id;
		$share->share_to	=	$share_to;
		$share->script_id	=	$script_id;
		$share->save();
	}
}
