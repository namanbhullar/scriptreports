<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Documents;

use Storage;

use Validator;

class DocumentsController extends Controller
{
	public function iframeIndex(Request $request)
	{
		$validate	=	Validator::make($request->all(),['script'=>'required']);
		if($validate->fails()) return view('errors.not-found');
		
		$documetns	=	auth()->user()->documents()->where('status','>',-1)->get();
		return view('script-manager.my-documents.iframe.index')->with(['documetns'=>$documetns,'jscript'=>$request->script]);
	}
	
	
	public function create(Request $request)
	{
		$validator	=	Validator::make($request->all(),[
			'title'=>'required',
			'upload_document' => 'required|mimes:pdf,docx,doc,dot,docm,dotx,xlsx,xlsm,xlsb,xltx,xltm,xls,xlt'
		]);
		
		if($validator->fails()) return back()->withInput()->withErrors($validator);
		
		if(Documents::SaveDocuments($request->all(),$request->file('upload_document')))
		{
			return 	redirect('/myaccount/script-manager/my-documents')->withSuccess('Your Document was uploaded successfully');
		}
		else
		{
			return 	redirect('/myaccount/script-manager/my-documents')->withErrors(['Your Document was not uploaded successfully']);
		};
		
		
	}
	
	public function edit($id)
	{
		$dox	=	Documents::findOrFail($id);
		
		if($dox->user_id != auth()->user()->id) return back()->withErrors([trans('errors.not-found',['file'=>'Document'])]);
		
		return view('script-manager.my-documents.edit')->with(['dox'=>$dox]);
	}
	
	public function update($id, Request $request){
		$validator	=	Validator::make($request->all(),[
			'title'=>'required',
			'upload_document' => 'mimes:pdf,docx,doc,dot,docm,dotx,xlsx,xlsm,xlsb,xltx,xltm,xls,xlt'
		]);
		
		$userId	=	auth()->user()->id;
		
		if($validator->fails()) return bak()->withErrors($validator)->withInput();
		
		$dox	=	Documents::findOrFail($id);
		
		if($dox->user_id != auth()->user()->id) return back()->withErrors([trans('errors.not-found',['file'=>'Document'])]);
		
		$dox->title	=	$request->title;
		$dox->description	=	$request->description;
		$dox->type	=	$request->type;
		$dox->draft	=	$request->draft;
		$dox->save();
				
		if($request->hasFile('upload_document') && $request->file('upload_document')->isValid())
		{
			$fileUpload	=	Documents::updateFile($dox,$request->file('upload_document'));			
			if($fileUpload)
				return redirect()->route('my-documents')->withSuccess(trans('success.file-update'));
			else
				return redirect()->route('my-documents')->withErrors([trans('errors.file-not-upload')]);
		}
		
		return redirect()->route('my-documents')->withSuccess(trans('success.file-update'));
	}
	
	public function ChangeStatus(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'id' => 'required',
			'status'=>'required',
        ]);
		
		if ($validator->fails()) {
            return response()->json(['status'=>'fails','msg'=>trans('errors.invalid-argument')]);
        }
		
		$id	=	$request->id;
		$value	=	$request->status;
		$user_id	=	auth()->user()->id;
		$dox	= Documents::findOrFail($id);
		
		if($dox->user_id	!=	$user_id) return response()->json(['status'=>'fails','msg'=>trans('errors.not-found',['file'=>'Document'])]);
		
		switch($request->status)
		{
			case 'scripts':
				$dox->type	=	'scripts';
				$dox->save();
			break;
			
			case 'coverage':
				$dox->type	=	'coverage';
				$dox->save();
			break;
			
			case 'legal':
				$dox->type	=	'legal';
				$dox->save();
			break;
			
			case 'other':
				$dox->type	=	'other';
				$dox->save();
			break;
			
		}
		
		if($request->status == 'delete'){
			$dox->delete();
			$msg	=	trans('success.file-delete',['file'=>'Document']);		
			return response()->json(['status'=>'ok','msg'=>$msg]);
		}
		
		$msg	=	trans('success.move-to-folder',['file'=>'Document','to'=>ucfirst($request->status)]);		
		return response()->json(['status'=>'ok','msg'=>$msg]);
	}
}
