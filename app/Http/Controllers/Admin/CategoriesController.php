<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;


use App\Models\Categories;

use Route;
use URL;
use Redirect;
use Validator;
use View;

class CategoriesController extends AdminBaseController {



	protected $layout 		=	'admin.layouts.master';
	protected $layout_full 	=	 NULL;
	

	
	/**
	 * Default action for dashboard
	 *
	 * @return Response
	 */
	
	public function index(){
		
		
		$categories	=	Categories::where('type',0)->get();
		return View::make('admin.templates.categoryIndex', array('categories' => $categories));
						
	}
	
	public function AddNew(){
			return View::make('admin.templates.categoryNew');
			
	}
	
	public function StoreCategory(){
		
			$validator	=	Categories::SaveNew();
			
			if(is_object($validator) && $validator->fails()){
				return Redirect::back()->withInput()
					->withErrors(implode('<br/>',$validator->messages()->all()));	
			}	
			
			
			return Redirect::to('/admin/categories')->with('success', 'Category added successfully');
	}
	
	
	public function EditCategory($id){
		
			
			$category	=	Categories::find($id); 
			return View::make('admin.templates.categoryEdit', array('category' => $category));
	}
	
	public function UpdateCategory($id){
		
			$validator	=	Categories::Update($id);
			
			if(is_object($validator) && $validator->fails()){
				return \Redirect::back()->withInput()
					->withErrors(implode('<br/>',$validator->messages()->all()));	
			}	
			
			return Redirect::to('/admin/categories')->with('success', 'Category updated successfully');
	}
		
	public function DoFormTask(Request $request)
	{		
		$task	=	$request->get('task');
		$route	=	'admin/categories';
		$check	=	$request->get('checkfl');
		if(count($check)<0) return Redirect::back()->withErrors('Please select at least one record');
		
		// Delete action
		if($task=='delete')
		{
			Categories::Destroy($check);	
			return Redirect::to($route)->with('success', 'Selected records deleted successfully');			
		}
	
		// Activate or block action
		if($task=='activate' || $task=='block')
		{
			$status	 =	($task=='activate') ? '0' : '1';
						
			Categories::WhereIn('id',$check)->update(['status'=> $status]);
			
			return Redirect::to($route)->with('success', 'Status has beed updated for selected records');				
		}
		
		return Redirect::back()->withErrors('Please select at least one record');			
	}
	
}
