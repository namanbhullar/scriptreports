<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Submission extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lr_submission';
	
	
    public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
	
	public function rfdoc()
	{
		return $this->belongsTo('App\Models\Documents','release_form','id');
	}
	
	public function reader()
	{
		return $this->hasMany('App\Models\ApproveReader','submission_id','id');
	}
	
	
	public function setNewSubmission($user_id = NULL){
		!is_null($user_id)	||	$user_id	=	auth()->user()->id;
		$submission	=	new Submission();		
		$submission->user_id	=	$user_id;
		$submission->accept_submissions	=	0;
		$submission->save();
		return	$submission;
	}
	
	
}
