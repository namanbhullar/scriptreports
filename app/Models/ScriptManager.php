<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScriptManager extends Model
{
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lr_script_manager';
	
	public function script()
	{
		return $this->belongsTo('App\Models\Scripts','script_id','id');
	}
	
	public function address()
	{
		return $this->belongsTO('App\Models\Address','address_id','id');
	}
}
