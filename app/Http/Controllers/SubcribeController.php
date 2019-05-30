<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ValidateCreateUserRequest;

use App\Models\User;
use App\Models\PromoCodes;
use App\Models\Plans;
use App\Models\OtLinks;
use App\Models\Invitation;
use App\Models\Profile;


use Mail;
use View;
use Validator;
use Redirect;
use Hash;

use Auth;

class SubcribeController extends Controller
{
	/* Original Subscribe Function Which will Use To after Beta Testing */	
	public function Subscribe($plan)
	{
		$plan	=	Plans::findOrFail($plan);
		return view('subscribe.registration',array('plan'=>$plan));
	}
	
	public function Register($plan,ValidateCreateUserRequest $request)
	{
		$plan	=	Plans::findOrFail($plan);
		
		if($request->has('promocode'))
		{
			$Promo = PromoCodes::where()->where('status',1)->first();						
			if(is_null($Promo) && !$Promo->is_valid) throw new SomthingWentWrongException('invalid-promo');
			$Promo->used	=	$Promo->used+1;
			$Promo->save();
		}
		else $code = NULL;
		
		$usrnamearray 		=  	@explode(' ',request()->get('full_name'));
		$firstname			=	@$usrnamearray[0];
		$lastname			=	@$usrnamearray[1].' '.$usrnamearray[2];		
		
		$user = new User;
 		$user->first_name 	= 	$firstname;
        $user->last_name  	= 	$lastname;
        $user->username   	= 	request()->get('email');
        $user->email      	= 	request()->get('email');
        $user->password   	= 	Hash::make(request()->get('password'));
		$user->user_group	= 	'5'; 	
		$user->user_plan	= 	$plan->id;
		$user->subscribe	= 	$request->get('subscribe');
		$user->renewal_type	= 	$request->get('renewal_type');
		$user->verify_code	=   str_random(40);								
 		$user->save();
				
		//set invitation token
		$invtoken	=	md5($user->id); 
		$tkn	=	substr($invtoken,0,5).substr($invtoken,-5,5).substr($invtoken,15,5);
		$invtoken	=	$tkn.$id;
		$user->invition_token	=	$invtoken;
		$user->save();
		
		$profile = new Profile;
	    $profile->user_id = $user->id;
	    $profile->full_name = request()->get('full_name');
		$profile->additional_skills = '';
		$profile->extra_fields 		= '';
		$profile->isnew		= 1;
	    $profile->save();
		
		if($plan->plan_price > 0){
			if($user->renewal_type==1){
					$type	=	'recurring';
					$price	=	$plan->plan_price; 
					$rtype	=	($plan->plan_type=='y') ? 'Y':'M';
										
				}else{
					$type	=	'yearly';
					$rtype	=	"Y";
					if($plan->plan_type=='y')
						$price	=	$plan->plan_price;
					else
						$price	=	number_format($plan->plan_price*12,2);	
			}
			return view('subscribe.paypal',array('userid'=>$user->id,'type'=>$type,'price'=>$price,'planname' => $plan->plan_title,'rtype'=>$rtype));
		}
		
		return $this->handelRegisterdUser($user);
	}
	
	public function PaypalProcessSuccess($id){
		$user	=	User::findOrFail($user);
		return $this->handelRegisterdUser($user);
	}
	
	public function PaypalCancel($id){
		
		User::DeleteUser(array($id));
		return Redirect::to('/subscribes')->withErrors(trans('error.cancel-subcription'));		
	}
	
	public function handelRegisterdUser($user)
	{
		$data['name']	=	$user->first_name.' '.$user->last_name;
		$data['email']	=	$user->email;
		$data['code']	=	$user->verify_code;
					
		Mail::send('emails.welcome', $data, function($message) use ($data)
		{
			  $message->to($data['email'], $data['name'])->subject('Welcome to ScriptReports');
		});
		
		return redirect('/subscribes/'.$user->invition_token.'/verify');
	}
	
	
    public function SubscribeRef( $ref_code,Request $request){	
		$email	=	urldecode($request->get('email'));
		$invitedId	=	$request->get('ext');
		return view('subscribe.subscribeRef', array('plane'=>4,'ref_code'=>$ref_code,'email'=>$email,'invite'=>$invitedId));
	}
	
	public function SubscribeUserRef($ref_code){
		//check for ref code
		$check	=	User::where('invition_token','=',$ref_code)->count();
		if(!$check){
			return  back()->withInput()
			->withErrors(trans('error.invalid-referral'));			
		}
			
			
		$user	=	$this->UserRegistration(4,NULL,NULL, $ref_code);
		
		if(is_object($user) && $user->fails()) return back()->withInput()->withErrors($user);
		
		$user	=	User::find($user);
			
		$username	=	request()->get('email');
		$password	=	request()->get('password');
		$inviteId	=	base64_decode(request()->get('inviteid'));
		$invite		=	Invitation::find($inviteId);
		
		if(!is_null($invite) && $invite->email == $username){
					
			$user->verify_email	=	1;
			$user->verify_code	=	'';
			$user->save();						
			Auth::attempt(['username' => $username, 'password' => $password]);
			return redirect('myaccount/profile/edit')->with('success', trans('success.ref-redirec-msg'));
		}
		
		return $this->handelRegisterdUser($user);
	}
	
	
	public function SubscribeOneTime($code)
	{
		$check	=	OtLinks::checkOTLink($code); //echo $check; exit;
		if($check)
		{   
			return View::make('subscribe.subscribeOTL')->with('code',$code);
		}
		else
		{	
			return Redirect::to('/login')->withErrors(trans('errors.OTL-expire'));
			return Redirect::to('/subscribe/1')->withErrors(trans('errors.OTL-expire'));
		}
	}
	
	public function AddNewUserOT($code){		 
		// Get Plan id for one time link
		$plan	=	OtLinks::where('link',$code)->pluck('plan_id')->first(); 
		 	
		$validator	=	$this->UserRegistration($plan,'OT',$code);
		
		if(is_object($validator) && $validator->fails()) return back()->withInput()->withErrors($user);
			
		$user	=	User::find($validator);
		
		return $this->handelRegisterdUser($user);		
	}
	
	/**
	 * Register new user for frontend
	 *
	 * @return boolean
	 */
	
	public function UserRegistration($plan,$type=NULL,$code=NULL, $ref_code=NULL){		
		// Validation rulles
		 $rules = array('full_name' => 'required', 
		 				'email' => 'required|unique:lr_users|email',
						'password' => 'required|min:9|capital|number1',
						'confirm_password' => 'required|min:9|same:password'
						);
		
		$validator = Validator::make(request()->all(), $rules);
		
		// validate inputs
		if ($validator->fails())
		{
			return $validator;
		}
		
		
		// Genrate email verification code
		$verify_code	=	str_random(40);

		// save user if validation is passed 
		
		
		$usrnamearray 		=  	@explode(' ',request()->get('full_name'));
		$firstname			=	@$usrnamearray[0];
		$lastname			=	@$usrnamearray[1].' '.$usrnamearray[2];
		$subscribe			=	request()->get('subscribe');
		$renewal_type		=	request()->get('renewal_type');
		$promocode			=	request()->get('promo_code');
		
		$user = new User;
 		$user->first_name 	= 	$firstname;
        $user->last_name  	= 	$lastname;
        $user->username   	= 	request()->get('email');
        $user->email      	= 	request()->get('email');
        $user->password   	= 	Hash::make(request()->get('password'));
		$user->user_group	= 	'5'; 	
		$user->user_plan	= 	$plan;
		$user->subscribe	= 	isset($subscribe) ? $subscribe : '0';
		$user->renewal_type	= 	isset($renewal_type) ? $renewal_type : '0';
		$user->verify_code	=  $verify_code;				
		
		
		if(!empty($promocode)){
			
			$promoid			=	PromoCodes::where('promo_code',$promocode)->where('plan_id',$plan)->pluck('id');
			
			$user->promo_id		=	$promoid;
			$Promo	=	PromoCodes::find($promoid);
			
			$Promo->used	=	$Promo->used+1;
			$Promo->save();
			
		}
		
		if($type=='OT'){
			
			$otdata				=	OtLinks::where('link',$code)->first(); //echo"<pre>"; print_r($otdata); exit;
			$user->ot_id		=	$otdata->id;
			$user->user_group	= 	$otdata->usergroups_id;
			
			// update link to used
			$otlink = OtLinks::find($otdata->id);
			$otlink->status	=	'1';
			$otlink->used	=	'1';
			$otlink->save();	
		}
		
 		$user->save();
		
		//set invitation token
		$invtoken	=	md5($user->id); 
		$tkn	=	substr($invtoken,0,5).substr($invtoken,-5,5).substr($invtoken,15,5);
		$invtoken	=	$tkn.$id;
		$user->invition_token	=	$invtoken;
		$user->save();
		
		
		if($ref_code != NULL){			
			$ref_sender	=	User::where('invition_token','=',$ref_code)->first();
			$ref_id	=	$ref_sender->id;	
			$user->refrance_id	=  $ref_id;
			$user->save();
			Invitation::setUserReferance($user, $ref_id);
		}
		
		$profile = new Profile;
	    $profile->user_id = $user->id;
	    $profile->full_name = request()->get('full_name');
		$profile->additional_skills = '';
		$profile->extra_fields 		= '';
		$profile->isnew		= 1;
	    $profile->save();
		
		return $user->id;
	}
	
	
	public function ActivateUser($code)
	{
		$user	=	User::where('verify_code',$code)->first();
		
		if($user)
		{
			$user->verify_email	=	1;
			$user->verify_code	=	'';
			$user->save();
			
			return redirect('/login')->with('success',trans("success.email-verify"));
		}
		else
		{
			return redirect('/login')->withErrors(trans('error.verify-link-expire'));			
		}
	}
	
	public function VerifyUser($token){
		$user	=	User::where('invition_token',$token)->first();
		
		if(is_null($user)) return redirect('/')->withErrors(['User Not Found. Invalid Url']);
		
		if($user->verify_email	==	1)
		{
			return redirect('/login')->withErrors(['Already Verified. Please Login.']);
		}
		else
		{
			return view('subscribe.verify');
		}
	}
	
	
	public function PaypalNotifications(Request $request){
		
			$data	=	$request->all();
			
			 // update notification table			
			 $pnotification				=	new PaypalNotifications;
			 $pnotification->txn_type	=	$data['txn_type'];
			 $pnotification->subscr_id	=	$data['subscr_id'];
			 $pnotification->text		=	json_encode($data);
			 $pnotification->save();
				
				
			// update subscr_id to user table if txn type is signup
			if($data['txn_type']=='subscr_signup'){
				$custom				=	json_decode($data['custom']);
				$user				=	User::find($custom->user_id);
				$user->subscr_id	=	$data['subscr_id'];
				$user->save();
			}
			
			// update payment table on new payment
			if($data['txn_type']=='subscr_payment'){
				$payment					=	new Payments;
				$payment->subscr_id			=	$data['subscr_id'];
				$payment->txn_id			=	$data['txn_id'];
				$payment->payment_amt		=	$data['payment_gross'];
				$payment->payment_status	=	$data['payment_status'];
				$payment->save();
				
				$custom				=	json_decode($data['custom']);
				
				if($custom->period=="Y")
					$newexpire			=	date('Y-m-d H:s:i',(strtotime('+365 days',strtotime($payment->created_at))));
				else
					$newexpire			=	date('Y-m-d H:s:i',(strtotime('+30 days',strtotime($payment->created_at))));
				
				$user				=	User::find($custom->user_id);
				$user->expire		=	$newexpire;
				$user->save();
				
			}
			
			
			// delete user if user has cancle their subscription
			if($data['txn_type']=='subscr_cancel'){
				$custom				=	json_decode($data['custom']);
				$user	=	User::find($custom->user_id);
				$user->user_plan = 1;
				$user->save();
			}	
		 
	}
}