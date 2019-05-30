<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use DB;

use URL;

use App\Models\Plans;
use Validator;
use Hash;
use Mail;

class User extends Authenticatable
{	
	/**
     * The Name Of the table use by Model.
     *
     * @var string
     */
	 protected $table	=	'lr_users';
	 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   // protected $fillable = [
     //   'name', 'email', 'password',
    //];

    /**
     * The attributes excluded from the model's SON and Array form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	/**
     * The attributes appende to the model's JSON and Array form.
     *
     * @var array
     */
    protected $appends = [
        'user_type', 'plan_name',
    ];
	
	public function getUserTypeAttribute()
	{
		return $this->attributes['user_type'] = $this->UserGroup->title;
	}
	
	public function getPlanNameAttribute()
	{	
		return $this->attributes['plan_name'] = $this->UserPlan->plan_title;
	}
	
	public function getFullNameAttribute()
	{
		return $this->first_name." ".$this->last_name;
	}
	
	/** Relation With Profile Models **/
	
	public function ScriptReports()
	{
		return $this->hasOne('App\Models\ScriptReport','user_id','id');
	}
		
	public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }
	
	public function sendedRequest()
	{
		return $this->hasMany('App\Models\Requestall','sender_id','id');
	}
	
	public function plan()
	{
		return $this->belongsTo('App\Models\Plans','user_plan','id');
	}
	
	public function submission()
    {
        return $this->hasOne('App\Models\Submission');
    }
	
	public function contacts()
	{
		return $this->hasMany('App\Models\Contacts');
	}
	
	public function InContacts()
	{
		return $this->hasMany('App\Models\Contacts','contact_userid','id');
	}
	
	public function favorites()
	{
		return $this->hasMany('App\Models\Favorites');
	}
	
	public function scripts()
	{
		return $this->hasMany('App\Models\Scripts','created_by','id');
	}
	
	public function documents()
	{
		return $this->hasMany('App\Models\Documents');
	}
	
	public function templates()
	{
		return $this->hasMany('App\Models\Templates');
	}
	
	public function invites()
	{
		return $this->hasMany('App\Models\Invitation','sender_id','id');
	}
	
	public function notification()
	{
		return $this->hasMany('App\Models\Notification','user_id','id');
	}
	
	public function SendedRequests()
	{
		return $this->hasMany('App\Models\RequestAll','sender_id','id');
	}
	
	public function ScriptSharedToME()
	{
		return $this->hasMany('App\Models\ShareScript','share_to','id')->where('sender_id','!=',$this->id)->where('status','>',0);
	}
	
	public function MessageReceivedByMe()
	{
		return $this->hasMany('App\Models\Inbox','receiver_id','id');
	}
	
	public function MessageSendedByMe()
	{
		return $this->hasMany('App\Models\Inbox','sender_id','id');
	}	
	
	public function UserGroup()
	{
		return $this->belongsTo('App\Models\UserGroup','user_group','id');
	}
		
	public function UserPlan()
	{
		return $this->belongsTo('App\Models\Plans','user_plan','id');
	}
	
	
	public function getLinkAttribute()
	{
		if($this->plan->plan_price > 0)
		{			
			return URL::to('/profile/'.$this->id.'/view');
			
		}else
		{
			return URL::to('/profile/'.$this->invition_token.'/private');
		}
	}
	
	// Setup event bindings...
	public static function boot()
	{
		parent::boot();
		
		User::deleting(function($user){
			if($user->user_group == 1){
				session()->flash('warnings', trans('warnings.can\'t delete a member in super admin group.' ));				
				return false;
			}
		});
		
		User::deleted(function($user){
			$user->profile()->delete();
			$user->templates()->delete();
			$user->contacts()->delete();
			$user->InContacts()->delete();
			$user->documents()->delete();
			$user->favorites()->delete();
			$user->notification()->delete();
			$user->submission()->delete();
		});		
	}
	
	//this function get reader according to plan passed by 
	public function GetReaders($plan=NULL){
		if($plan!=NULL){
			if($plan	==	'p'){
				$user_group	=	'4';
				$condition	=	'=';
			}elseif($plan=='w'){
				$user_group	=	'4';
				$condition	=	'!=';
			}
		}else{
			$user_group	=	0;
			$condition	=	'>';
		}
		
		$page			=	request()->get('per_page');
		$show			=	isset($page) ? $page : '9';
		$search			=	request()->get('search');
		$location		=	request()->get('location');
		$addlang		=	request()->get('add_language');
		
		$query	=	DB::table('lr_profile')
            		->join('lr_users', 'lr_users.id', '=', 'lr_profile.user_id')
					->select('lr_profile.*');
			//it will be only for paid user change 0 to 1 in next line 
			$query->where(function($query){
						//$query->orwhere('lr_users.user_plan','=','2')
						$query->orwhere('lr_users.user_plan','=','3')
						->orwhere('lr_users.user_plan','=','4');
					})
					->where('lr_users.user_group',$condition,$user_group)
					->where('lr_users.user_group','!=','1')
					->where('lr_users.status','0')
					->where('lr_profile.profile_img','<>','')
					->where('lr_profile.brief_boi','<>','')
					->Where(function($query)
            			{
							$filter			=	request()->get('filter');
						//print_r($filter);exit;
        					// apply filters
							if(count($filter)){
								$count=0;
								foreach($filter as $flt){
									
									if($flt=="Templates"){
										
											$users = DB::table('lr_templates')
											->join('lr_profile','lr_templates.user_id','=','lr_profile.user_id')
											->select('lr_templates.user_id')
											->groupBy('lr_templates.user_id')
											->get();
											foreach($users as $usss){
												$query->orwhere('lr_profile.user_id','=',$usss->user_id);		
											}
									}else{
										if($count==0)
											$query->where('lr_profile.extra_fields','LIKE','%'.$flt.'%');
										else
											$query->orwhere('lr_profile.extra_fields','LIKE','%'.$flt.'%');
											
										$query->orwhere('lr_profile.additional_skills','LIKE','%'.$flt.'%');
									}
									
									$count++;
								}
							}
			
					});
			
			// Search
			if($search){
					$query->where('lr_profile.full_name','LIKE','%'.$search.'%');
					$query->orwhere('lr_profile.company_name','LIKE','%'.$search.'%');
				}
				
			if($location){
					$query->where('lr_profile.location','LIKE','%'.$location.'%');
				}
				
			if($addlang){
					$query->where('lr_profile.languages','LIKE','%'.$addlang.'%');
				}		
			
			
					
			$query->orderBy('lr_profile.id','desc');
			return 	$query->paginate($show);
	}
	
	public function GetFeaturedUsers(){
		
		return DB::table('lr_profile')
            ->join('lr_users', 'lr_users.id', '=', 'lr_profile.user_id')
            ->select('lr_profile.*')
			->where('lr_users.status','0')
			->where('lr_users.featured','1')
			->where('lr_users.user_plan','>','1')
			->where('lr_profile.profile_img','<>','')
			->where('lr_profile.brief_boi','<>','')
			->orderBy('lr_profile.id','desc')
            ->get();	
	}
	
	public function check_InvitationToken($id){
		if(User::find($id)){
			$user	=	User::find($id);
			if(is_null($user->invition_token)){
				$token	=	md5($id); 
				$tkn	=	substr($token,0,5).substr($token,-5,5).substr($token,15,5);
				$token	=	str_shuffle($tkn);
				$user->invition_token	=	$token;
				$user->save();
				return $token;
			}else{
				return $user->invition_token;
			}
		}else{
			//print_r('User not found');
			return Redirect::back()->withErrors('User not found');
		}
	}
	
	public function UserprofileLink($id){
		if(User::find($id)){
			$user	=	User::find($id);
			$plan	=	Plans::find($user->user_plan);
			if($plan->plan_price > 0 ){
				return URL::to('/myaccount/profile/'.$id.'/view');
			}else{
				return URL::to('/myaccount/profile/'.User::check_InvitationToken($id).'/private');
			}
		}else{
			return URL::to('/myaccount/profile/'.$id.'/view');
		}
	}
	
	public function UerType($id){
		
		$user	=	User::find($id);
		$plan	=	Plans::find($user->user_plan);
		if($plan->plan_price > 0 ){
			return 'paid';
		}else{
			return 'free';
		}
	}
	
	
	public function getPreviousAttribute(){
				
		return DB::table('lr_profile')
            		->join('lr_users', 'lr_users.id', '=', 'lr_profile.user_id')
					->join('lr_plans', 'lr_plans.id','=','lr_users.user_plan')
					->where('lr_profile.user_id','<',$this->id)
					->where('lr_users.status','0')
					->where('lr_users.user_plan','>','1')
					->where('lr_profile.profile_img','<>','')
					->where('lr_profile.brief_boi','<>','')
					->where('lr_profile.about_me','<>','')
					->where('lr_plans.plan_price','>','0')
					->orderBy('lr_users.id','desc')
					->limit(1)
					->pluck('lr_users.id');
		
		
		}

	public function getNextAttribute($id){
				
		return DB::table('lr_profile')
            		->join('lr_users', 'lr_users.id', '=', 'lr_profile.user_id')
					->join('lr_plans', 'lr_plans.id','=','lr_users.user_plan')
					->where('lr_profile.user_id','>',$this->id)
					->where('lr_users.status','0')
					->where('lr_users.user_plan','>','1')
					->where('lr_profile.profile_img','<>','')
					->where('lr_profile.brief_boi','<>','')
					->where('lr_profile.about_me','<>','')
					->where('lr_plans.plan_price','>','0')
					->orderBy('lr_users.id','asc')
					->limit(1)
					->pluck('lr_users.id');
		
	}
	
		/**
     * Search users with first or last name
     *
     * @return array
     */
	public static function SearchUser($search,$filter){ 
		
			$query = DB::table('lr_users');
			
			if($filter){
				$query->where('user_plan',$filter);
			}
			
			if($search){
				$query->where('first_name', 'LIKE', '%'. $search .'%');
				$query->orwhere('last_name', 'LIKE', '%'. $search .'%');
			}
			
			
			return $query->get();
	}
	
	/**
	 * Store new user with validation rules for admin
	 *
	 * @return string
	 */
	public static function storeUser()
	{
		//Extand Validator Fro custom Check
		Validator::extend("capital", function($attribute, $value, $parameters) {
			preg_match('/([A-Z])/',$value,$matchCap);
			if(count($matchCap) != 0){
				return true;
			}else{
				return false;
			}
		});
		Validator::extend("number1", function($attribute, $value, $parameters) {
			preg_match('/([0-9])/',$value,$matchNum);
			if(count($matchNum) != 0){
				return true;
			}else{
				return false;
			}
		});
		//Error message for Regex in validator
		$message	=	array(
						'number1'=>'The :attribute should contain One Numeric charactor.',
						'capital'=>'The :attribute should contain One Capital charactor.'
						);
		// Validation rulles
		 $rules = array('first_name' => 'required', 
		 				//'username' => 'required|unique:lr_users|min:5', 
						'email' => 'required|unique:lr_users|email',
						'password' => 'required|min:5|capital|number1',
						'confirm_password' => 'required|min:5|same:password'
						);
		
		$validator = Validator::make(request()->all(), $rules,$message);
		
		// validate inputs
		if ($validator->fails())
		{
			return $validator;
		}
		
		// Genrate email verification code
		$verify_code	=	str_random(40);
		
		// save user if validation is passed 
		$user = new User;
 		$user->first_name 	= request()->get('first_name');
        $user->last_name  	= request()->get('last_name');
		$user->user_plan  	= request()->get('user_plan');
        $user->username   	= request()->get('username');
        $user->email      	= request()->get('email');
        $user->password   	= Hash::make(request()->get('password'));
		$user->user_group	=  request()->get('user_group');
		$user->featured		=  request()->get('featured');
		$user->verify_code	=  $verify_code;				
 		$user->save();
		
	   $profile = new Profile;
	   
	   $profile->user_id = $user->id;
	   $profile->full_name = request()->get('first_name').' '.request()->get('last_name');
	   $profile->additional_skills = [];
	   $profile->extra_fields 		= [];
	   $profile->save();
	   
	   if($user->user_group == 4)
	   {
		   Submission::setNewSubmission($user->id);
	   }
 		
		// Send email for verify email		
	   $data['name']	=	request()->get('first_name').' '.request()->get('last_name');
	   $data['email']	=	request()->get('email');
	   $data['code']	=	$verify_code;
					
			Mail::send('emails.welcome', $data, function($message) use ($data)
			{
				//echo "<pre>";print_r($message); exit;
			      $message->to($data['email'], $data['name'])->subject('Welcome to ScriptReader Online');
			});	
	   
	   return true;
							
	}
	
}
