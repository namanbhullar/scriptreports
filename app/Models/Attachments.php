<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table	=	"lr_attachments";
	
	
	public function inboxdetail()
	{
		return $this->belongsTo('App\Models\Inboxdetail','inboxdetail_id','id');
	}
	
	public function script()
	{
		return $this->belongsTo('App\Models\Scripts','item_id','id');
	}
	
	public function document()
	{
		return $this->belongsTo('App\Models\Documents','item_id','id');
	}
	
	public function template()
	{
		return $this->belongsTo('App\Models\Templates','item_id','id');
	}
	
	public function report()
	{
		return $this->belongsTo('App\Models\ScriptReport','item_id','id');
	}
	
	public function request()
	{
		return $this->belongsTo('App\Models\RequestsAll','item_id','id');
	}
	
	public function SaveAttchment($inboxdetail_id,$item_id, $item_type)
	{		
		if(empty($item_id) || empty($item_type) || empty($inboxdetail_id) ) 
			return false;
		
		$attachment	=	new Attachments();
		
		$attachment->auth			=	str_random(40);
		$attachment->inboxdetail_id	=	$inboxdetail_id;
		$attachment->item_id		=	$item_id;
		$attachment->item_type		=	$item_type;
		$attachment->status			=	1;
		
		$attachment->save();
		
		return $attachment->id;
	}
}
