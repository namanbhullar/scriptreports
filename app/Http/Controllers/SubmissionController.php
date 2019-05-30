<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\RequestsAll;

use App\Models\Inbox;
use App\Models\Submission;
use App\Models\User;
use App\Models\Documents;

use Session;
use Auth;
use DB;

class SubmissionController extends Controller
{
    public function login(Request $request){
		//if($request->session()->has('submission')) return redirect('/submission-directory');
		
		return view('submission.login');
	}
	
	public function dologin(Request $request){
		
		if($request->get('password') != "submission"){ 
			return redirect('/submission-directory/login')->withErrors(trans('errors.wrong-password'));
		}
		
		Session::put('submission','yes');
		
		$redirect = $request->session()->pull('submission_redirect','/submission-directory');
		return redirect($redirect);
	}
	
	
	public function index(Request $request){
		
		$members	=	User::GetReaders('p'); 
		$featured	=	User::GetFeaturedUsers();
				
		return view('submission.list')->with([
													'members'=>$members,
													'featured'=>$featured,
													'data'=>$request->all()
													]);
		
	}
	
	public function view($id)
	{
		$user	=	User::findOrFail($id);
		$user->load('submission','profile');
		
		if(is_null($user->user_group != 4)) return view('errors.not-found');
		if(is_null($user->submission)){
			$sub	=	new Submission;
			$sub->user_id	=	$user->id;
			$sub->accept_submissions = 0;
			$sub->save();
			
			$user->load('submission');
		}
		
		
		
		return view('submission.view')->with('user',$user);
	}
	
	public function Edit(){
		$user	=	auth()->user();
		$submission	=	$user->submission;
		
		if(is_null($submission)) $submission = Submission::setNewSubmission();
		
		$submission->load('rfdoc');
		$reader	=	DB::table('lr_profile as p')
					->select('p.user_id')
					->addSelect('p.full_name')
					->addSelect('p.profile_img')
					->addSelect('r.*')
					->join('lr_request as r','r.receiver_id','=','p.user_id')
					->where('r.sender_id',$user->id)
					->where('r.request_status','accept')
					->get();
		
		
		return view('submission.edit')->with('submission',$submission)->with('readers',$reader);	
	}
	
	
	public function Update(Request $request){
		//echo "<pre>";print_r($_POST);exit;
		$submission	=	Auth::user()->submission;
		
		$submission->load('reader');
		
		$submission->description		=	($request->has('guideline_desc'))		?	$request->get('guideline_desc')	:	"";
		//$submission->stand_pack			=	($request->has('stand_pack'))			?	$request->get('stand_pack')		:	0;
		$submission->script				=	($request->has('script'))				?	$request->get('script')				:	0;
		$submission->logline			=	($request->has('logline'))				?	$request->get('logline')			:	0;
		$submission->synopsis			=	($request->has('synopsis'))				?	$request->get('synopsis')			:	0;
		$submission->coverage			=	($request->has('coverage'))				?	$request->get('coverage')			:	0;
		$submission->treatment			=	($request->has('treatment'))			?	$request->get('treatment')			:	0;
		$submission->character_break	=	($request->has('character_break'))		?	$request->get('character_break')	:	0;
		$submission->is_agree			=	($request->has('is_agree'))				?	$request->get('is_agree')			:	0;
		$submission->accept_submissions	=	($request->has('accept_submissions'))	?	$request->get('accept_submissions')	:	0;
		
		//set Reader ehich has to show front sibmission page
		if($request->has('reader') && is_array($request->get('reader')) && !$submission->reader->isEmpty()){
			$selectedReaders	=	$request->get('reader');
			foreach($submission->reader as $reader)
			{
				if(in_array($reader->id,$selectedReaders))
					$reader->status = 1;
				else
					$reader->status = 0;
				
				$reader->save();
			}
		}
		elseif(!$submission->reader->isEmpty())
		{
			$submission->reader->each(function($value,$index){
				$value->status = 0;
				$value->save();
			});
		}
		
		
		//possible value of $request->get('release_form_status')
		/*
		*	document :: When a document is selected for reease form
		*   uploaded :: When a Document is uploaded for release form
		*	no_select :: Nothing is selected Or Deleted
		*	unchanged :: Unchanged By user
		*/
		$release_status	=	$request->has('release_form_status') ? $request->get('release_form_status') : "";
		switch($release_status){
			
			case 'uploaded':
				$id	=	Documents::SaveDocuments(array('title'=>'Release Form '.date('jS M'),'type'=>'other'),$request->file('release_form'),Auth::user()->id);
				$submission->release_form		=	($id)	?	$id :	0;
			break;
			
			case 'unchanged':
			case 'document':
				$submission->release_form		=	($request->has('release_form_value'))	?	$request->get('release_form_value'):	0;
			break;
			
			case 'no_select':
			default:
				$submission->release_form	=	0;
			break;
		}
		
		//Check For Extra Docs
		$docs	=	array();
		if($request->has('additional_docs')){
			foreach($request->get('additional_docs') as $doc){
				$docs[$doc]	=	1;				
			}
			$submission->add_docs	=	count($docs) ? serialize($docs) : NULL ;
		}else{
			$submission->add_docs	=	NULL;
		}	
		
		$submission->push();
		
		return redirect('myaccount/script-manager/submission-guidelines')->with('success', trans('success.submission-save'));
	}
	
	public function AddRequest(Request $request){
		$user	=	Auth()->user();
		$id	=	$request->get('id');
		$request	=	new RequestsAll;
		$request->sender_id	=	$user->id;
		$request->receiver_id	=	$id;
		$request->request_type	=	'AddProfile';
		$request->request_status	=	'pending';
		$request->save();
		
		$other	=	array('redirect_url'=>'submission-profile-request','request_id'=>$request->id);
		Inbox::SendMessage($id,trans('sys-message.AddprofileSUB'),trans('sys-message.AddprofileMSG'),$other);
		
		
		return response()->json(['status'=>'ok','msg'=>trans('success.sent-request')]);
	}
	
	public function MemberDirectory(){
		$user	=	Auth::user();
		$readers	=	DB::table("lr_contacts as c")
						->join("lr_users as u ","c.contact_userid","=","u.id")
						->join("lr_profile as p","c.contact_userid","=","p.user_id")
						->select("u.id as user_id")
						->addSelect("p.full_name as full_name")
						->addSelect("p.profile_img as profile_img")
						->addSelect("p.company_name as company_name")
						->addSelect("p.title as title")
						->addSelect("p.brief_boi as brief_boi")
						->addSelect("p.extra_fields as extra_fields")
						->addSelect("u.user_group as user_group")
						->where("c.user_id","=",$user->id)
						->get();
		//echo "<pre>";print_r($query);exit;
		// set Iframe layout
		
		return view('member-directory.iframe-list', array('readers'=> $readers));	
	}
	
	public function RemoveReader(Request $request)
	{	
		auth()->user()->load('submission');
		if(is_null(auth()->user()->submission)) return response()->json(['status'=>'fail','msg'=>trans('errors.submission-not-found')]);
		
		$reader	=	auth()->user()->submission->reader()->where('id',$request->id)->with('user.profile')->first();
		
		if(is_null($reader)) return response()->json(['status'=>'fail','msg'=>trans('errors.reader-not-found')]);
		$name	=	$reader->user->profile->full_name;
		$reader->delete();
		return response()->json(['status'=>'ok','msg'=>trans('success.reader-remove-from-submission',['name'=>$name])]);
	}
}
