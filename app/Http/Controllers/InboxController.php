<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Inbox;
use App\Models\Inboxdetail;
use App\Models\Attachments;
use App\Models\ShareScript;
use App\Models\PrivateNotes;
use App\Models\Documents;
use App\Models\RequestsAll;
use App\Models\ApproveReader;
use App\Models\Notification;

use App\Events\NewNotificationEvent;

use Validator;

class InboxController extends Controller
{
    public function index(){
		$userId	=	auth()->user()->id;
		$messages	=	Inbox::where('receiver_id',$userId)->orwhere('sender_id',$userId)->with(['inboxdetail'=>function($query)
		{
				$query->orderBy('created_at','desc')->get();
				
		},'receiver.profile','sender.profile'])->orderBy('id','desc')->get();
		
		return view('message.index')->with(['messages'=>$messages]);
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
		
		$userId	=	auth()->user()->id;
		$inbox	=	Inbox::findOrFail($request->id);
		
		if($inbox->sender_id	!=	$userId && $inbox->receiver_id	!=	$userId) 
			return response()->json(['status'=>'fail','msg'=>trans('errors.not-found',['file'=>'Message'])]);
		
		$isSender	=	$inbox->sender_id	==	$userId;
		$return	=	[];
		
		switch($request->status)
		{
			case 'unread':
				if($isSender)	$inbox->s_status	=	1;
				else 			$inbox->r_status	=	1;
				
				$return['msg']			=	trans('success.mes-unread');
				$return['status']		=	'ok';
				
			break;
			
			case 'read':
				if($isSender)	$inbox->s_status	=	0;
				else 			$inbox->r_status	=	0;
				
				$return['msg']	=	trans('success.mes-read');
				$return['status']	=	'ok';
				
			break;
			
			case 'unarchived':
				if($isSender)	$inbox->s_archived	=	0;
				else 			$inbox->r_archived	=	0;
				
				$return['msg']	=	trans('success.mes-unarchive');
				$return['status']	=	'ok';
				$return['is_message']	=	($isSender) ? 0 : 1 ;
			break;
			
			case 'archived':
				if($isSender)	$inbox->s_archived	=	1;
				else 			$inbox->r_archived	=	1;
				
				$return['msg']	=	trans('success.mes-archive');
				$return['status']	=	'ok';
			break;
			
			case 'delete':
				if($isSender)	$inbox->s_status	=	-1;
				else 			$inbox->r_status	=	-1;
				
				$return['msg']	=	trans('success.mes-delete');
				$return['status']	=	'ok';
				
			break;
			
			case 'unfavorite':
				if($isSender)	$inbox->s_favorite	=	0;
				else 			$inbox->r_favorite	=	0;
				
				$return['msg']	=	trans('success.mes-unfav');
				$return['status']	=	'ok';				
			break;
			
			case 'favorite':
				if($isSender)	$inbox->s_favorite	=	1;
				else 			$inbox->r_favorite	=	1;
				
				$return['msg']	=	trans('success.mes-fav');
				$return['status']	=	'ok';				
			break;
		}
		
		$inbox->save();
		
		if($inbox->s_status == -1 && $inbox->r_status == -1)
		{
			$inbox->delete();
			Inboxdetail::where('inbox_id',$request->id)->delete();
		}
		
		$return['inunread']		=	auth()->user()->MessageReceivedByMe()->where('r_status',1)->count();
		$return['outunread']	=	auth()->user()->MessageSendedByMe()->where('s_status',1)->count();
		$return['ttunread']		=	auth()->user()->MessageReceivedByMe()->where('r_status',1)->count() + auth()->user()->MessageSendedByMe()->where('s_status',1)->count();				
				
		return response()->json($return);
	}
	
	public function sendMessage(Request $request)
	{
		//dd($request->all());
		$data		=	$request->all();
		$user_id	=	auth()->user()->id;
		$redirectURL	=	$request->has('redirect_url') ? $request->get('redirect_url') : 'myaccount/message' ;
		
		$rules = array('message' => 'required', 'subject'=>'required');		
		$validator = Validator::make($data, $rules);
		if ($validator->fails())
			return back()->withErrors(implode('<br/>',$validator->messages()->all()));
			
		
		if(isset($data['member']) && !empty($data['member']))
		{
			$data['redirect_url']	=	$redirectURL;
			$inbox	=	Inbox::SendMessage($data['member'], $data['subject'], $data['message'], $data);
			
			if(isset($data['script_id'])  && !empty($data['script_id']))
			{
				$share	=	new ShareScript;
				$share->status	=	1;
				$share->sender_id	=	auth()->user()->id;
				$share->share_to	=	$data['member'];
				$share->script_id	=	$data['script_id'];
				$share->permissions	=	!empty($data['permission']) ? $data['permission'] : 'view';
				$share->save();
			}
		}
		else
		{
			return back()->withError('Invalid Argument');
		}
		
		return back()->with('success', 'Your message has been sent');
		//return redirect($redirectURL)->with('success', 'Your message has been sent');
		
	}
	
	
	//View Message
	public function ViewMessage($id)
	{
		$inbox	=	Inbox::findOrFail($id);	
		if($inbox->receiver_id != auth()->user()->id  && $inbox->sender_id != auth()->user()->id) 
			return redirect('myaccount/message')->withErrors([trans('errors.message-not-authorized')]);
		
		if($inbox->receiver_id == auth()->user()->id) $inbox->r_status = 0;
		else $inbox->s_status = 0;
		$inbox->save();
		
		auth()->user()->notification()->where('item_id',$inbox->id)->update(['is_seen'=>1]);
		
		return view('message.view')->with(['inbox'=>$inbox]);
	}
	
	
	//replay Message Function
	public function ReplyMessage($id,Request $request)
	{
		if(empty($request->message)) return back()->withErrors(["Message cann't be empty"]);
		$user_id	=	auth()->user()->id;
		
		$inbox	=	Inbox::findOrFail($id);
		if($user_id == $inbox->sender_id)
			$inbox->r_status = 1;
		else
			$inbox->s_status = 1;
		
		$inbox->save();
		
		$inboxdetail				=	new Inboxdetail;
		$inboxdetail->sent_by		=	$user_id;
		$inboxdetail->message		=	$request->message;
		$inboxdetail->inbox_id		=	$inbox->id;
		$inboxdetail->save();
		
		//Krys that function will accept as an  attachments
		$attacments	=	['template_id','report_id','script_id','document_id','request_id'];
		$data	=	$request->all();
		foreach($data as $key=>$data)
		{
			if(!in_array($key,$attacments)) continue;
			
			if($key	==	'document_id'){
				$documents	=		explode(',',$data);
				if(count($documents))
				{
					foreach($documents as $document)
					{	
						Attachments::SaveAttchment($inboxdetail->id,$document,'document');
					}
				}
			}
			else
			{
				Attachments::SaveAttchment($inboxdetail->id,$data,substr($key,0,-3));
			}
		}
		
		
		
		
		
		if(request()->hasFile('attach_file'))
		{
			foreach(request()->file('attach_file') as $file)
			{
				
				if(is_object($file) && $file->isValid())
				{
					$dox_name	=	$file->getClientOriginalName();
					$mime	=	$file->getClientMimeType();
					
					$dox	=	new Documents();
					$dox->user_id	=	auth()->user()->id;
					$dox->title	=	$dox_name;
					$dox->file_name	=	$dox_name;
					$dox->type	=	'other';
					$dox->file_mime	=	$mime;
					$dox->status	=	-1;
					$dox->save();
					
					$destinationPath    = 'public/uploads/profiles/users/'.auth()->user()->id.'/mydocuments/'.$dox->id; 
					$file->move($destinationPath,$dox_name);
					
					Attachments::SaveAttchment($inboxdetail->id,$dox->id,'attachment');
				}
			}
		}
		$inboxdetail->load('inbox','attachments','template','script','report','request','sender');
		event( new NewNotificationEvent($inboxdetail,new Notification,'message-recieve') );		
		return back()->withSuccess(trans('success.mes-sent'));
		
	}
	
	public function SaveNotes($id,Request $request)
	{
		$userid	=	auth()->user()->id;
		$notes	=	Inbox::find($id)->privatenotes()->where('user_id',auth()->user()->id)->where('status',1)->first();
		
		//dd($request->notes);
		if(!is_null($notes))
		{
			$notes->note	=	$request->notes;
			$notes->save();
		}
		else
		{
			$notes	=	new PrivateNotes();
			$notes->user_id	=	$userid;
			$notes->item_id	=	$id;
			$notes->item_type	=	'message';
			$notes->note	=	$request->notes;
			$notes->status	=	1;
			$notes->save();
		}	
		
		return response()->json(['status'=>'ok','msg'=>'Saved Successfully']);
	}
}
