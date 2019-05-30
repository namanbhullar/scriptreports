<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
	/**
	 * The Name Of the table use by Model.
	 *
	 * @var string
	 */
    protected $table	=	'lr_plans';
	
	/**
	 * Relation With Users Table
	 *
	 * @object Query Bulder
	 */
	public function user()
	{
		return $this->hasMany('App\Models\User','user_plan','id');
	}	
	
}
