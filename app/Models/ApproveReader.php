<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApproveReader extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lr_approve_reader';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'submission_id', 'reader_id', 'request_id', 'status'
    ];

	
	public function user()
	{
		return $this->belongsTo('App\Models\User','reader_id','id');
	}
	
	public function submission()
	{
		return $this->belongsTo('App\Models\Submission','submission_id','id');
	}
}
