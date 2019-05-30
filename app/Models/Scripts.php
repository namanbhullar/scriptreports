<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Crypt;

use App\Models\ShareScript;

use URL;

use Auth;

class Scripts extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table	=	"lr_scripts";
	
	 /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'isposted' => 'boolean',		
		'form'	=> 'array',
		'genre'		=> 'array',
		'subgenre'	=> 'array',
		'script_info'=>'array',
		'writer_info'=>'array',
		'story_by'	=>'array',
		'source'	=>'array',
		'documents'=>'array'
    ];
	
	// Setup event bindings...
	public static function boot()
	{
		parent::boot();
		Scripts::deleted(function($script){
			//$script->load('agent.address','manager.address','share','favorites');
			$script->load('agent.address','manager.address','share');
			if(!is_null($script->agent) && !is_null($script->agent->address)) $script->agent->address->delete();
			if(!is_null($script->agent)) $script->agent->delete();
			
			if(!is_null($script->manager) && !is_null($script->manager->address)) $script->manager->address->delete();
			if(!is_null($script->manager)) $script->manager->delete();
			
			$script->share->each(function($value,$index){
				$value->delete();
			});
			
			/*$script->favorites->each(function($value,$index){
				$value->delete();
			});*/
		});
	}
	
		
	
	public function user()
	{
		return $this->belongsTo('App\Models\User','created_by','id');
	}
	
	public function share()
	{
		return $this->hasMany('App\Models\ShareScript','script_id','id');
	}
	
	public function documents()
	{
		return $this->hasMany('App\Models\Documents');
	}
	
	public function favorites()
	{
		return $this->hasMany('App\Models\Favorites');
	}
	
	public function getLinkAttribute()
	{
		return route("script.view",$this->id);
	}
	
	public function agent()
	{
		return $this->hasOne('App\Models\ScriptAgent','script_id','id');
	}
	
	public function manager()
	{
		return $this->hasOne('App\Models\ScriptManager','script_id','id');
	}
	
	public function track()
	{
		return $this->hasOne('App\Models\ShareScript','script_id','id')->where('share_to','=',auth()->user()->id)->where('status','>',-1)->orderBy('id','DESC');
	}
	
	public function getTracker($id, $userid = NULL){
		if(empty($id)) return false;
		
		if(is_null($userid)) $userid = auth()->user()->id;
		
		$track	=	ShareScript::where('script_id','=',$id)->where('share_to','=',$userid)->where('status','>',-1)->orderBy('id','DESC')->first();
		
		return $track;
	}	
	
	
}
