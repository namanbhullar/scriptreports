<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;


use App\Models\PromoCodes;

use Route;
use URL;
use Redirect;
use Validator;
use View;

class PromoCodeController extends AdminBaseController {


	/**
	 * Default action for dashboard
	 *
	 * @return Response
	 */
	
	public function index(){
		
		$filterplan	=	request()->get('ft_plan');
		if(!$filterplan)
			$promocodes	=	PromoCodes::all();
		else
			$promocodes	=	PromoCodes::SearchPromoCode($filterplan);	
			
		return View::make('admin.promocodes.index', array('promocodes' => $promocodes));
						
	}
	
	public function AddPromoCode(){
		
		return View::make('admin.promocodes.add');
	}
	
	public function StorePromoCode(){
		
			$validator	=	PromoCodes::storePromoCode(); 	
		
			if(is_object($validator) && $validator->fails()){
				return Redirect::back()->withInput()
					->withErrors(implode('<br/>',$validator->messages()->all()));	
			}
		return Redirect::to('/admin/promocode')->with('success', 'Promo code added successfully');
	}
	
	
	public function EditPromoCode($id){
		
			$promocode	=	PromoCodes::find($id);
			 	
			return View::make('admin.promocodes.edit', array('promocode' => $promocode));
	}
	
	public function UpdatePromoCode($id){
		
			$validator	=	PromoCodes::updatePromoCode($id); 	
		
			if(is_object($validator) && $validator->fails()){
				return Redirect::back()->withInput()
					->withErrors(implode('<br/>',$validator->messages()->all()));	
			}
		return Redirect::to('/admin/promocode')->with('success', 'Promo code updated successfully');
			
	}
	
	public function DoFormTask(Request $request)
	{		
		$task	=	$request->get('task');
		$route	=	'admin/promocode';
		$check	=	$request->get('checkfl');
		if(count($check)<0) return Redirect::back()->withErrors('Please select at least one record');
		
		// Delete action
		if($task=='delete')
		{
			PromoCodes::Destroy($check);	
			return Redirect::to($route)->with('success', 'Selected records deleted successfully');			
		}
	
		// Activate or block action
		if($task=='activate' || $task=='block')
		{
			$status	 =	($task=='activate') ? '0' : '1';
						
			PromoCodes::WhereIn('id',$check)->update(['status'=> $status]);
			
			return Redirect::to($route)->with('success', 'Status has beed updated for selected records');				
		}
		
		return Redirect::back()->withErrors('Please select at least one record');			
	}
	
	

}
