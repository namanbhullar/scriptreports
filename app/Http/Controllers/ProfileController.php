<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use App\Models\Profile;

use App\Models\WritingProjects;

use App\Models\Classes;

use App\Models\Contests;

use App\Models\FeaturedProjets;

use App\Models\Address;

use App\Models\User;

use App\Models\RequestsAll;

use App\Models\Inbox;
use Redirect;

class ProfileController extends Controller
{
    public function ProfileView($id)
	{
		$user	=	User::find($id);
		$user->load('profile','plan');
		//dd($user);
		
		
		if($user->plan->plan_price <= 0) return view('errors.not-found')->with(['heading'=>'User','message'=>'Not Found']);
		
		if($user->user_group == 4)
		{
			return view('profile.producerView')->with(['user'=>$user]);
		}
		else
		{
			return view('profile.view')->with(['user'=>$user]);
		}
		
	}
	
	public function ProfilePeivateView($token)
	{
		$user	=	User::where('invition_token',$token)->first();	
		if(is_null($user)) return view('errors.not-found')->with(['heading'=>'User','message'=>'Not Found']);
		
		if($user->user_group == 4)	return view('profile.producerView')->with(['user'=>$user]);
		else	return view('profile.view')->with(['user'=>$user]);
	}
	
	public function Edit()
	{
		if(auth()->user()->user_group == 4)
		{
			return view('profile.producerEditProfile');
		}
		else
		{	
			return view('profile.edit');
		}
	}
	
	
	public function Update(Request $request)
	{
		//dd($request->all());
		
		$isProUser	=	auth()->user()->plan->id > 2 ? true : false	;
		
		if($isProUser)
			$validator = Validator::make($request->all(), ['full_name'=>'required','brief_boi'=>'required']);
		else
			$validator = Validator::make($request->all(), ['full_name'=>'required']);	
		
		// validate inputs
		if ($validator->fails())
		{
			//dd($validator->messages()); exit;
			return Redirect::to('myaccount/profile/edit')->withErrors($validator);
			//return back()->withEorror($validator)->withInput();
		}
		
		$user	=	auth()->user();
		$profile	=	$user->profile;
		
		//uploading Profile Image
		if(!empty($request->hasFile('profile_imgage')))
		{
			$file	=	$request->file('profile_imgage');
			
			if($file->isValid())
			{
				$destinationPath    = 'public/uploads/profiles/users/'.$profile->user_id;
				$name				=	$file->getClientOriginalName();
				$upload_success     = $file->move($destinationPath, $name);
				
				//remove Old image;
				if(!empty($profile->profile_img) && file_exists($destinationPath.'/'.$profile->profile_img)){ 
					unlink($destinationPath.'/'.$profile->profile_img); 
				}
				$profile->profile_img			=	$name;
			}
		}
		
		// upload sample coverage
		$scoverage	=	$request->hasFile('sample_coverageimg') ? $request->file('sample_coverageimg') : false;
		
		if($scoverage && $scoverage->isValid() && $request->get('coverageStatus') == 'selected')
		{			
			$destinationPath    = 'public/uploads/profiles/users/'.$profile->user_id; 
			$name				=	$scoverage->getClientOriginalName(); 
			$upload_success     = $scoverage->move($destinationPath, $name);
			
			// remove old sample
			if(!empty($profile->sample_coverage) && file_exists($destinationPath.'/'.$profile->sample_coverage))
			{ 
				unlink($destinationPath.'/'.$profile->sample_coverage); 
			}			
			$profile->sample_coverage		=	$name;
		}
		
		if($request->get('coverageStatus') == 'no-select' && !empty($profile->sample_coverage))
		{
			$destinationPath    = 'public/uploads/profiles/users/'.$profile->user_id; 
			if(file_exists($destinationPath.'/'.$profile->sample_coverage))
			{
				unlink($destinationPath.'/'.$profile->sample_coverage); 
			}
			$profile->sample_coverage		=	null;
		}
		
		$profile->full_name	=	$request->get('full_name');
		$profile->brief_boi				=	$request->has('brief_boi') 			? $request->get('brief_boi') 		: null;
		$profile->company_name			=	$request->has('company_name') 		? $request->get('company_name') 	: null;
		$profile->location				=	$request->has('location') 			? $request->get('location') 		: null;
		$profile->title					=	$request->has('title') 				? $request->get('title') 			: null;
		$profile->about_me				=	$request->has('about_me') 			? $request->get('about_me') 		: null;
		$profile->additional_skills		=	$request->has('additional_skills') 	? $request->get('additional_skills'): null;
		$profile->extra_fields			=	$request->has('extra_fields') 		? $request->get('extra_fields') 	: null;
		$profile->website				=	$request->has('website') 			? $request->get('website') 			: null ;
		$profile->twitter				=	$request->has('twitter') 			? $request->get('twitter') 			: null ;
		$profile->facebook				=	$request->has('facebook') 			? $request->get('facebook') 		: null ;
		$profile->linkedin				=	$request->has('linkedin') 			? $request->get('linkedin') 		: null ;
		$profile->imdb					=	$request->has('imbd') 				? $request->get('imbd') 			: null ;
		$profile->education				=	$request->has('education') 			? $request->get('education') 		: null ;
		$profile->industry_experience	=	$request->has('industry_experience')? $request->get('industry_experience') : null ;
		$profile->languages				=	$request->has('languages') 			? $request->get('languages') 			: null ;
		$profile->awards				=	$request->has('awards') 			? $request->get('awards') 				: null ;
		$profile->script_speciality		=	$request->has('script_speciality') 	? $request->get('script_speciality')	: null;
		$profile->writing_partner		=	$request->has('writing_partner') 	? $request->get('writing_partner')	: null;
		$profile->script_exchange		=	$request->has('script_exchange') 	? $request->get('script_exchange')	: null;
		$profile->isnew					=	0;
		
		if($request->has('address') && is_array($request->get('address')) && !is_array_empty($request->get('address')))
		{
			$add	=	$request->get('address');
			$address	=	($profile->address_id) ? $profile->address : new Address;
			
			$address->user_id=	$profile->user_id;
			$address->street=	!empty($add['street']) ? $add['street'] : null;
			$address->city 	=	!empty($add['city']) ? $add['city'] : null;
			$address->state =	!empty($add['state']) ? $add['state'] : null;
			$address->zip	=	!empty($add['zip']) ? $add['zip'] : null;
			$address->phone =	!empty($add['phone']) ? $add['phone'] : null;
			$address->country=	!empty($add['country']) ? $add['country'] : null;
			$address->cell 	=	!empty($add['cell']) ? $add['cell'] : null;
			
			$address->save();
			
			$profile->address_id	=	$address->id ;
		}
		
		$profile->save();
		
		//Save Project of both (Reader's project And Producer's Fetuar Projects)
		if($request->has('project'))
		{ 
			$projects	=	$request->get('project');
			if(is_array($projects))
			{
				FeaturedProjets::SaveNew($projects,$profile,$request);
			}
		}
		else
		{
			$FeaturedProjets	=	$profile->FeatureProjects()->get();
			
			if(!$FeaturedProjets->isEmpty())
			{
				foreach($FeaturedProjets as $project)
				{
					$project->delete();
				}
			}
		}
		
		
		//Only for reader and Writer
		if($user->user_group != 4)
		{
			//Save Script For Reader/Writer Profile
			if($request->has('script'))
			{
				WritingProjects::SaveNew($request->get('script'),$profile,$request);
			}
			else
			{
				$scripts	=	$profile->WrittingProjects()->get();
				
				if(!$scripts->isEmpty())
				{
					$scripts->map(function($script,$index)
									{
										$script->delete();
									});
				}
			}
		}
			
		
		//Enter The Producer Profile section
		if($user->user_group == 4)
		{
			//Save Classes For Producer Profile
			if($request->has('classes'))
			{
				Classes::SaveNew($request->get('classes'),$profile,$request);
			}
			else
			{
				$classes	=	$profile->Classes()->get();
				
				if(!$classes->isEmpty())
				{
					$classes->map(function($classe,$index)
									{
										$classe->delete();
									});
				}
			}
			
			//Save Contest For Producer Profile
		
			if($request->has('contest'))
			{
				Contests::SaveNew($request->get('contest'),$profile,$request);
			}
			else
			{
				$contests	=	$profile->Contests()->get();
				
				if(!$contests->isEmpty())
				{
					$contests->map(function($contest,$index)
									{
										$contest->delete();
									});
				}
			}
		}
		
		
		return redirect('myaccount/profile/edit');
	}
	
	
	
	public function ScriptRequest(Request $request){
		
		$user	=	Auth()->user();
		$name		=	$request->get('name');
		$rid		=	$request->get('rid');
		$itemid		=	$request->get('id');
		
		$request				=	new RequestsAll;
		$request->sender_id		=	$user->id;
		$request->receiver_id	=	$rid;
		$request->item_id		=	$itemid;
		$request->request_type	=	'ScritView';
		$request->request_status	=	'pending';
		$request->save();
		
		$other	=	array('redirect_url'=>'script-view-request','request_id'=>$request->id);
		Inbox::SendMessage($rid,sprintf(trans('sys-message.ScriptReqeustSUB'),$user->profile->full_name,$name),sprintf(trans('sys-message.ScriptReqeustMSG'),$name),$other);
		
		return response()->json(['status'=>'ok','msg'=>trans('success.sent-script-request')]);
	}
}
