<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;


use App\Models\OtLinks;

use Route;
use URL;
use Redirect;
use Validator;
use View;

class OtLinksController extends AdminBaseController {



	protected $layout 		=	'admin.layouts.master';
	protected $layout_full 	=	 NULL;
	

	
	/**
	 * Default action for dashboard
	 *
	 * @return Response
	 */
	
	public function index(){
		
		$filterplan	=	request()->get('ft_plan');
		if(!$filterplan)
			$otlinks	=	OtLinks::all();
		else
			$otlinks	=	OtLinks::SearchOTlinks($filterplan);		
			
		return View::make('admin.otlinks.index', array('otlinks' => $otlinks));
						
	}
	
	public function AddNew(){
		return View::make('admin.otlinks.add');
	}
	
	public function StoreOtlink(){
		
			OtLinks::StoreOtlink(); 	
		
			return Redirect::to('/admin/otlinks')->with('success', 'One Time Link added successfully');
	}
	
	
	public function EditOtLink($id){
		
			$otlink	=	OtLinks::find($id);
			 	
			return View::make('admin.otlinks.edit', array('otlink' => $otlink));
	}
	
	public function UpdateOtLink($id){
		
			$validator	=	OtLinks::UpdateOtLink($id); 	
		
		return Redirect::to('/admin/otlinks')->with('success', 'One Time Link updated successfully');
			
	}
	
	public function DoFormTask(Request $request)
	{		
		$task	=	$request->get('task');
		$route	=	'admin/otlinks';
		$check	=	$request->get('checkfl');
		if(count($check)<0) return Redirect::back()->withErrors('Please select at least one record');
		
		// Delete action
		if($task=='delete')
		{
			OtLinks::Destroy($check);	
			return Redirect::to($route)->with('success', 'Selected records deleted successfully');			
		}
	
		// Activate or block action
		if($task=='activate' || $task=='block')
		{
			$status	 =	($task=='activate') ? '0' : '1';
						
			OtLinks::WhereIn('id',$check)->update(['status'=> $status]);
			
			return Redirect::to($route)->with('success', 'Status has beed updated for selected records');				
		}
		
		return Redirect::back()->withErrors('Please select at least one record');			
	}
	
	
}
