<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use URL;

class Profile extends Model
{
    protected $table	=	"lr_profile";
	
	/**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'additional_skills' => 'array',
		'extra_fields'=>'array',
    ];
	
	
	 protected $fillable = [
        'isnew'
    ];
	
	
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
	
	public function getImageAttribute(){
		if(!empty($this->profile_img))
			return "<img src=\"".URL::to("/public/uploads/profiles/users/".$this->user_id."/".$this->profile_img)."\" alt=\"".$this->full_name."\" />";
		else
			return "<img src=\"".URL::to("/public/images/no-image.png")."\" alt=\"".$this->full_name."\" />";
			
	}
	
	public function getCoveragelinkAttribute()
	{
		return URL::route('profile.sampleCoverage',['id'=>$this->id]);
	}
	
	public function WrittingProjects()
	{
		return $this->hasMany('App\Models\WritingProjects','profile_id','id');
	}
	
	public function FeatureProjects()
	{
		return $this->hasMany('App\Models\FeaturedProjets','profile_id','id');
	}
	
	public function Classes()
	{
		return $this->hasMany('App\Models\Classes','profile_id','id');
	}
	
	public function Contests()
	{
		return $this->hasMany('App\Models\Contests','profile_id','id');
	}
	
	public function Address()
	{
		return $this->belongsTo('App\Models\Address','address_id','id');
	}
	
	
	
	
	 	
	
	public static function SearchProfile($string, $filter){
		
			$query	=	DB::table('lr_profile');
			if($filter){
					$query->whereExists(function($query)
            		{
						$filter	=	request()->get('ft_plan');
                		$query->select(DB::raw(1))
                      	->from('lr_users')
						->where('lr_users.user_plan',$filter)
                      	->whereRaw('lr_users.id = lr_profile.user_id');
            		});
			}
			
			if($string)
				$query->where('full_name', 'LIKE', '%'. $string .'%');
			
			return $query->get();
			
	}
}
