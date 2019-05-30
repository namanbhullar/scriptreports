<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;
use Validator;

class Invitation extends Model
{
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lr_invites';
	
	public function sender()
	{
		return $this->belongsTo('App\Models\User','sender_id','id');
	}
	
	public function invtUser()
	{
		return $this->belongsTo('App\Models\User','send_to','id');
	}
	
	
	public function saveInvitation(request $request){		
		$data	=	$request->all();
		$mails	=	$request->get('tag');
		
		$rules = array('message' => 'required','subject'=>'required','tag'=>'required|array');
		$messages = array(
				'tag.required' => 'Please enter at least one email address',
			);
		
		$validator	=	Validator::make($data, $rules,$messages);
		if($validator->fails()){
			return $validator; 
		}
		
	
		//$rules2	=	array('')
		
		foreach($mails as $key=>$mail){
			//check that given input is an email
			$validator	=	Validator::make(array('email'=>$mail), array('email'=>'required|email'));
			if($validator->fails()) continue;
			
			$check = Invitation::where('sender_id','=',Auth::user()->id)->where('email','=',$mail)->first();
			if($check->id	!= NULL ){
				Invitation::destroy($check->id);
			}
			
			$invite	=	new Invitation;	
			$invite->sender_id	= Auth::user()->id;
			$invite->subject	=	$data['subject'];
			$invite->message	=	$data['message'];
			$invite->email		=	$mail;
			$invite->save();
			
			$maildata['username']	=	Auth::user()->profile->full_name;
			$maildata['email']	=	$mail;
			$maildata['name']	=	$mail;
			$maildata['body']=	$data['message'];
			$maildata['usermail']	=	Auth::user()->email;
			$maildata['inviteid']	=	$invite->id;
			$maildata['profileLink']	=	User::UserprofileLink(Auth::user()->id);
			
			$maildata['token']	=	User::check_InvitationToken(Auth::user()->id);
			
			Mail::send('emails.invitations', ['maildata' => $maildata], function ($message) use ($maildata)
			 {
				$mail->to($maildata['email'], $maildata['email'])->subject($maildata['username'].' is sending you an invite');
			});
		}
				
		return;		
	}
	
	public function setUserReferance($user, $ref_id){
		$email	=	request()->get('email');
		$check	=	Invitation::where('sender_id','=',$ref_id)->where('email','=',$email)->count();
		if($check){
			$invite		=	Invitation::where('sender_id','=',$ref_id)->where('email','=',$email)->first();
			$invite->accepted	=	1;
			$invite->send_to	=	$user->id;
			$invite->name		=	$user->first_name." ".$user->last_name;
			$invite->save();
		}else{
			$invite		=	new Invitation;
			$invite	->sender_id	=	$user->refrance_id;
			$invite->subject	=	"autosend";
			$invite->message	=	"autoinvitebyref";
			$invite->email		=	$email;
			$invite->accepted	=	1;
			$invite->send_to	=	$user->id;
			$invite->name		=	$user->first_name." ".$user->last_name;
			$invite->save();
		}
		$contact				=	new Contacts;
		$contact->contact_userid=	$ref_id;
		$contact->user_id		=	$user->id;
		$contact->first_name	=	User::find($ref_id)->first_name;
		$contact->last_name		=	User::find($ref_id)->last_name;
		$contact->type			=	1;
		$contact->status		=	1;
		$contact->save();
		
		$contact2				=	new Contacts;
		$contact2->contact_userid=	$user->id;
		$contact2->user_id		=	$ref_id;
		$contact2->first_name	=	$user->first_name;
		$contact2->last_name	=	$user->last_name;
		$contact2->type			=	1;
		$contact2->status		=	1;
		$contact2->save();
		return;
	}
}
