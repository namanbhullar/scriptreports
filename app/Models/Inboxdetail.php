<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inboxdetail extends Model
{
    protected $table	=	'lr_inboxdetail';
	
	public function inbox()
	{
		return $this->belongsTo('App\Models\Inbox');
	}
	
	public function sender()
	{
		return $this->belongsTo('App\Models\User','sent_by','id');
	}
	
	public function attachments()
	{
		return $this->hasMany('App\Models\Attachments','inboxdetail_id','id');
	}
	
	public function template()
	{
		return $this->hasOne('App\Models\Attachments','inboxdetail_id','id')->where('item_type','template');
	}
	
	public function script()
	{
		return $this->hasOne('App\Models\Attachments','inboxdetail_id','id')->where('item_type','script');
	}
	
	public function report()
	{
		return $this->hasOne('App\Models\Attachments','inboxdetail_id','id')->where('item_type','report');
	}
	
	public function request()
	{
		return $this->hasOne('App\Models\Attachments','inboxdetail_id','id')->where('item_type','request');
	}
		
	public function getHas_attachmentAttribute()
	{
		$this->attachments()->get();
		return !$this->attachments->isEmpty();
	}
	
	public function getHas_scriptAttribute()
	{
		return !is_null($this->script);
	}
	
	public function getHas_templateAttribute()
	{
		return !is_null($this->template);
	}
	
	public function getHas_reportAttribute()
	{
		return !is_null($this->report);
	}
	
	public function getHas_requestAttribute()
	{
		return !is_null($this->request);
	}
}
