<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table	=	'lr_contacts';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
						'contact_userid',
						'user_id',
						'first_name',
						'last_name',
						'type','status'
						];
	
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
	
	public function contactUser()
	{
		return $this->belongsTo('App\Models\User','contact_userid','id');
	}
	
	public function getFullnameAttribute()
	{
		return $this->first_name . "&nbsp;" . $this->last_name;
	}
	
	public function isInContacts($id, $user=NULL){
		if(is_null($user)){
			 $user	=	auth()->user()->id;
		}
		
		if(!User::find($id)) return false;
		
		
		$check	=	Contacts::where('user_id',$user)->where('contact_userid',$id)->count();
		
		if($check){
			return false;
		}else{
			return true;
		}
	}
}
