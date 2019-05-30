<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class OtLinks extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lr_otlinks';
	
	public function plan()
	{
		return $this->belongsTo('App\Models\Plans','plan_id','id');
	}

	
	public function StoreOtlink(){
	
		
		$link	=	str_random(32); 
		
		$otlink = new OtLinks;
 		$otlink->plan_id 		= 	request()->get('plan_id');
		$otlink->usergroups_id	= 	request()->get('usergroups_id');
        $otlink->status			=	request()->get('status');
		$otlink->link			=	$link;
		$otlink->created_by		=	Auth::user()->id;		
 		$otlink->save();	
	}
	
	
	public function UpdateOtLink($id){
		
		$otlink = OtLinks::find($id);
 		$otlink->plan_id		= 	request()->get('plan_id');
		$otlink->usergroups_id	= 	request()->get('usergroups_id');
        $otlink->status			=	request()->get('status');
		$otlink->save();
	}
	
		
	public function checkOTLink($code){
		
		return OtLinks::where('link',$code)->where('status',0)->where('used',0)->count();
	}
	
	public function SearchOTlinks($plan){
			return OtLinks::where('plan_id',$plan)->get();	
	}
}
