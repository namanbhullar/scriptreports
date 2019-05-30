<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Invitation;

use App\Models\User;

use Validator;

use App\Models\Contacts;

use URL;

use Auth;

use Mail;

class InvitesController extends Controller
{
    public function delete(request $request)
	{
		$invite	=	Invitation::findOrFail($request->id);
		if($invite->sender_id != auth()->user()->id) return response()->json(['status'=>'fail','msg'=>trans('errors.not-found','Record')]);
		$invite->delete();
		
		return response()->json(['status'=>'ok','msg'=>'Record Successfully deleted']);
	}
	
	public function search(request $request){
		$email	=	$request->get('email');
		
		$user	=	User::where('email','=',$email)->first();
		if($user)
		{
			if($user->id == auth()->user()->id) return response()->json(['status'=>'self']);
			
			$name		=	str_limit($user->profile->full_name,20);	
			$image	=	$user->profile->image;	
			
			$check	=	auth()->user()->contacts()->where('contact_userid',$user->id)->first();
			
			if(!is_null($check)){
				$html	=	'
<div class="col-1-1">
	<p style="margin-bottom:5px; text-center">'.$name.' ('.$email.') has already been added to your contacts.</p>
	<div class="col-1-3">
		<div class="thumbnail mrgtp5 small70 left">'.$image.'</div>
	</div>
	<div class="col-2-3 pullft10">
		<a target="_blank" class="mrgtp15 pro_link text-center" href="'.$user->link.'"><h5>'.$name.'</h5></a>
		<a class="mrgtp5 btn btn-primary" href="'.URL::to('/myaccount/contacts').'">Go To Contacts</a>
	</div>		
</div>';
			}else{
				$html	=	'
<div class="col-1-1">	
	<p style="margin-bottom:5px; text-center">This email ( '.$email.' ) is being used by '.$name.'</p>
	<div class="col-1-3">
		<div class="thumbnail mrgtp5 small70 left">'.$image.'</div>
	</div>
	<div class="col-1-3 pullft10">
		<a target="_blank" class="mrgtp15 pro_link text-center" href="'.$user->link.'"><h5>'.$name.'</h5></a>
		<a class="mrgtp5 btn btn-primary" href="javascript:void(0)" id="addTocontact">Add To Contacts</a>
	</div>
</div>';
			}
			
			return response()->json(['status'=>'ok','html'=>$html,'check'=> is_null($check),'id'=>$user->id]);
		}else{
			return response()->json(['status'=>'fail']);
		}
		
	}
	
	public function save(request $request)
	{
		$data	=	$request->all();
		$mails	=	$request->get('tag');
		
		$user	=	auth()->user();
		
		$rules = array('message' => 'required','subject'=>'required','tag'=>'required|array');
		$messages = array(
				'tag.required' => 'Please enter at least one email address',
			);
		
		$validator	=	Validator::make($data, $rules,$messages);
		if($validator->fails()){
			return back()->withErrors($validator)->withInput(); 
		}
		
		foreach($mails as $key=>$mail){
			//check that given input is an email
			$validator	=	Validator::make(array('email'=>$mail), array('email'=>'required|email'));
			if($validator->fails()) continue;
			
			$check = Invitation::where('sender_id','=',$user->id)->where('email','=',$mail)->first();
			if($check->id	!= NULL ){
				Invitation::destroy($check->id);
			}
			
			$invite	=	new Invitation;	
			$invite->sender_id	= $user->id;
			$invite->subject	=	$data['subject'];
			$invite->message	=	$data['message'];
			$invite->email		=	$mail;
			$invite->save();
			
			$maildata['username']	=	$user->profile->full_name;
			$maildata['email']	=	$mail;
			$maildata['name']	=	$mail;
			$maildata['body']=	$data['message'];
			$maildata['usermail']	=	$user->email;
			$maildata['inviteid']	=	$invite->id;
			$maildata['profileLink']	=	$user->link;
			
			$maildata['token']	=	$user->invition_token;
			
			Mail::send('emails.invitations', $maildata, function ($message) use ($maildata)
			 {
				$message->to($maildata['email'], $maildata['email'])->subject($maildata['username'].' is sending you an invite');
			});
		}
		
		return redirect('/myaccount/invite-friends')->with(['success'=>'Invitation was successfully sent.']);
	}
}
