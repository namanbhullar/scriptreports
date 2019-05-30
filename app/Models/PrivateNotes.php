<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateNotes extends Model
{
    protected $table	=	"lr_private_notes";
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','item_id','item_type','note','status'];
	
	
	public function user()
	{
		return $this->belongsTo('App\Models\User','user_id','id');
	}
	
	public function Script()
	{
		return $this->belongsTo('App\Models\ShareScript','item_id','id');
	}
	
	public function inbox()
	{
		return $this->belongsTo('App\Models\Inbox','item_id','id');
	}
	
	public function reports()
	{
		return $this->belongsTo('App\Modles\ScriptReport','item_id','id');
	}
	
	public function SaveNotes( $item_id, $item_type, $notes, $user_id=null)
	{
		if(empty($user_id))
			$user_id	=	auth()->user()->id;
		
		if(empty($item_id) || empty($item_type) || empty($notes)) 
			return false;
		
		$notes	=	new PrivateNotes();
		$notes->user_id	=	$user_id;
		$notes->notes	=	$notes;
		$notes->item_id	=	$item_id;
		$notes->item_type	=	$item_type;
		$notes->save();
		
		return $notes->id;
	}
	
}
