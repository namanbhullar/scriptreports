<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use User;
use DB;
use Validator;
use App\Models\Scripts;
use App\Models\ScriptAgent;
use App\Models\ScriptManager;
use App\Models\Address;
use App\Models\ShareScript;
use App\Models\Documents;
use App\Models\PrivateNotes;
use App\Models\Inbox;

class ScriptsController extends Controller
{
	
	public function index(Request $request){
		$user_id	=	auth()->user()->id;
		$AllScript	=	ShareScript::where('share_to',$user_id)->where('status','>',-1)->with('script','notes','sender','receiver')->orderBy('id','desc')->get();
		
		$AllScript	=	$AllScript->filter(function($value,$index){
				return !is_null($value->script);
		});
		
		if($request->has('search_script') || $request->has('form') || $request->has('genre'))
		{
			$AllScript	=	$AllScript->filter(function($value,$index) use ($request){
				$inSearch = true;$inForm = true;$inGenre = true;
				if($request->has('search_script')) 
					$inSearch = str_contains(strtolower($value->script->title), strtolower($request->get('search_script')));
					
				if($request->has('form') && !empty($request->get('form')))
				{
					if(is_array($value->script->form)) $inForm = strtolower($request->get('form')) == strtolower($value->script->form[0]);
					else $inForm = false;
				}
				
				if($request->has('genre') && !empty($request->get('genre')))
				{
					if(is_array($value->script->genre)) $inGenre = (strtolower($request->get('genre')) == strtolower($value->script->genre[0]));
					else $inGenre = false;		
				}
				return ($inGenre && $inForm && $inSearch) ? true : false;
			});
		}
		
		
		return view('script-manager.scripts.index')->with(['AllData'=>$AllScript]);
		
	}
	
	public function viewScript($id){
		$userid	=	auth()->user()->id;
		$script	=	Scripts::findOrFail($id);
		$is_auther	=	($userid==$script->created_by);
		//print_r($shared ); exit;
		if($is_auther)
		{
			$created_by = auth()->user();
			$track	=	ShareScript::where('script_id',$id)->where('share_to','=',$userid)->where('sender_id','=',$userid)->first();
			return view('script-manager.scripts.view', array('script'=>$script,'created_by'=>$created_by,'track'=>$track));
		}
		else
		{
			$check	=	ShareScript::where('script_id','=',$id)->where('share_to','=',$userid)->where('status','>',-1)->count();
			
			if($check > 0)
			{
				$track_id	=	ShareScript::where('script_id','=',$id)->where('share_to','=',$userid)->where('status','>',-1)->orderBy('id','DESC')->take(1)->pluck('id');
				return redirect('/myaccount/script-manager/scripts/'.$id.'/view/'.$track_id[0]);
			}
			else
			{				
				return redirect('/myaccount/script-manager/scripts')->withErrors(trans('error.myscript-view'));
			}
		}
	}
	
	public function scriptShareView($script_id,$trak_id)
	{
		$user	=	auth()->user();
		$script =	Scripts::findOrFail($script_id);
		
		if($script->created_by == $user->id) return redirect()->route('script.view',$script_id);
		
		$track	=	ShareScript::findOrFail($trak_id);
		if($track->share_to	!=	$user->id) return redirect('/myaccount/script-manager/scripts')->withErrors(['Script Not Found']);
		
		if(is_null($track->first_view)) $track->first_view = date('d-m-Y');
		$track->last_view = date('d-m-Y');
		$track->is_seen = 1;
		$track->save();
		
		return view('script-manager.scripts.view', array('script'=>$script,'created_by'=>$created_by,'track'=>$track));
	}
	
	public function ChangeStatus(Request $request){
		
		
		$validator = Validator::make($request->all(), [
            'id' => 'required',
			'status'=>'required',
        ]);
		
		if ($validator->fails()) {
            return response()->json(['status'=>'fails','msg'=>trans('errors.invalid-argument')]);
        }
		
		$id			=	$request->id;
		$value		=	$request->status;
		$user_id	=	auth()->user()->id;
		$track		= 	ShareScript::findOrFail($id);
		$is_auther	=	$track->sender_id == $track->share_to;
		
		
		
		
		//$track	=	$is_auther ? false : Scripts::getTracker($id,$user_id);
		
		$current_status	=	$track->status;
		$oldstatus		=	$track->last_status;
		$new_staus		=	($value == 2) ? $oldstatus : $value;
		
		if($value != -99)
		{			
			if($track)
			{					
				$track->status	=	$new_staus;
				$track->last_status	=	$oldstatus;
				$track->save();
			}
			else
			{
				return  response()->json(array('status'=>'fails','msg'=>'You are not auther and No sharing data find for You.'));
			}
			
		}
		else
		{	
			if($is_auther)
			{				
				Scripts::destroy($track->script_id);
				$track->delete();
			}
			elseif($track)
			{				
				$track->status	=	-2;
				$track->save();
			}
			else
			{
				return response()->json(array('status'=>'fails','msg'=>'You are not auther and No sharing data find for You.'));
			}
		}
				
		$newnreadcount		=	Auth()->user()->ScriptSharedToME()->where('is_seen',0)->where('feedback_icon',NULL)->count();
		$prtunreadcount		=	Auth()->user()->ScriptSharedToME()->where('is_seen',0)->where('feedback_icon','Priority')->count();
		$otherunreadcount	=	Auth()->user()->ScriptSharedToME()->where('is_seen',0)->whereIn('feedback_icon',['recomd-writer','buy','Recommended','Considered','Rejected'])->count();
		$allcount			=	Auth()->user()->ScriptSharedToME()->where('is_seen',0)->count();
				
		return response()->json(array('status'=>'ok','old_staus'=>(int) $oldstatus,'is_author'=>(int) $is_auther,'newcount'=>$newnreadcount,'prtcount'=>$prtunreadcount,'othercount'=>$otherunreadcount,'allcount'=>$allcount));
	}	
	
	
	/** Remove and Adding Script to Auth User Profile ***/
	
	public function ScriptToProfile(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'id' => 'required',
			'status'=>'required',
        ]);
		
		if ($validator->fails()) {
            return response()->json(['status'=>'fails','msg'=>trans('errors.invalid-argument')]);
        }
		
		$user	=	auth()->user();
		
		if($request->status == 'removeProfile')
		{
			$script	=	Scripts::find($request->id);
			if(is_null($script)) return response()->json(['status'=>'fails','msg'=>trans('errors.not-found',['file'=>'script'])]);
		
			$is_auther	=	(auth()->user()->id == $script->created_by);
			if(!$is_auther) return response()->json(['status'=>'fails','msg'=>trans('errors.permission-denied')]);	
		
			$script->isposted	=	0;
			$script->save();
			return response()->json(['status'=>'ok','msg'=>trans('success.script-remove-from-profile')]);
		}
		else
		{
			$scripts	=	$user->scripts()->whereIn('id',explode(',',$request->id))->get();
			if($scripts->isEmpty()) return response()->json(['status'=>'fails','msg'=>trans('errors.not-found',['file'=>'script'])]);
			foreach($scripts as $script)
			{
				$script->isposted	=	1;
				$script->save();
			}
			
			return response()->json(['status'=>'ok','msg'=>trans('success.script-add-to-profile')]);
		}
		
	}
	
	
	public function PrivateNotesEdit(Request $request){
		$userid	=	auth()->user()->id;
		$data	=	$request->all();
		$script	=	Scripts::findOrFail($data['script_id']);
		$track	=	ShareScript::findOrFail($data['track_id']);
		$notes	=	$data['notes'];
		
		$is_auther	=	($script->created_by	==	$userid	);
		
		$track	=	ShareScript::where('script_id','=',$data['script_id'])->where('share_to','=',$userid)->where('status','>',0)->orderBy('id','DESC')->first();
		if(!$track) return response()->json(['staus'=>'fail','msg'=>trans('errors.not-found',['file'=>'script'])]);
		
		$PVnotes 	=	(!$track->notes) ? new PrivateNotes : $track->notes ;
		$PVnotes->user_id	=	$userid;
		$PVnotes->item_id	=	$track->id;
		$PVnotes->item_type	=	'script';
		$PVnotes->status	=	1;
		$PVnotes->note	=	$notes;
		$PVnotes->save();
				
		return response()->json(['status'=>'ok','msg'=>trans('success.pvt-notes-save')]);
	}
	
	
	public function SaveFeedbackIcon(Request $request){
		$userid	=	auth()->user()->id;
		$data	=	$request->all();
		$ruls	=	array( 'script_id'=>'required','track_id'=>'required', 'feedback'=>'required');
		$validator	=	Validator::make($data, $ruls);
		
		if($validator->fails()){
			return response()->json(array('status'=>'fail', 'msg'=>'Invalid Arguments'));
		}
		
		$script	=	Scripts::findOrFail($data['script_id']);
		
		if($script->created_by == $userid) return response()->json(['status'=>'fail','msg'=>'You can\'t send Feedback on your own scrips']);
		
		$track	=	ShareScript::findOrFail($data['track_id']);
		$track->feedback_icon = $data['feedback'];
		$track->save();		
		$newnreadcount		=	Auth()->user()->ScriptSharedToME()->where('is_seen',0)->where('feedback_icon',NULL)->count();
		$prtunreadcount		=	Auth()->user()->ScriptSharedToME()->where('is_seen',0)->where('feedback_icon','Priority')->count();
		$otherunreadcount	=	Auth()->user()->ScriptSharedToME()->where('is_seen',0)->whereIn('feedback_icon',['recomd-writer','buy','Recommended','Considered','Rejected'])->count();
		$allcount			=	Auth()->user()->ScriptSharedToME()->where('is_seen',0)->count();
				
		
		return response()->json(array('status'=>'ok','msg'=>trans('lang.script-fdbk-add'),'newcount'=>$newnreadcount,'prtcount'=>$prtunreadcount,'othercount'=>$otherunreadcount,'allcount'=>$allcount));
	}
	
	//function for text feedback of a script it will send reply message
	public function SendFeedback(Request $request){
		//return response()->json([$request->feedback, $request->id,'status'=>'ok','msg'=>'hello']);
		$userid	=	auth()->user()->id;
		$message	=	$request->feedback;
		if(empty($message))	return response()->json(array('status'=>'fail','msg'=>'Message not sent. Message Empty.'));
		
		$script	=	Scripts::findOrFail($request->id);
		
		if($script->created_by == $userid) return response()->json(['status'=>'fail','msg'=>'You can\'t send Feedback on your own scrips']);
		
		$track	=	Scripts::getTracker($request->id);
		
		if(!$track) return response()->json(array('status'=>'fail','msg'=>trans('erros.not-found',array('file'=>'script'))));
		
		$track->feedback_text	=	$message;
		$track->save();
		
		//Inbox::ReplyMessageByFunctions($track->inbox_id,$message);
		
		return Response::json(array('msg'=>'ok','msg'=>'Feedback was sent successfully.'));
	}
	
	
	public function Edit($id)
	{
		$script	=	Scripts::findOrFail($id);
		
		if($script->created_by != auth()->user()->id)
		{
			$track	=	Scripts::getTracker($id);			
			if(is_null($track)) return redirect('/myaccount/script-manager/scripts')->withErrors(trans('errors.not-found',['File'=>'Script']));
			if($track->permissions	!=	'edit') return redirect('/myaccount/script-manager/scripts')->withErrors(trans('errors.script-edit'));
		}
		
		return view('script-manager.scripts.add')->with(['script'=>$script]);
	}
	
	public function Update($id,Request $request)
	{
	///dd($request->all());
		if(empty($request->get('title'))) return back()->withInput()->withErrors(['Script Title is required']);
		
		$script	=	($id) ? Scripts::findOrFail($id) :  new Scripts;
		
		if($script->exists && $script->created_by != auth()->user()->id)
		{
			$script->load('track');
			$track	=	$script->track;			
			if(is_null($track)) return redirect('/myaccount/script-manager/scripts')->withErrors(trans('errors.not-found',['File'=>'Script']));
			if($track->permissions	!=	'edit') return redirect('/myaccount/script-manager/scripts')->withErrors(trans('errors.script-edit'));
		}
		
		$user	=	($id) ? $script->created_by : auth()->user()->id;
		
		$script->title		=	$request->has('title') 		? 	$request->get('title') : null;
		$script->draft_number=	$request->has('script_draft')?	$request->get('script_draft') : null;
		$script->draft_date	=	$request->has('draft_date') ?	$request->get('draft_date') : null;
		$script->submitted_by=	$request->has('submitted_by') ? $request->get('submitted_by') : null;
		$script->member_link=	$request->has('member_link') ?	$request->get('member_link') : null;
		$script->form		=	$request->has('form') 		?	$request->get('form') : null;
		$script->genre		=	$request->has('genre') 	?		$request->get('genre') : null;
		$script->subgenre	=	$request->has('subgenre') 	?	$request->get('subgenre') : null;
		$script->comparisons	=	$request->has('comparison') ? 	$request->get('comparison') : null;
		$script->budget_from=	$request->has('budget_from') ?	$request->get('budget_from') : 0;
		$script->budget_to	=	$request->has('budget_to') ?	$request->get('budget_to') : 0;
		$script->budget_type=	$request->has('budget_type') ?	$request->get('budget_type') : null;
		$script->rating		=	$request->has('rating') 	?	$request->get('rating') : null;
		$script->target_audience=$request->has('target_audience')?$request->get('target_audience') : null;
		$script->period		=	$request->has('period') ? 		$request->get('period') : null;
		$script->pages		=	$request->has('pages') ? 		$request->get('pages') : 0;
		$script->location	=	$request->has('location') 	?	$request->get('location') : null;
		$script->setting	=	$request->has('setting') 	?	$request->get('setting') : null;
		$script->script_info=	$request->has('script_info') ?	$request->get('script_info') : null;
		$script->writer_info=	$request->has('writer') 	?	$request->get('writer') : null;
		$script->logline 	=	$request->has('logline') 	?	$request->get('logline') : null;
		$script->synopsis 	=	$request->has('synopsis') 	?	$request->get('synopsis') : null;
		$script->story_by	=	$request->has('story') 		?	$request->get('story') : null;
		$script->source		=	$request->has('source') 		?	$request->get('source') : null;
		$script->created_by	=	$user;
		$script->status		=	1;
		$script->created_date	= $request->has('created_date') 		?	$request->get('created_date') : null;
		$script->save();
		
		if($request->has('agent')){
			$agentInput	=	$request->get('agent');
			$agent	=	($script->agent_id) ? ScriptAgent::find($script->agent_id) : new ScriptAgent;			
			$agent->script_id=	$script->id;
			$agent->name	=	$request->has('agent.name') ? $agentInput['name'] : null;
			$agent->company	=	$request->has('agent.company') ? $agentInput['company'] : null;
			$agent->phone	=	$request->has('agent.phone') ? $agentInput['phone'] : null;
			$agent->link	=	$request->has('agent.link')? $agentInput['link'] : null;
			
			if($request->has('agent.address')){
				$addressInput	=	$agentInput['address'];
				$addres	=	($agent->address_id) ? Address::find($agent->address_id) : new Address;
				$addres->user_id=	$user;
				$addres->street	=	$request->has('agent.address.street') ? $addressInput['street'] : null;
				$addres->city	=	$request->has('agent.address.city') ? $addressInput['city']: null;
				$addres->state	=	$request->has('agent.address.state') ? $addressInput['state']: null;
				$addres->zip	=	$request->has('agent.address.zip') ? $addressInput['zip']: null;
				$addres->country	=	$request->has('agent.address.country') ? $addressInput['country']: null;				
				$addres->save();
				
				$agent->address_id	=	$addres->id;
			}else{
				if($agent->address_id){
					Address::destroy($agent->address_id);
					$agent->address_id	=	0;
				}
			}
			$agent->save();
			$script->agent_id	=	$agent->id;
			
		}else{
			if($script->agent_id){
				Address::destroy($script->agent_id);
				$script->address_id	=	0;
			}
		}
		
		
		if($request->has('manager')){
			$managerInput	=	$request->get('manager');
			$manager	=	($script->manager_id) ? ScriptManager::find($script->manager_id) : new ScriptManager;			
			$manager->script_id=	$script->id;
			$manager->name	=	$request->has('manager.name') ?	$managerInput['name'] : null;
			$manager->company	=	$request->has('manager.company') ? $managerInput['company']  : null;
			$manager->phone	=	$request->has('manager.phone') ? $managerInput['phone']: null;
			$manager->link	=	$request->has('manager.link')? $managerInput['link']: null;
			
			$manager->save();
			
			if($request->has('manager.address')){
				$addressInput	=	$managerInput['address'];
				$addres	=	($manager->address_id) ? Address::find($manager->address_id) : new Address;
				$addres->user_id=	$user;
				$addres->street	=	$request->has('manager.address.street') ? $addressInput['street'] : null;
				$addres->city	=	$request->has('manager.address.city') ? $addressInput['city']: null;
				$addres->state	=	$request->has('manager.address.state') ? $addressInput['state']: null;
				$addres->zip	=	$request->has('manager.address.zip') ? $addressInput['zip']: null;
				$addres->country	=	$request->has('manager.address.country') ? $addressInput['country']: null;			
				$addres->save();
				
				$manager->address_id = $addres->id;
				
			}else{
				if($manager->address_id){
					Address::destroy($manager->address_id);
					$manager->address_id	=	0;
				}
			}
						
			$manager->save();
			$script->manager_id	=	$manager->id;
			
		}else{
			if($script->manager_id){
					Address::destroy($script->manager_id);
					$script->managers_id	=	0;
				}
			
		}
		
		$script->save();
		
		//print_r($script->documents);
		
		if($script->wasRecentlyCreated){ 
			//dump($request->all());
			ShareScript::share($script->id,$user,$user);
		}
			//File and Documents section
			$files=	['script'=>'Script','treatment'=>'Treatment','script_coverage'=>'Script Coverage','outline'=>'Outline','one-sheet'=>'One Sheet','charactor_list'=>'Charactor List'];
			$docs	=	[];
			foreach($files as $key =>$file){
				if($request->has('add_'.$key))
				{
					$docs[$file]	=	$request->get('add_'.$key);
				}
				elseif($request->hasFile($key))
				{
					$uplFile	=	$request->file($key);
					if($uplFile->isValid())
					{						
						$dox_name	=	$uplFile->getClientOriginalName();
						$mime		=	$uplFile->getClientMimeType();
						
						$dox	=	new Documents();
						$dox->title	=	$dox_name;
						$dox->file_name	=	$dox_name;
						$dox->type	=	'other';
						$dox->file_mime	=	$mime;
						$dox->status	=	-1;
						$dox->user_id	=	auth()->user()->id;
						$dox->save();
						$destinationPath    = 'public/uploads/profiles/users/'.auth()->user()->id.'/mydocuments/'.$dox->id; 
						$uplFile->move($destinationPath,$dox_name);
						
						$docs[$file]	=	$dox->id;
					}					
				}
			}
			
			if($request->has('other_docs'))
			{
				foreach($request->get('other_docs') as $key=>$other)
				{
					if($request->has("other_docs.$key.document"))
					{
						$docs[$other['name']]	=	$other['document'];
					}
					elseif($request->hasFile("other_docs.$key.file"))
					{
						$uplFile	=	$request->file("other_docs.$key.file");
						if($uplFile->isValid())
						{						
							$dox_name	=	$uplFile->getClientOriginalName();
							$mime	=	$uplFile->getClientMimeType();
							
							$dox	=	new Documents();
							$dox->title	=	$dox_name;
							$dox->file_name	=	$dox_name;
							$dox->type	=	'other';
							$dox->file_mime	=	$mime;
							$dox->status	=	-1;
							$dox->user_id	=	auth()->user()->id;
							$dox->save();
							$destinationPath    = 'public/uploads/profiles/users/'.auth()->user()->id.'/mydocuments/'.$dox->id; 
							$uplFile->move($destinationPath,$dox_name);
							
							$docs[$other['name']]	=	$dox->id;
						}					
					}
				}
			}
			
			
			//print_r($docs);
			//dump($request->all()); exit;
			
			if(count($request->all_docs))
				$script->documents	=	array_merge($request->all_docs,$docs);
			else
				$script->documents	=	$docs;	
				
			$script->save();
		
		
 		
		//dd($script->load('agent','manager'));
		//return back()->withInput();
		return redirect('myaccount/script-manager/scripts')->with(['success'=>trans('success.script-save')]);
	}
	
	public function uploadDocs(Request $request)
	{
		$ruls	=	array( 'id'=>'required','docs_title'=>'required','other_docs'=>'required|mime:pdf');
		$validator	=	Validator::make($request->all(), $ruls);
		
		$script	=	Scripts::findOrFail($request->id);
		
		//dd($script);
		
		$docs	=	($script->documents)  ? $script->documents : [];
		
		
		
		if(!$request->hasFile('other_docs')) return back()->withErrors('There was an error while uploading file please Try again.');
		$file	=	$request->file('other_docs');
		if($file->isValid())
		{
			$dox_name	=	$file->getClientOriginalName();
			$mime	=	$file->getClientMimeType();
			
			$dox	=	new Documents();
			$dox->title	=	$dox_name;
			$dox->file_name	=	$dox_name;
			$dox->type	=	'other';
			$dox->file_mime	=	$mime;
			$dox->status	=	-1;
			$dox->user_id	=	auth()->user()->id;
			$dox->save();
			$destinationPath    = 'public/uploads/profiles/users/'.auth()->user()->id.'/mydocuments/'.$dox->id; 
			$file->move($destinationPath,$dox_name);
			
			
			if(array_key_exists($request->docs_title,$docs))
			{
				if(!is_array($docs[$request->docs_title]))
				{
					$oldvalue	=	$docs[$request->docs_title];
					$docs[$request->docs_title] = [$oldvalue,$dox->id];
					$script->documents	=	$docs;
					$script->save();
				}
				else
				{
					$docs[$request->docs_title][] = $dox->id;
					$script->documents	=	$docs;
					$script->save();
				}
				
			}
			else
			{
				$docs[$request->docs_title] = $dox->id;
				$script->documents	=	$docs;
				$script->save();
			}
		}
		else return back()->withErrors('There was an error while uploading file please Try again.');
		
		return back()->with('success','File add Successfully.');
	}
	
	public function addDocument(request $request)
	{
		$script	=	Scripts::findOrFail($request->script_id);
		$documents	=	explode(',',$request->document);
		
		$scriptDocs	=	$script->documents;
		foreach($documents as $docs)
		{
			$dox	=	Documents::find($docs);
			if($dox){
				if(array_key_exists($dox->type,$scriptDocs))
				{
					if(!is_array($scriptDocs[$dox->type]))
					{
						$oldvalue	=	$scriptDocs[$dox->type];
						$scriptDocs[$dox->type] = [$oldvalue,$dox->id];
						$script->documents	=	$scriptDocs;
						$script->save();
					}
					else
					{
						$scriptDocs[$dox->type][] = $dox->id;
						$script->documents	=	$scriptDocs;
						$script->save();
					}
					
				}
				else
				{
					$scriptDocs[$dox->type] = $dox->id;
					$script->documents	=	$scriptDocs;
					$script->save();
				}
			}
		}
	}
	
	public function MsgToScptOwnr(Request $request){
		
		$validator	=	Validator::make($request->all(),['subject'=>'required','message'=>'required','script_id'=>'required']);
		
		if($validator->fails())	return back()->withErrors($validator);
		
		$script	=	Scripts::findOrFail($request->script_id);
		$script->load('user.profile');
		
		Inbox::SendMessage($script->created_by,$request->subject,$request->message,[]);
		
		return back()->with('success',trans('success.MsgToScrptOnr',['name'=>$script->user->profile->full_name]));
	}
	
	
	public function PostUnPostScriptToProfile($id,Request $request){
		
		$script	=	Scripts::findOrFail($id);
		
		
		
		if(is_null($script)){
			return response()->json(['status'=>'fail','msg'=>trans('errors.not-found',['file'=>'Script'])]);
		}
				
		if($script->created_by != auth()->user()->id){
			 return response()->json(['status'=>'fail','msg'=>trans('errors.script-edit')]);
			 
		}
		
		$script->isposted 	=	$request->get('status')=='post'	? 1 : 0;	
		$script->save();		
		
		return response()->json(['status'=>'ok','msg'=> $request->get('status')	== 'post' ? trans("success.script-posted") : trans("success.script-unposted")]);	
			
	}
}
