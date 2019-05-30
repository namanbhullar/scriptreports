<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Contacts;

class Favorites extends Model
{
    protected $table	=	'lr_favorites';
	
	public function member()
	{
		return $this->belongsTo('App\Models\User','item_id','id');
	}
	
	public function script()
	{
		return $this->belongsTo('App\Models\Scripts','item_id','id');
	}
	
	public function template()
	{
		return $this->belongsTo('App\Models\Templates','item_id','id');
	}
	
	public function getIscontactAttribute()
	{
		if($this->item_type !=  'user') return false;
		
		return (bool) Contacts::where('user_id',$this->user_id)->where('contact_userid',$this->item_id)->where('status',1)->count();
	}
	
	public function getRequest_stausAttribute()
	{
		if($this->item_type != 'user') return false;
		$request	=	auth()->user()->SendedRequests()->where('receiver_id',$this->item_id)->first();
		if($request);
	}
}
