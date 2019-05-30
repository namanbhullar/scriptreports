<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;
use Auth;
use URL;

use App\Models\RequestsAll;
use App\Models\ApproveReader;
use App\Models\Contacts;
use App\Models\Notification;

class RequestController extends Controller
{
    public function setRequestReqsult(Request $request)
	{
		$validator = Validator::make($request->all(),['request_id'=>'required','result'=>'required|in:accepted,declined']);
		
		if($validator->fails()) return response()->json(['status'=>'fails','msg'=>'Invalid Arguments.']); 
		
		$requestObj		=	RequestsAll::find($request->request_id);
		
		if(is_null($requestObj)) return response()->json(['status'=>'fails','msg'=>'Invalid Arguments. Models Not Found']); 
		if($requestObj->receiver_id != auth()->user()->id) return response()->json(['status'=>'fails','msg'=>'Invalid Arguments.']); 
		
		$requestObj->request_status	=	$request->result;
		$requestObj->save();
		
		$requestObj->load('sender.submission','receiver.submission','attachment.inboxdetail.inbox');
		
		switch($requestObj->request_type)
		{
			case 'AddProfile':
			
			$CKFORSB	=	$requestObj->sender->submission->reader()->where('reader_id',$requestObj->receiver_id);
				
			if($CKFORSB->count())
				$CKFORSB->delete();
					
			if($request->result == 'accepted')
			{
				
					
				ApproveReader::create([
						'submission_id'=>$requestObj->sender->submission->id,
						'reader_id'=>$requestObj->receiver->id,
						'request_id'=>$requestObj->id,
						'status'=>1,
						 ]);
				
				Notification::create([
									'user_id'=>$requestObj->sender_id,
									'sender_id'=>$requestObj->receiver->id,
									'type'=>'addprofile-request-accept',
									'is_seen'=>0,
									'item_id'=>$requestObj->attachment->inboxdetail->inbox->id,
									'message'=>trans('notification.addprofile-request-accept',['name' => "<a target='_blank' href='".url::to('/profile/'.$requestObj->receiver->id.'/view')."'>".$requestObj->receiver->first_name."</a>"]),
									'notification_type'=>2
									]);
			}
			else
			{
				Notification::create([
									'user_id'=>$requestObj->sender_id,
									'sender_id'=>$requestObj->receiver->id,
									'type'=>'addprofile-request-decline',
									'is_seen'=>0,
									'item_id'=>$requestObj->attachment->inboxdetail->inbox->id,
									'message'=>trans('notification.addprofile-request-decline',['name' => "<a target='_blank' href='".url::to('/profile/'.$requestObj->receiver->id.'/view')."'>".$requestObj->receiver->first_name."</a>"]),
									'notification_type'=>2
									]);
			}
			break;
			
			case 'AddContact':
				//Check For Old Contact in recevier that is not exists				
				$CFOCR	=	$requestObj->receiver->contacts()->where('contact_userid',$requestObj->sender_id)->first();
				
				//Check For Old Contact in Sender that is not exists				
				$CFOCS	=	$requestObj->sender->contacts()->where('contact_userid',$requestObj->receiver_id)->first();
				
				if($request->result == 'declined')
				{
					if(!is_null($CFOCR)) $CFOCR->delete();
					if(!is_null($CFOCS)) $CFOCS->delete();
					
					Notification::create([
									'user_id'=>$requestObj->sender_id,
									'sender_id'=>$requestObj->receiver->id,
									'type'=>'contect-request-decline',
									'is_seen'=>0,
									'item_id'=>0,
									'message'=>trans('notification.contect-request-decline',['name' => "<a target='_blank' href='".url::to('/profile/'.$requestObj->receiver->id.'/view')."'>".$requestObj->receiver->first_name."</a>"]),
									'notification_type'=>2
									]);
					
					return response()->json(['status'=>'ok','msg'=>trans('success.request-decline')]);
				}
				
				if(is_null($CFOCR))
				{
					Contacts::create([
								'contact_userid'=>$requestObj->sender_id,
								'user_id'=>$requestObj->receiver_id,
								'first_name'=>$requestObj->sender->first_name,
								'last_name'=>$requestObj->sender->last_name,
								'type'=>1,
								'status'=>1
								]);
					
				}
				
				if(is_null($CFOCS))
				{
					Contacts::create([
								'contact_userid'=>$requestObj->receiver_id,
								'user_id'=>$requestObj->sender_id,
								'first_name'=>$requestObj->receiver->first_name,
								'last_name'=>$requestObj->receiver->last_name,
								'type'=>1,
								'status'=>1
								]);
					
				}
				
				Notification::create([
									'user_id'=>$requestObj->sender_id,
									'sender_id'=>$requestObj->receiver->id,
									'type'=>'contect-request-accept',
									'is_seen'=>0,
									'item_id'=>0,
									'message'=>trans('notification.contect-request-accept',['name' => "<a target='_blank' href='".url::to('/profile/'.$requestObj->receiver->id.'/view')."'>".$requestObj->receiver->first_name."</a>"]),
									'notification_type'=>2
									]);
				
				return response()->json(['status'=>'ok','msg'=>trans('success.request-accepted')]);
			break;
		}
		
		return response()->json(['status'=>'ok','msg'=>trans('success.request-result-set')]);		
	}
}
