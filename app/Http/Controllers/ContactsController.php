<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use App\Models\RequestsAll;
use App\Models\Inbox;
use App\Models\Contacts;
use App\Events\NewNotificationForRequestEvent;
use App\Models\Notification;


use Validator;
use Event;

class ContactsController extends Controller
{
    public function create(Request $request)
	{
		//dd($request->all());
		
		$user_id	=	auth()->user()->id;
		
		// Validation rulles
		$rules = array('fname' => 'required','email' => 'required|email');
		
		$validator = Validator::make($request->all(), $rules,['fname.required'=>'First Name is Required']);
		
		// validate inputs
		if ($validator->fails())
		{
			return back()->withErrors($validator)->withInput();
		}
		
		
		
		$chkUser	=	User::where('email',$request->email)->first();
		
		
		if(!is_null($chkUser)){
			if($chkUser->id ==	auth()->user()->id) return redirect()->route('contacts.index')->withErrors(trans('errors.contact-own-email'));
			
			$UserContact	=	auth()->user()->contacts()->where('contact_userid' ,$chkUser->id)->first();
			
			if(!is_null($UserContact)) 
				return redirect()->route('contacts.index')->withErrors(trans('errors.contact-already-exists',['email'=>$request->email,'name'=>$UserContact->first_name]));
		}
		else
		{
			$UserContact	=	auth()->user()->contacts()->where('email' ,$request->email)->first();
			
			if(!is_null($UserContact)) 
				return redirect()->route('contacts.index')->withErrors(trans('errors.contact-already-exists',['email'=>$request->email,'name'=>$UserContact->first_name]));
		}
		
		
		
		
		if(is_null($chkUser))
		{
			$contact			=	new Contacts;
			$contact->user_id	=	$user_id;
			$contact->title		=	$request->title;
			$contact->company	=	$request->company;
			$contact->first_name=	$request->fname;
			$contact->last_name	=	$request->lname;
			$contact->email		=	$request->email;
			$contact->cellphone	=	$request->cell_phone;
			$contact->busiphone	=	$request->bus_phone;
			$contact->address	=	$request->address;
			$contact->notes		=	$request->notes;
			$contact->type		=	2;
			$contact->status	=	1;
			$contact->save();
			
			return redirect()->route('contacts.index')->withSuccess(trans('success.contact-created'));
		}
		else
		{
			$contact				=	new Contacts;
			$contact->contact_userid=	$chkUser->id;
			$contact->user_id		=	$user_id;
			$contact->first_name	=	$chkUser->first_name;
			$contact->last_name		=	$chkUser->last_name;
			$contact->type			=	1;
			$contact->status		=	1;
			$contact->save();
			
			return redirect()->route('contacts.index')->withSuccess(trans('success.contact-created-wasMember',['email'=>$request->email,'name'=>$chkUser->first_name]));
		}		
	}
	
	public function ChagneStatus(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'id' => 'required',
			'status'=>'required',
        ]);
		
		if ($validator->fails()) {
            return response()->json(['status'=>'fails','msg'=>trans('errors.invalid-argument')]);
        }
		
		$user	=	auth()->user();
		
		if($request->get('type')=='reader-delete')
			$contact	=	$user->submission->reader()->where('id',$request->id)->first();
		else
			$contact	=	$user->contacts()->where('id',$request->id)->first();	
		
		if(is_null($contact)) return response()->json(['status'=>'fail','msg'=>trans('errors.not-found',['file'=>'Contact'])]);
		
		if($request->status == 'delete')
		{
			if($request->get('type')=='reader-delete'){
				$rquestall	=	RequestsAll::where('request_type','AddProfile')->where('sender_id',$user->id)->where('receiver_id',$contact->reader_id)->first();
				$rquestall->delete();		
			}
			$contact->delete();
			
			return response()->json(['status'=>'ok','msg'=>trans('success.file-delete',['file'=> $request->get('type')=='reader-delete' ? 'Reader' : 'Contact'])]);
		}
		elseif($request->status == 'archived')
		{
				$contact->status	=	0;
				$contact->save();
				return response()->json(['status'=>'ok','msg'=>trans('success.move-to-folder',['file'=>'Contact','to'=>'Archived'])]);
		}
		else
		{
				$contact->status	=	1;
				$contact->save();
				$tab	=	($contact->type	==	2) ? "Guests" : "Members";
				return response()->json(['status'=>'ok','msg'=>trans('success.move-to-folder',['file'=>'Contact','to'=>$tab]),'tab'=>$tab]);
		}
	}
	
	
	
	
	public function edit($id)
	{
		$user	=	auth()->user();
		
		$contact	=	$user->contacts()->where('id',$id)->first();
		
		if(is_null($contact)) return redirect()->route('contacts.index')->withErrors(trans('errors.not-found',['file'=>'Contact']));
		
		return view('contacts.edit')->with('contact',$contact);
	}
	
	public function update($id, Request $request)
	{
		$user	=	auth()->user();
		
		$contact	=	$user->contacts()->where('id',$id)->first();
		
		if(is_null($contact)) return redirect()->route('contacts.index')->withErrors(trans('errors.not-found',['file'=>'Contact']));
		
		$contact->title		=	$request->title;
		$contact->company	=	$request->company;
		$contact->first_name=	$request->fname;
		$contact->last_name	=	$request->lname;
		$contact->email		=	$request->email;
		$contact->cellphone	=	$request->cell_phone;
		$contact->busiphone	=	$request->bus_phone;
		$contact->address	=	$request->address;
		$contact->notes		=	$request->notes;
		$contact->save();
		
		return redirect()->route('contacts.index')->withSuccess(trans('success.contact-edit'));
	}
	
	
	public function addMember($to,$from){
	
		$toUser	=	User::findOrFail($to);
		$fromUser	=	User::findOrFail($from);
		
		//Serch member if it is already in user contact
		$check	=	Contacts::where('user_id',$from)->where('contact_userid',$to)->count();		
		if($check > 0) return  response()->json(array('status'=>'Fail','msg'=>trans('errors.already-in-contact',array('name'=>$toUser->profile->full_name))));
		
		//check old request
		$Rcheck	= RequestsAll::where('sender_id',$fromUser->id)->where('receiver_id',$toUser->id)->count();
		
		if($Rcheck) return response()->json(array('status'=>'fail','msg'=>trans('errors.request-already-sent',['name'=>$toUser->profile->full_name])));
		
		//Entry in Request table
		$request	=	new RequestsAll;
		$request->sender_id	=	auth()->user()->id;
		$request->receiver_id	=	$toUser->id;;
		$request->request_type	=	'AddContact';
		$request->request_status	=	'pending';
		$request->status	=	1;
		$request->save(); 
				
		Event::fire( new NewNotificationForRequestEvent($request,new Notification,'contactaddbyinvite') );
	
		//Send an confirmation inbox message to user
		/*$message	=	'Please add me to your contacts.';
		$message_ids	=	Inbox::SendMessage($to,'Contact Request',$message,array(
																					'request_id'=>$request->id,
																					'redirect_url'=>'contactaddbyinvite'
																					));*/
																					
																					
		return response()->json(array('status'=>'ok','msg'=>trans('success.request-sent',array('name'=>$toUser->profile->full_name))));		
	}
}
