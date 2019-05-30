<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Toolbar;
use App\Models\User;

use Hash;
use Auth;
use Route;
use URL;
use Redirect;
use DB;
use View;
use Validator;

class AdminUsersController extends AdminBaseController {
	
	public function index(Request $request)
	{	
		if($request->has('search') || $request->has('ft_plan')){
			$QBulder	=	User::select('*');
			
			if($request->has('search')){
				$QBulder	=	User::where(function($query) use ($request){
											$query->where('first_name', 'LIKE', '%'. $request->get('search') .'%');
											$query->orWhere('last_name', 'LIKE', '%'. $request->get('search') .'%');
										});
			}			
			
			if($request->has('ft_plan')) $QBulder = $QBulder->where('user_plan',$request->get('ft_plan'));
			
			$users	=	$QBulder->get();			
			
		}else{			
			$users	=	User::all();
		}
		
		return view('admin.users.index', array('users' => $users));						
	}
	
	
	public function AddNewUser(){				
		return view('admin.users.add');
	}
	
	public function StoreNewUser(Request $request){
		 
		$validator	=	User::storeUser(); 	
		
			if(is_object($validator) && $validator->fails()){
				return Redirect::back()->withInput()
					->withErrors(implode('<br/>',$validator->messages()->all()));	
			}
		return Redirect::to('/admin/users')->with('success', 'User added successfully');
	}
	
	public function editUser($id){
			
			$user	=	User::find($id);
			return View::make('admin.users.edit',array('user' => $user));
	}
	
	public function updateUser($id,Request $request){
		
			// Validation rulles
		 $rules = array('first_name' => 'required', 
		 				'email' => 'required|email',
						'password' => 'min:5',
						'confirm_password' => 'same:password'
						);
		
		$validator = Validator::make($request->all(), $rules);
		
		// validate inputs
		if ($validator->fails())
		{
			return Redirect::back()->withInput()
					->withErrors(implode('<br/>',$validator->messages()->all()));	
		}

		// save user if validation is passed 
		$user = User::find($id);
 		$user->first_name 	= $request->get('first_name');
        $user->last_name  	= $request->get('last_name');
        $user->email      	= $request->get('email');
		$user->featured		=  $request->get('featured');
		$user->user_plan	=  $request->get('user_plan');				
		
		if($request->get('password'))
        	$user->password   	= Hash::make($request->get('password'));
		
		$user->user_group	=  $request->get('user_group');;	
 		$user->save();
		
		
		return Redirect::to('/admin/users')->with('success', 'User updated successfully');
	}	
	
	
	public function DoFormTask(Request $request)
	{		
		$task	=	$request->get('task');
		$model	=	$request->get('_model');
		$route	=	'admin/users';
		$check	=	$request->get('checkfl');
		if(count($check)<0) return Redirect::back()->withErrors('Please select at least one record');
		
		// Delete action
		if($task=='delete')
		{			
			if(in_array('1',$check))
			{
				return Redirect::back()->withErrors('You can not delete Supper User account');	
			}
			elseif(in_array(Auth::user()->id,$check))
			{
				return Redirect::back()->withErrors('You can not delete yourself account');	
			}
			else
			{
				User::Destroy($check);	
			}
			return Redirect::to($route)->with('success', 'Selected records deleted successfully');			
		}
	
		// Activate or block action
		if($task=='activate' || $task=='block')
		{
			$status	 =	($task=='activate') ? '0' : '1';
			
			if(in_array('1',$check))
			{
				return Redirect::back()->withErrors('you can not change status of Supper User');
			}
				elseif(in_array(Auth::user()->id,$check))
			{
				return Redirect::back()->withErrors('you can not change yourself status');
			}
			else
			{
				User::WhereIn('id',$check)->update(['status'=> $status]);
			}
			
			return Redirect::to($route)->with('success', 'Status has beed updated for selected records');				
		}
		return Redirect::back()->withErrors('Please select at least one record');			
	}

}
