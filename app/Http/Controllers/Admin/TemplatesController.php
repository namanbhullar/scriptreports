<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;


use App\Models\Templates;

use Route;
use URL;
use Redirect;
use Validator;
use View;

class TemplatesController extends AdminBaseController {


	public function index(){
		
		$search	=	request()->get('search_cat');
		$templates	=	Templates::where('draft',0)->get();
		return View::make('admin.templates.templateIndex', array('templates' => $templates));
						
	}
	
	public function AddNew(){
			return View::make('admin.templates.categoryNew');
			
	}	
		
	public function DoFormTask(Request $request)
	{		
		$task	=	$request->get('task');
		$route	=	'admin/templates';
		$check	=	$request->get('checkfl');
		if(count($check)<0) return Redirect::back()->withErrors('Please select at least one record');
		
		// Delete action
		if($task=='delete')
		{
			Templates::Destroy($check);	
			return Redirect::to($route)->with('success', 'Selected records deleted successfully');			
		}
	
		// Activate or block action
		if($task=='activate' || $task=='block')
		{
			$status	 =	($task=='activate') ? '1' : '0';
						
			Templates::WhereIn('id',$check)->update(['status'=> $status]);
			
			return Redirect::to($route)->with('success', 'Status has beed updated for selected records');				
		}
		
		return Redirect::back()->withErrors('Please select at least one record');			
	}
	
	
}
