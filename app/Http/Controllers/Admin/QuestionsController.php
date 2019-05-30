<?php 

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;


use App\Models\Questions;
use App\Models\Categories;

use Route;
use URL;
use Redirect;
use Validator;
use View;

class QuestionsController extends AdminBaseController {

	
	/**
	 * Default action for dashboard
	 *
	 * @return Response
	 */
	
	public function index(){
		
		$filter	=	request()->get('filter');
		if(!$filter)
			$questions	=	Questions::where('type','0')->get();
		else
			$questions	=	Questions::SearchQuestion($filter);	
	
		$categories	=	Categories::where('status',0)->where('type',0)->get();
		return View::make('admin.templates.qustionsIndex', array('questions' => $questions,'categories'=>$categories));
						
	}
	
	public function AddNew(){
		
			$categories	=	Categories::where('status','0')->get();
			
			return View::make('admin.templates.questionsNew',array('categories'=>$categories));
			
	}
	
	public function StoreQuestion(){
		
			$validator	=	Questions::SaveNew();
			
			if(is_object($validator) && $validator->fails()){
				return Redirect::back()->withInput()
					->withErrors(implode('<br/>',$validator->messages()->all()));	
			}	
			
			
			return Redirect::to('/admin/questions')->with('success', 'Question added successfully');
	}
	
	
	public function EditQuestion($id){
		
			
			$Questions	=	Questions::find($id);
			$categories	=	Categories::where('status','0')->get();
			
			return View::make('admin.templates.questionsEdit', array('question' => $Questions,'categories'=>$categories));
	}
	
	public function UpdateQuestion($id){
		
			$validator	=	Questions::Update($id);
			
			if(is_object($validator) && $validator->fails()){
				return Redirect::back()->withInput()
					->withErrors(implode('<br/>',$validator->messages()->all()));	
			}	
			
			return Redirect::to('/admin/questions')->with('success', 'Question updated successfully');
	}
	
	public function DoFormTask(Request $request)
	{		
		$task	=	$request->get('task');
		$route	=	'admin/questions';
		$check	=	$request->get('checkfl');
		if(count($check)<0) return Redirect::back()->withErrors('Please select at least one record');
		
		// Delete action
		if($task=='delete')
		{
			Questions::Destroy($check);	
			return Redirect::to($route)->with('success', 'Selected records deleted successfully');			
		}
	
		// Activate or block action
		if($task=='activate' || $task=='block')
		{
			$status	 =	($task=='activate') ? '0' : '1';
						
			Questions::WhereIn('id',$check)->update(['status'=> $status]);
			
			return Redirect::to($route)->with('success', 'Status has beed updated for selected records');				
		}
		
		return Redirect::back()->withErrors('Please select at least one record');			
	}
		
	
}
