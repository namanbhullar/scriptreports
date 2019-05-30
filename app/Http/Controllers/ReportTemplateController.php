<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Templates;

use Auth;

use App\Models\Categories;
use App\Models\Questions;
use App\Models\User;
use App\Models\ScriptReport;
use App\Models\ShareTemplate;
use App\Models\PrivateNotes;

use Validator;



class ReportTemplateController extends Controller
{
    public function index(Request $request)
	{
		$search	=	$request->has('search') ? $request->get('search') : null;
		
		$user		=	auth()->user();
		$OwntemplateQury	=	$user->templates();		
		
		if(!is_null($search)) $OwntemplateQury->where('title','like',"%$search%");		
		
		$Owntemplate	=	$OwntemplateQury->get();
		
		$fav		=	$user->favorites()->where('item_type','template')->with('template')->get();
		
		//take only existing template
		
		$favTempTotal	=	$fav->filter(function($value,$index){
							return !is_null($value->template);
						});
						
		$favTempTotal	=	$favTempTotal->map(function($value,$index){
							return $value->template;
						});
						
		if(!is_null($search))
		{ 
			$favTemp	=	$favTempTotal->filter(function($value,$index) use ($search){
													$pos	=	 strpos(strtolower($value->title),strtolower($search));
													return ($pos === false) ? false : true;
													});
		}
		else $favTemp	=	$favTempTotal;
		
		$template	=	$Owntemplate->merge($favTemp);	
		//dd($template);
		return view('report-template.index')->with('templates',$template);
	}
	
	public function ChangeStatus(Request $request){
		$user	=	auth()->user();
		$validator = Validator::make($request->all(), [
            'id' => 'required',
			'status'=>'required',
        ]);
		
		$status	=	$request->status;
		$id	=	$request->status;
		
		if ($validator->fails()) {
            return response()->json(['status'=>'fails','msg'=>trans('errors.invalid-argument')]);
        }
		
		$template	=	$user->templates()->where('id',$request->id)->first();
		
		if(is_null($template))
		{
			$favorite	=	$user->favorites()->where('item_type','template')->where('item_id',$request->id)->first();
			if(is_null($favorite)) return response()->json(array('status'=>'fails','msg'=>'You are not auther and No sharing data find for You.'));
			$template	=	$favorite->template;
		}
				
		if(is_null($template)) return response()->json(array('status'=>'fails','msg'=>'You are not auther and No sharing data find for You.'));
		
		switch($status){
			case'archived':
				if($user->id == $template->user_id)
				{
					$template->status	=	0;
					$template->save();
					return response()->json(array('status'=>'ok','msg'=>trans('success.template-archive')));
				}
				else
				{
					return response()->json(['status'=>'fails','msg'=>trans('errors.invalid-argument')]);
				}
			break;
			
			case 'unarchived':
				if($user->id == $template->user_id)
				{
					$template->status	=	1;
					$template->save();
					return response()->json(array('status'=>'ok','msg'=>trans('success.template-archive-remove')));
				}
				else
				{
					return response()->json(['status'=>'fails','msg'=>trans('errors.invalid-argument')]);
				}
			break;
			
			case 'delete':
				if($user->id == $template->user_id)
				{
					$template->delete();
					return response()->json(array('status'=>'ok','msg'=>trans('success.template-delete')));
				}
				else
				{
					$favorite->delete();
					return response()->json(array('status'=>'ok','msg'=>'Template was successfully remove from favorites.'));
				}
			break;
			
			case 'unpost':
				if($user->id == $template->user_id)
				{
					$template->status =	 2;
					$template->save();
					return response()->json(array('status'=>'ok','msg'=>'Template was successfully Posted.'));
				}
				else
				{
					$favorite->delete();
					return response()->json(array('status'=>'ok','msg'=>'Template was successfully remove from favorites.'));
				}
			break;
		}
				
		return response()->json(array('status'=>'ok'));
	}	
		
	public function create(Request $request)
	{
		//dd($request->all());
		// Validation rulles
		 $rules = array('template_title' => 'required',/*'company'=>'required',*/'created_date'=>'required','form'=>'required');
		
		$validator = Validator::make($request->all(), $rules);
		
		// validate inputs
		if($validator->fails()) return back()->withInput()->withErrors($validator);	;
		
		$template	=	new Templates;
		
		$template->user_id			=	auth()->user()->id;
		$template->title			=	$request->has('template_title') ? $request->get('template_title')	: '';
		$template->created_date		=	$request->has('created_date') 	? $request->get('created_date') 	: '';
		$template->created_by		=	$request->has('created_by') 	? $request->get('created_by') 		: '';
		$template->viewer_notes		=	$request->has('viewer_notes') 	? $request->get('viewer_notes') 	: '';
		$template->genre			=	$request->has('genre') 			? $request->get('genre') 			: [];
		$template->subgenre			=	$request->has('subgenre') 		? $request->get('subgenre') 		: [];
		$template->rating			=	$request->has('rating') 		? $request->get('rating') 			: '';
		$template->target_audience	=	$request->has('target_audience')? $request->get('target_audience') 	: '';
		$template->lead				=	$request->has('lead') 			? $request->get('lead') 			: '';
		$template->comparison		=	$request->has('comparison') 	? $request->get('comparison') 		: '';
		$template->reader_inst		=	$request->has('reader_inst') 	? $request->get('reader_inst') 		: '';
		$template->budget_from		=	$request->has('budget_from') 	? $request->get('budget_from') 		: '';
		$template->budget_to		=	$request->has('budget_to') 		? $request->get('budget_to') 		: '';
		$template->budget_type		=	$request->has('budget_type') 	? $request->get('budget_type') 		: '';
		//$template->private_notes	=	$request->has('private_notes') 	? $request->get('private_notes') 	: '';
		$template->company			=	$request->has('company') 		? $request->get('company') 			: '';
		$template->form				=	$request->has('form') 			? $request->get('form') 			: [];
		$template->general_info		=	$request->has('script_info') 	? $request->get('script_info') 		: [];
		$template->logsyn			=	$request->has('logsyn') 		? $request->get('logsyn') 			: [];
		$template->character_break	=	$request->has('character_break')? $request->get('character_break') 	: [];
		$template->notes			=	$request->has('notes') 			? $request->get('notes') 			: [];
		$template->bar_graphs		=	$request->has('bar_graphs') 	? $request->get('bar_graphs') 		: [];
		$template->draft			=	'1';
		$template->status			=	'2';
		
		$template->save();
		
		//save private notes form user
		if($request->has('private_notes'))
		{
			PrivateNotes::create(['item_id'=>$template->id,'item_type'=>'template','user_id'=>auth()->user()->id,'note'=>$request->get('private_notes'),'status'=>1]);
		}
		
		return redirect('myaccount/report-template/create/'.$template->id.'/next');
	}
	
	
	public function TemplateNextStep($id,Request $request)
	{
		$template	=	Templates::find($id);
		
		if(is_null($template)) return view('errors.not-found',array('heading'=>'Template','message' => $message));
		
		if($template->user_id != auth()->User()->id) return redirect('myaccount/report-template')->withErrors([trans("error.template-edit")]);
		
		$cat_id			=	request()->get('post_cat_id');
		$post_template	=	request()->get('post_template');
		
		$categories		=	Categories::GetCategoriesByUserID(Auth::user()->id);
		
		if(isset($cat_id) && $cat_id>0)
		{
			$post_cat_id	=	$cat_id;
			$questions		=	Questions::GetTemplateQueationsByCategory($id,$post_cat_id);
			
			Templates::SaveTempateData($id);
		}
		else
		{
			$post_cat_id	=	$categories[0]->id;
			$questions		=	Questions::GetTemplateQueationsByCategory($id,$post_cat_id);
		}
		
		if($post_template==1)
		{
			return Redirect::to('myaccount/report-template')->with('success', trans("success.template-posted"));	
		}
		
		$data			=	Templates::GetTemplateData($id,$post_cat_id);
		
		$nextcategory	=	Categories::GetNextCategory($post_cat_id);	
		$prevcategory	=	Categories::GetPreviousCategory($post_cat_id);	
		
		return view('report-template.next')->with([
													'categories' => $categories,
													'questions'=>$questions,
													'id'=>$id,
													'post_cat_id'=>$post_cat_id,
													'data'=>$data,
													'template_id'=>$id,
													'nextcat'=>$nextcategory,
													'prevcat'=>$prevcategory
													]);		
	}
	
	public function AddCustomQuestion(){
		$rules	=	array('title'=>'required|unique:lr_template_questions');
						
		
		$validator = Validator::make(request()->all(), $rules);
		
		if($validator->fails()) return response()->json(['status'=>'fail','msg'=>'Invalid Arguments']);
		
		$response	=	Questions::SaveNewCustom();
		$response;
		//dd($response);
		return $response;
			
	}
	
	public function UpdateCustomQuestion(Request $request){
		if(!$request->has('updated_title') || !$request->has('question_id')) return  response()->json(['status'=>'fail','msg'=>'Invalid Arguments']);
		
		$id			=	$request->get('question_id');
		$question	=	Questions::find($id);
		
		if($question->type==1 && $question->created_by==Auth::User()->id){
			
				$question->title	=	$request->get('updated_title');
				$question->save();
				return  response()->json(['status'=>'ok','msg'=>'Question Successfully Updated']);
		}
		return  response()->json(['status'=>'fail','msg'=>'Question Not Found']);
			
	}
	
	public function DeleteCustomQuestion(Request $request){
		
		$id	=	$request->get('id');
		
		$question	=	Questions::find($id);
		
		if($question->type==1 && $question->created_by==Auth::User()->id){
				$question->delete();
				return  response()->json(['status'=>'ok','msg'=>'Question Successfully Deleted']);
		}
		return  response()->json(['status'=>'fail','msg'=>'Question Not Found']);
	}
	
	public function UpdateCustomOrder(){
		Questions::UpdateCustomOrder();
	}
	
	
	public function AddCustomCategory(Request $request){
		$rules	=	array('title'=>'required');
		$validator = Validator::make($request->all(), $rules);		
		if($validator->fails()) return response()->json(['status'=>'fail','msg'=>trans('errors.invalid-argument')]);	
		
		$response	=	Categories::SaveNewCustom();
		return response()->json(['html'=>$response,'status'=>'ok','msg'=>trans('success.category-added')]);
	}
	
	public function UpdateCustomCategory(Request $request){
		if(!$request->has('category_id') || !$request->has('updated_title'))  return response()->json(['status'=>'fail','msg'=>trans('errors.invalid-argument')]);
		$id			=	$request->get('category_id');
		$category	=	Categories::find($id);
		if($category->type==1 && $category->created_by==Auth::User()->id){
				
				$text	=	$request->get('updated_title');
				$category->title	=	$text;
				$category->save();
				return response()->json(['status'=>'ok','msg'=>trans('success.category-updated')]);
		}
		return response()->json(['status'=>'fail','msg'=>'Category Not Found']);
	}
	
	public function DeleteCustomCategory(Request $request){
		
		$id			=	$request->get('id');
		$category	=	Categories::find($id);
		
		if($category && $category->type==1 && $category->created_by==Auth::User()->id){
				$category->delete();
				return response()->json(['status'=>'ok','msg'=>trans('success.category-deleted')]);
		}
		return response()->json(['status'=>'fail','msg'=>'Category Not Found']);
	}
	
	
	
	public function PreViewTemplate($id, Request $request){
		
		$Gauth	=	$request->get('auth');
		$auth	=	hash('sha256','report-template/'.$id.'/preview');
			
		$template	=	Templates::find($id);
		if(is_null($template) || $template->status==0){
				return view('errors.not-found',array('heading'=>'Template','message' => $message));
		}
		
		if(Auth::User()->id != $template->user_id && ($Gauth!=$auth)){
			return redirect('/myaccount/report-template')->withErrors([trans("errors.template-view")]);	
		}
		
		$categories			=	Templates::GetTemplateCategories($id);
		//echo "<pre>";print_r($categories);exit;
		$teplateowner		=	User::find($template->user_id);
		return  view('report-template.preview')->with([
														'template' => $template,
														'categories'=>$categories,
														'type'=>'preview',
														'owner'=>$teplateowner]);			
	}
	
	
	public function SavePreViewTemplate($id,Request $request){
		
		
		$template	=	Templates::find($id);
		if(Auth::User()->id != $template->user_id){
			return redirect('/myaccount/report-template')->withErorrs([trans("errors.template-view")]);	
		}
		Templates::SaveTempateData($id);
		$auth	=	hash('sha256','report-template/'.$id.'/preview');
		
		if(strpos(url()->previous(),'preview') !== false)	return redirect('myaccount/report-template')->withSuccess(trans('success.template-saved'));
		
		return redirect('/myaccount/report-template/'.$id.'/preview?auth='.$auth);	
	}
	
	
	public function EditTemplate($id){
		
		$template	=	Templates::find($id);
		
		if(is_null($template)) return view('errors.not-found',array('heading'=>'Template','message' => $message));
		
		if($template->user_id != auth::User()->id) return redirect('myaccount/report-template')->withErrors([trans('errors.template-edit')]);		
		
		return view('report-template.edit',array('template' => $template));				
	}
	
	
	public function update($id,Request $request)
	{
		//dd($request->all());
		// Validation rulles
		 $rules = array('template_title' => 'required',/*'company'=>'required',*/'created_date'=>'required','form'=>'required');
		
		$validator = Validator::make($request->all(), $rules);
		
		// validate inputs
		if($validator->fails()) return back()->withInput()->withErrors($validator);	;
		
		$template	=	Templates::find($id);
		if(is_null($template) || $template->user_id != auth()->user()->id) return view('errors.not-found',array('heading'=>'Template','message' => $message));
		
		
		$template->title			=	$request->has('template_title') ? $request->get('template_title')	: '';
		$template->created_date		=	$request->has('created_date') 	? $request->get('created_date') 	: '';
		$template->created_by		=	$request->has('created_by') 	? $request->get('created_by') 		: '';
		$template->viewer_notes		=	$request->has('viewer_notes') 	? $request->get('viewer_notes') 	: '';
		$template->genre			=	$request->has('genre') 			? $request->get('genre') 			: [];
		$template->subgenre			=	$request->has('subgenre') 		? $request->get('subgenre') 		: [];
		$template->rating			=	$request->has('rating') 		? $request->get('rating') 			: '';
		$template->target_audience	=	$request->has('target_audience')? $request->get('target_audience') 	: '';
		$template->lead				=	$request->has('lead') 			? $request->get('lead') 			: '';
		$template->comparison		=	$request->has('comparison') 	? $request->get('comparison') 		: '';
		$template->reader_inst		=	$request->has('reader_inst') 	? $request->get('reader_inst') 		: '';
		$template->budget_from		=	$request->has('budget_from') 	? $request->get('budget_from') 		: '';
		$template->budget_to		=	$request->has('budget_to') 		? $request->get('budget_to') 		: '';
		$template->budget_type		=	$request->has('budget_type') 	? $request->get('budget_type') 		: '';
		//$template->private_notes	=	$request->has('private_notes') 	? $request->get('private_notes') 	: '';
		$template->company			=	$request->has('company') 		? $request->get('company') 			: '';
		$template->form				=	$request->has('form') 			? $request->get('form') 			: [];
		$template->general_info		=	$request->has('script_info') 	? $request->get('script_info') 		: [];
		$template->logsyn			=	$request->has('logsyn') 		? $request->get('logsyn') 			: [];
		$template->character_break	=	$request->has('character_break')? $request->get('character_break') 	: [];
		$template->notes			=	$request->has('notes') 			? $request->get('notes') 			: [];
		$template->bar_graphs		=	$request->has('bar_graphs') 	? $request->get('bar_graphs') 		: [];
		
		$template->save();
		
		//save private notes form user
		if($request->has('private_notes'))
		{	
			$template->load('privatenote');
			if(is_null($template->privatenote))
			{
				PrivateNotes::create(['item_id'=>$template->id,'item_type'=>'template','user_id'=>auth()->user()->id,'note'=>$request->get('private_notes'),'status'=>1]);
			}
			else
			{
				$notes	=	$template->privatenote;
				$notes->note	=	$request->get('private_notes');
				$notes->save();
			}
			
		}
		
		return redirect('myaccount/report-template/create/'.$template->id.'/next');
	}
	
	
	public function SaveTemplateFromPrev($id){
		
		$template	=	Templates::find($id);
		
		if(is_null($template)) return view('errors.not-found',array('heading'=>'Template','message' => $message));
		
		if($template->user_id != auth()->user()->id) return redirect('myaccount/report-template')->withErrors([trans("error.template-edit")]);
		
		$template->draft	=	0;
		$template->status	=	2;
		$template->save();
		
		return Redirect::to('myaccount/report-template')->with('success', trans("success.template-saved"));	
		
	}
	
	public function PostTemplate($id,Request $request){
		
		$template	=	Templates::find($id);
		
		if(is_null($template)){
			return $request->ajax() ?
			 response()->json(['status'=>'fail','masg'=>trans('errors.not-found',['file'=>'Template'])]):
			 view('errors.not-found',array('heading'=>'Template','message' => $message));
		}
				
		if($template->user_id != auth()->user()->id){
			 return $request()->ajax() ? 
			 	response()->json(['status'=>'fail','masg'=>trans('errors.template-edit')]):
				redirect('myaccount/report-template')->withErrors([trans("error.template-edit")]) ;
			 
		}
		
		$template->status 	=	1;	
		$template->save();		
		
		return $request->ajax() ?
			response()->json(['status'=>'ok','msg'=>trans("success.template-posted")])	:
			redirect('myaccount/report-template')->with('success', trans("success.template-posted")) ;
	}
	
	public function ViewTemplateFromURL($id, Request $request){
		
		$template				=	Templates::find($id);
				
		if(is_null($template) || $template->status==0) return view('errors.not-found',array('heading'=>'Template','message' => trans('erorrs.template-not-found')));
		
		if($template->user_id == auth()->user()->id) return redirect()->route('template.preview',['id'=>$id]);
		
		/*if($request->has('_token'))
		{
			$auth			=	$request->get('_token');
			$Gauth			=	md5('report-template/'.$id.'/view');
			if($Gauth != $auth) return redirect('myaccount/report-template')->withErrors([trans("error.template-view")]);
		}*/
		
		
		// Give access to all members for beta site
		//$shareData	=	ShareTemplate::where('template_id',$id)->where('receiver_id',auth()->user()->id)->orderBy('id','desc')->first();
		//if(is_null($shareData))  return redirect('myaccount/report-template')->withErrors([trans("errors.template-view")]);
		
		
		
		$categories				=	Templates::GetTemplateCategories($id);
		
		$teplateowner			=	User::find($template->user_id);
		
		$viewData	=	['template' => $template,'categories'=>$categories,'type'=>'preview','owner'=>$teplateowner,'shareData'=>$shareData];
		
		
		return view('report-template.view',$viewData);
	}
	
	
	public function SubmitReport(Request $request){
		
		$data			=	$request->all();
		
		$script			=	new ScriptReport;
		
		$script->user_id		=	Auth::user()->id;
		$script->owner_id		=	Auth::user()->id;
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
			$note	=	PrivateNotes::create(['item_id'=>$script->id,'item_type'=>'report','user_id'=>auth()->user()->id,'note'=>$request->get('script_notes'),'status'=>1]);
			
		}
		return redirect('myaccount/report-template')->with('success', trans('success.template-submitted'));
		//return Redirect::to('myaccount/script-reports')->with('success', trans('success.template-submitted'));
	}
	
	
	public function UpdateTemplateFieldsOrder(Request $request){
		
		$value			=	$request->get('val');
		$type			=	$request->get('type');
		$id				=	$request->get('temp_id');
		$col			=	$request->get('col');
		
		
		$template		=	Templates::find($id);
		
		$existing		=	$template->general_info;
		
		if($type == 'customorder')
		{
			$left	=	$request->get('arrayorder_left');	
			$right	=	$request->get('arrayorder_right');
			
			if(count($left))	$existing['left']	=	$left;
			if(count($right))	$existing['right']	=	$right;
				
			$template->general_info = $existing;
			$template->save();
			return response()->json(['status'=>'ok','msg'=>'Script Info order updated']);
		}
		
		if($type == 'genralinfo')
		{
			$existing		=	$template->general_info;
			if(in_array($value,$existing[$col]))
			{
				$key	=	array_search($value,$existing[$col]);			
				unset($existing[$col][$key]);			
				$template->general_info = $existing;
				$template->save();
			}
			return response()->json(['status'=>'ok','msg'=>'Script Info "'.$value.'"  was deleted successfully','key'=>$key]);
		}
		if($type == 'genralinfother')
		{
			
			$existing		=	$template->general_info;
			//if(array_key_exists('other',$existing)){
				if(in_array($value,$existing[$col]['other']))
				{
					$key	=	array_search($value,$existing[$col]['other']);			
					unset($existing[$col]['other'][$key]);	
					if(!count($existing[$col]['other'])) unset($existing[$col]['other']);		
					$template->general_info = $existing;
					$template->save();
				}
			//}
			return response()->json(['status'=>'ok','msg'=>'Script Info "'.$value.'"  was deleted successfully']);
		}
		
		if(isset($type) && $type=='question'){
			$catid	=	$request->get('catid');
			$questionid	=	$request->get('id');
			$existing	=	json_decode($template->data); 
			if(property_exists($existing,$catid)){			
				if(property_exists($existing->$catid,$questionid)){
					unset($existing->$catid->$questionid);
					if(!count($existing->$catid)) unset($existing->$catid);
				}
			}
			$template->data	=	json_encode($existing);
			$template->save();
			return response()->json(['status'=>'ok','msg'=>'Question was deleted successfully']);
		}
		if(isset($type) && $type=='graphbar'){
			$existing		=	$template->bar_graphs; 
			foreach($existing as $key => $check){ 
				if($check==$value)
					unset($existing[$key]);
			}
			$template->bar_graphs	=	$existing;
			$template->save();
			return response()->json(['status'=>'ok','msg'=>'Grid "'.$request->val.'" was deleted successfully']);
		}
		
		if(isset($type) && $type=='graphbarother'){
			$existing		=	$template->bar_graphs; 
			foreach($existing['other'] as $key => $check){
				if($check==$value)
					unset($existing['other'][$key]);
					if(!count($existing['other'])) unset($existing['other']);
			}
			$template->bar_graphs	=	$existing;
			$template->save();
			return response()->json(['status'=>'ok','msg'=>'Selected value was successfully deleted form grid']);
		}
		
		if(isset($type) && $type=='logsys'){
			$existing		=	$template->logsyn; 
			foreach($existing as $key => $check){ 
				if($check==$value)
					unset($existing[$key]);
					
				if($value=='Logline')	unset($existing['log_reader_inst']);
				if($value=='Synopsis')	unset($existing['syn_reader_inst']);
			}
			$template->logsyn	=	$existing;
			$template->save();
			return response()->json(['status'=>'ok','msg'=>$value.' was deleted successfully']);
		}
		
		if(isset($type) && $type=='notes'){
			$existing		=	$template->notes; 
			foreach($existing as $key => $check){ 
				if($check==$value)
					unset($existing[$key]);
			}
			$template->notes	=	$existing;
			$template->save();
			return response()->json(['status'=>'ok','msg'=>$value.' was deleted successfully']);
		}
		
		if(isset($type) && $type=='notesextra'){
			$existing		=	$template->notes; 
			$deletedValue	=	$existing['other'][$value];
			unset($existing['other'][$value]);
			$template->notes	=	$existing;
			$template->save();
			return response()->json(['status'=>'ok','msg'=>$deletedValue[0].' was deleted successfully']);
		}
		
		if(isset($type) && $type=='character'){
			$template->character_break	=	[];
			$template->save();
			return response()->json(['status'=>'ok','msg'=>'Character Breakdowns was deleted successfully']);
		}
		
		
			
	}
}


