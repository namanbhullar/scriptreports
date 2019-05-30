<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestsAll extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lr_request';
	
	public function sender()
	{
		return $this->belongsTO('App\Models\User','sender_id');
	}
	
	public function receiver()
	{
		return $this->belongsTO('App\Models\User','receiver_id');
	}
	
	public function attachment()
	{
		return $this->hasOne('App\Models\Attachments','item_id','id')->where('item_type','request');
	}
}

