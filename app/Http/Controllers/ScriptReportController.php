<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\ScriptReport;
use App\Models\Documents;
use App\Models\User;
use App\Models\Templates;
use App\Models\Inbox;
use App\Models\Notification;
use Session;
use Validator;

use Response;

use Auth;

use mPDF;
use URL;

class ScriptReportController extends Controller
{
    // Default method for review page
	public function index(Request $request)
	{ 
		$current_user	= 	auth()->user();
		
		$reports		=	$request->has('search_script') ? 
							ScriptReport::where('user_id',$current_user->id)->where('title','like','%'.$request->get('search_script').'%')->get() :
							ScriptReport::where('user_id',$current_user->id)->orderby('id','desc')->get(); 
		
		$Scripts		=	Documents::GetMyScript();
		$Templates		=	Templates::GetFavoriteTemplates();
		
		$favTemplates	=	[];
		foreach($Templates as $Template ){
			$favTemplates[$Template->id]	=	$Template->title;
		}
		
		$myScripts	=	[];
		foreach($Scripts as $Script){
			if(!empty($Script->title))
			{
				if(!empty($Script->draft))
				{
					$myScripts[$Script->id]	=	$Script->title." DRAFT:".$Script->draft;
				}
				else
				{
					$myScripts[$Script->id]	=	$Script->title;
				}
				
			}
		}
		return view('script-report.index',array('reports' => $reports,'myScripts'=>$myScripts,'favTemplates'=>$favTemplates));
	}
	
	
	public function ViewpdfByUser($id){
		$report		=	ScriptReport::find($id);
		
		if(is_null($report)) return view('errors.not-found',array('heading'=>'Script Report','message' => $message));		
		
		$token		=	request()->get('_token');
		$Chtoken	=	md5('script-reports/'.$id.'/view-pdf');
		
		if($report->user_id == auth()->user()->id || $report->owner_id == auth()->user()->id || ($token == $Chtoken))
		{
			$report->is_seen	=	1;
			$report->save();
			
			$mpdf			=	new mPDF;
			$mpdf->AddSpotColor('PANTONE 534 EC',85,65,47,9);
			$mpdf->SetHTMLHeaderByName('MyHeader1');
			// create response view for pdf
			$view	 		=	view('script-report.create-pdf',array('script' => $report));
			
			$content		= $view->render();
			//echo $content; exit;
			//Response::make($content, 200, array('content-type'=>'application/pdf'));
			
			$mpdf=new mPDF('c'); 
			$mpdf->WriteHTML($content);
			$mpdf->debug = true;
			$mpdf->showImageErrors = true; 
			$mpdf->Output();
			exit;
		}
		else
		{
			return redirect('myaccount/script-reports')->withErrors('Sorry, You don\'t have permission to view file');		
		}
	}
	
	
	public function DownLoadPDFByID($id,$token){
		
			
		$script		=	ScriptReport::find($id);
		
		if(is_null($script)) return view('errors.not-found',array('heading'=>'Script Report','message' => $message));		
		
		$userid		=	auth()->user()->id;
		$data		=	unserialize($script->data);
		$Chtoken	=	md5('script-reports/'.$id.'/download-pdf');
		
		if(($script->user_id != Auth::user()->id && $script->sent_to != Auth::user()->id) || ($token != $Chtoken)){
			//return Redirect::to('/script-reports')->withErrors('Sorry, You don\'t have permission to download this file');		
		}
		
		
			$mpdf			=	new mPDF;
			$mpdf->AddSpotColor('PANTONE 534 EC',85,65,47,9);
			
			if($script->type==2)
				$view	 		=	view('script-report.create-compare-pdf',array('script' => $script));
			else	
				$view	 		=	view('script-report.create-pdf',array('script' => $script));
			
			
			
			$content		= $view->render();
			$mpdf->WriteHTML($content);
			
			$pathdir	=	public_path('pdfs/'.$userid.'/');
			//dd($pathdir);
			if(!file_exists($pathdir)){
				mkdir($pathdir);
			}else{
				$dirHandle = opendir($pathdir);
				while ($file = readdir($dirHandle)) {
					if(!is_dir($file)) {
						unlink ("$pathdir"."$file"); 
					}
				}
				closedir($dirHandle);
			}
			
			
			
			$path	=	public_path('pdfs/'.$userid.'/'.$script->title.'.pdf');
			$name	=	$script->title.'.pdf';
			
			$mpdf->Output($path);
			
			$headers = array('Content-Type' => 'application/pdf');
			return response()->download($path, $name, $headers);
			
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
		
		//$track	=	$is_auther ? false : Scripts::getTracker($id,$user_id);
		$report	=	ScriptReport::find($id);
		$current_status	=	$report->status;
		$oldstatus	=	$report->last_status;
		$new_staus	=	($value == 1) ? $report->last_status : $value;
		
		if($value==999){
			
			
				$dox		=	new Documents;		
				
				$dox->user_id		=	$user_id;
				$dox->title			=	$report->title;	
				$dox->type			=	'coverage';	
				$dox->draft			=	'';
				$dox->report_id		=	$id;
				$dox->description	=	$report->owner->profile->full_name.' script report';
				$dox->file_name	=	$report->title.".pdf";
				$dox->file_mime	=	"application/pdf";
				$dox->save();
				
				// create pdf and move to destination path
				$mpdf			=	new mPDF;
				
				$mpdf->AddSpotColor('PANTONE 534 EC',85,65,47,9);
				
				if($script->type==2)
					$view	 		=	view('script-report.create-compare-pdf',array('script' => $report));
				else	
					$view	 		=	view('script-report.create-pdf',array('script' => $report));
			
			
			
			$content		= $view->render();
			$mpdf->WriteHTML($content);
			
			$destinationPath    = 'public/uploads/profiles/users/'.$user_id.'/mydocuments/'.$dox->id; 
			$path	=	$destinationPath.'/'.$report->title.'.pdf';
			mkdir($destinationPath);
			$mpdf->Output($path);
			
			return response()->json(array('status'=>'ok'));
			
		}else{
		
				if($value != -99)
				{			
					if($report)
					{				
						$report->status	=	$new_staus;
						$report->last_status	=	$current_status;
						$report->save();
					}
					else
					{
						return response()->json(array('status'=>'fails','msg'=>'You are not auther and no sharing data find for You.'));
					}
				}
				else
				{	
					$report->delete();
				}
				
		}
		
		return response()->json(array('status'=>'ok','old_staus'=>(int) $oldstatus,));
	}	
	
	public function SentTemplateToOwner(Request $request){
		
		$data	=	$request->all();
		
		$script				=	ScriptReport::find($data['id']);
		$script->status		=	2;
		$script->save();
		
		$newscript				=	new ScriptReport;
		$newscript->user_id		=	$data['owner'];
		$newscript->owner_id	=	Auth::user()->id;	
		$newscript->title		=	$script->title; 
		$newscript->draft		=	$script->draft; 
		$newscript->template_id	=	$script->template_id;
		$newscript->data		=	$script->data;
		$newscript->sent_by		=	Auth::user()->id;	
		$newscript->status		=	2;	
		
		if($newscript->save())
			return true;
		else
			return false;	
		$user	=	User::find($data['owner'])->Profile;
		
		if($check)
			return Response::json(array('status' => 'ok', 'msg' => 'Report has been sent toasdfasdfasdd '.$user->full_name));	
		else
			return Response::json(array('status' => 'error', 'msg' => 'Sorry, we could not sent template please try again'));	
		
	}
	
	public function ReportCompare(Request $request){		
	
	
		$reports	=	ScriptReport::GetCompareReportData();
		$reports['title']	=	request()->get('title');
		$reports['script']	=	request()->get('script');
		$reports['date']	=	request()->get('date');
		$reports['cr_info']['template-id']	=	request()->get('template');
		$reports['cr_info']['draft1']		=	'';
		$reports['cr_info']['draft2']		=	'';
		$reports['cr_info']['id']			=	'';
		$reports['cr_info']['type']			=	0;
		
		
		
		//check if script is uploded or selected
		if($request->has('script_status') && $request->get('script_status') != ""){
			if($request->get('script_status') == 'select')
			{
				$reports['cr_info']['script']	=	$request->get('script');
			}
			elseif($request->get('script_status') == 'file')
			{
				if($request->hasFile('scriptFile'))
				{
					$document	=	new Documents;
					$document->title	=	$request->file('scriptFile')->getClientOriginalName();
					$document->draft	=	'draft1';
					$document->type		=	'scripts';
					$document->description=	' It is auto uploaded during comparing reoprt';
					$document->user_id	=	Auth::user()->id;
					$document->file_name=	$request->file('scriptFile')->getClientOriginalName();
					$document->file_mime=	$request->file('scriptFile')->getMimeType();
					$document->save();
					$request->file('scriptFile')->move('public/uploads/profiles/users/'.Auth::user()->id.'/mydocuments/'.$document->id,$request->file('scriptFile')->getClientOriginalName());
					$reports['cr_info']['script']	=	$document->id;
				}				
			}
		}
		
		if($request->has('draft_status') && $request->get('draft_status') != ""){
			if($request->get('draft_status') == 'select')
			{
				$reports['cr_info']['draft2']	=	$request->get('draft1');
			}
			elseif($request->get('draft_status') == 'file')
			{
				if($request->hasFile('draftFile')){
					$document2	=	new Documents;
					$document2->title	=	$request->file('draftFile')->getClientOriginalName();
					$document2->draft	=	'draft2';
					$document2->type		=	'scripts';
					$document2->description=	' It is auto uploaded during comparing reoprt';
					$document2->user_id	=	Auth::user()->id;
					$document2->file_name=	$request->file('draftFile')->getClientOriginalName();
					$document2->file_mime=	$request->file('draftFile')->getMimeType();
					$document2->save();
					$request->file('draftFile')->move('public/uploads/profiles/users/'.Auth::user()->id.'/mydocuments/'.$document2->id,$request->file('draftFile')->getClientOriginalName());
					$reports['cr_info']['draft2']	=	$document2->id;
				}				
			}
		}	
		
		// store session for use
		//Session::put('compared.data', serialize($reports));
		
		$script			=	new ScriptReport;
		
		$script->user_id		=	Auth::user()->id;
		$script->owner_id		=	Auth::user()->id;
		$script->draft			=	''; 
		$script->draft1			=	''; 
		$script->draft2			=	''; 
		$script->type			=	2;
		$script->inc			=	'all';
		$script->title			=	$reports['title']; 
		$script->template_id	=	isset($reports['cr_info']['template-id']) ? $reports['cr_info']['template-id'] : 0;
		$script->created_date	=	$reports['date']; 
		$script->data			=	serialize($reports);
		$script->status			=	2;	
		$script->save();
		
		return redirect('myaccount/script-reports/'.$script->id.'/report-compare-view');
	}
	
	
	public function ReportCompareIndex($id){ 
		
		//if(!Session::has('compared.data')) return redirect('/script-reports')->withErrors('Please select at least 2 reports');	
		
		
		//$reports	=	unserialize(Session::get('compared.data'));

		
		$script			=	ScriptReport::find($id);
		$reports		=	unserialize($script->data);
		//'script-report.compare'
		return view('script-report.compare-new')->with([
													'reports'=>$reports,
													'type'=>$reports['cr_info']['type'],
													'template_id'=>$reports['cr_info']['template-id'],
													'draft1'=>$reports['cr_info']['draft1'],
													'draft2'=>$reports['cr_info']['draft2'],
													'script_cmp_id'=>$id
													]);
	}
	
	
	
	public function SaveComparePDFReport(Request $request)
	{
		$data	=	$request->all();
		$reportdata 	= 	Session::get('compared.data');
		Session::forget('compared.data');
		$inc	=	isset($data['inc']) ? implode(',',$data['inc']) : '';
		
		$script			=	(isset($data['script_cmp_id']) && $data['script_cmp_id']>0) ? ScriptReport::find($data['script_cmp_id']) : new ScriptReport;
		
		$script->user_id		=	Auth::user()->id;
		$script->owner_id		=	Auth::user()->id;
		$script->draft			=	$data['draft']; 
		$script->draft1			=	$data['draft1']; 
		$script->draft2			=	$data['draft2']; 
		$script->type			=	2;
		$script->inc			=	$inc;
		$script->title			=	$data['title']; 
		$script->template_id	=	isset($data['template_id']) ? $data['template_id'] : 0;
		$script->created_date	=	$data['date']; 
		//$script->data			=	$reportdata;
		$script->status			=	2;		
		
		if($script->save())
			return redirect('myaccount/script-reports')->with('success', 'Your report has been saved successfully');
		else
			return back()->withErorrs('Sorry, we could not create report. Please try again');	
	}
	
	public function ViewComparePDFReport($id){		
		$script		=	ScriptReport::find($id);
		
		if(is_null($script)) return view('errors.not-found',array('heading'=>'Script Report','message' => $message));
		
		
		$token		=	request()->get('_token');
		$Chtoken	=	md5('script-reports/'.$id.'/view-compare-pdf');
		
		
		if($token != $Chtoken){
			return redirect('myaccount/script-reports')->withErrors('Sorry, You don\'t have permission to view file');		
		}
		
			$mpdf			=	new mPDF;
			$mpdf->AddSpotColor('PANTONE 534 EC',85,65,47,9);
			 $mpdf->SetHTMLHeaderByName('MyHeader1');
			
			
			// create response view for pdf
			$view	 		=	view('script-report.create-compare-pdf',array('script' => $script));
			
			$content		= $view->render();
			//echo $content; exit;
			//Response::make($content, 200, array('content-type'=>'application/pdf'));
			
			$mpdf=new mPDF('c'); 
			$mpdf->WriteHTML($content);
			$mpdf->debug = true;
			$mpdf->showImageErrors = true; 
			$mpdf->Output();
			exit;
	}
	
	
	public function EditScriptReport($id)
	{
		$script	=	ScriptReport::find($id);
		
		if($script->owner_id != auth()->user()->id){
			return redirect('myaccount/script-reports')->withErrors('Sorry, You don\'t have permission to edit this report');	
		}
		
		$template				=	$script->template;
		
		if(is_null($template))	return view('errors.not-found',array('heading'=>'Template','message' => trans('errors.report-cant-edit-template-deleted')));
		
		$categories				=	Templates::GetTemplateCategories($script->template_id);
		$teplateowner			=	User::find($template->user_id);
		return view('script-report.edit')->with(array('template' => $template,'categories'=>$categories,'script'=>$script,'owner'=>$teplateowner));
	}
	
	public function UpdateReport($id, Request $request)
	{
		$data			=	$request->all();
		
		$script			=	ScriptReport::findOrFail($id);
		
		if($script->user_id != auth()->user()->id) return redirect('myacount/script-reports')->withErrors([trans('errors.report-cant-update')]);
		 
		
		$script->title			=	$data['script_title']; 
		$script->draft			=	$data['script_draft']; 
		//$script->notes			=	$data['script_notes']; 
		$script->template_id	=	isset($data['template_id']) ? $data['template_id'] : 0;
		$script->share_id		=	isset($data['share_id']) ? $data['share_id'] : 0;
		$script->created_date	=	$data['script_date']; 
		$script->data			=	serialize($data);
		$script->status			=	1;
		$script->save();
		
		if($request->has('script_notes'))
		{
			$script->load('privatenote');
			if(is_null($script->privatenote))
			{
				PrivateNotes::create(['item_id'=>$script->id,'item_type'=>'report','user_id'=>auth()->user()->id,'note'=>$request->get('script_notes'),'status'=>1]);
			}
			else
			{
				$note	=	$script->privatenote;
				$note->note	=	$request->get('script_notes');
				$note->save();
			}
		}
		return redirect('myaccount/script-reports')->with('success', trans('success.report-updated'));
	}
	
	
	public function sentReportBackToClient($id)
	{
		$report				=	ScriptReport::find($id);
		$report->status		=	2;	
		$report->save();
		
		$report->load('template.user.profile');
		
		if($report->template->user_id == auth()->user()->id)
			 return response()->json(['status'=>'fail','msg'=>'Can\'t sent report back to yourself']);
		
		$newReport	=	new ScriptReport;
		$newReport->user_id	=	$report->template->user_id;
		$newReport->owner_id=	auth()->user()->id;
		
		$newReport->title		=	$report->title;
		$newReport->draft		=	$report->draft;
		$newReport->template_id	=	$report->template_id;
		$newReport->share_id	=	$report->share_id;
		$newReport->created_date=	$report->created_date;
		$newReport->data		=	$report->data;
		$newReport->status		=	$report->status;
		$newReport->is_seen		=	0;
		$newReport->save();
		
		// remove message for return report
		//Inbox::SendMessage($report->template->user_id,'The report has been returned.','The report has been returned.',['redirect_url'=>'report-rturned','report_id'=>$newReport->id]);
		// sent notification only
		
		Notification::create([
									'user_id'=>$report->template->user_id,
									'type'=>'report-rturned',
									'is_seen'=>0,
									'item_id'=>0,
									'message'=>trans('notification.report-rturned',['name'=> "<a target='_blank' href='".url::to('/profile/'.Auth::user()->id.'/view')."'>".Auth::user()->first_name."</a>"]),
									'notification_type'=>3
									]);
		
		
		return response()->json(['status'=>'ok','msg'=>trans('success.report-sent-back',['name'=>$report->template->user->profile->full_name])]);
	}
	
	
	public function getReportForCompare($id,Request $request)
	{
		$reports	=	auth()->user()->ScriptReports()->where('template_id',$id)->where('type',1)->with('owner.profile')->get();		
		return view('script-report.report-for-compare')->with(['reports'=>$reports]);
	}
}
