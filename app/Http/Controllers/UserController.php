<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use App\Models\PromoCodes;
use App\Models\OtLinks;
use App\Models\Invitation;
use App\Models\Profile;
use App\Models\PrivateNotes;


use Mail;

use Validator;

use Hash;

use Auth;


class UserController extends Controller
{
    public function ChangePassword($id)
    {
        $user	=	User::find($id);
		$user->fill(['password'=>Hash::make('koden321')])->save();
    }
	
	public function changeSettings(Request $request)
	{
		$data	=	$request->all();
		$user	=	auth()->user();
		$user->first_name	=	$data['f_name'];
		$user->last_name	=	$data['l_name'];
		$user->email	=	$data['email'];
		
		if($user->user_group != 1) $user->username	=	$data['email'];
		
		$user->save();
		
		if($request->has('conf_password') && $request->has('new_password') && $request->has('old_password')){
			if (Hash::check($data['old_password'], $user->password)){
				if($data['conf_password'] == $data['new_password']){
					$user->password	=	Hash::make($data['new_password']);
					$user->save();
				}else{
					return back()->withErrors('New Password and Confirm Password did not match, Please try again.')->withInput();
				}
			}else{
				return back()->withErrors('Old Password did not match, Please try again.')->withInput();
			}
		}
		
		return back()->withSuccess('Chages Saved Successfully.');
	}
	
	public function searchUserByEmail(){}
	
	
	
	public function search(Request $request)
	{
		$validator	=	Validator::make($request->all(),['email'=>'required|email|unique:lr_users']);
		
		$userId	=	(Auth::check())  ? auth()->user()->id : 0;
		
		if($validator->fails()){
			$failedRules	=	$validator->failed();
			
			//dd($failedRules);
			
			if(array_key_exists('email',$failedRules))
			{
				if(array_key_exists('required',$failedRules['email']))
				{
					return response()->json([
												"status"=>"fail",
												"msg"=>"Please Enter a Email."
											]);
				}
				
				if(array_key_exists('email',$failedRules['email']))
				{
					return response()->json([
												"status"=>"fail",
												"msg"=>"Please Enter a valid Email address."
											]);
				}
				
				if(array_key_exists('Unique',$failedRules['email']))
				{
					$user	= User::where('email',$request->email)->first();
					$user->load('profile');
					
					return response()->json([
												"status"=>"ok",
												"user"=> true,
												"img"	=>	$user->profile->image,
												"isSelf"	=>	($userId==$user->id) ? true : false,
												"selfId"		=>	$userId,
												"name"	=>	$user->profile->full_name,
												"link"	=>	$user->link,
											]);
				}
			}
		}
		
		return response()->json([
									"status"=>"ok",
									"user"=> false,
								]);
	}
	
	public function getPrivateNote(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'id' => 'required',
			'type'=>'required',
        ]);
		
		if ($validator->fails()) {
            return response()->json(['status'=>'fails','msg'=>trans('errors.invalid-argument')]);
        }	
		
		$notes	=		PrivateNotes::where('user_id',auth()->user()->id)
									->where('item_id',$request->id)
									->where('item_type',$request->type)
									->where('status',1)
									->first();
		if(is_null($notes))	$notes	=	PrivateNotes::create([
															'user_id'=>auth()->user()->id,
															'item_id'=>$request->id,
															'item_type'=>$request->type,
															'status'=>1]);
		
		return response()->json(['status'=>'ok','note'=>$notes->note]);
	}
	
	public function setPrivateNote(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'item_id' => 'required',
			'type'=>'required',
			'note'=>'required'
        ]);
		
		if ($validator->fails()) {
            return response()->json(['status'=>'fails','msg'=>trans('errors.invalid-argument')]);
        }	
		
		$notes	=		PrivateNotes::where('user_id',auth()->user()->id)
									->where('item_id',$request->item_id)
									->where('item_type',$request->type)
									->where('status',1)
									->first();
									
		if(is_null($notes))	return response()->json(['status'=>'fails','msg'=>trans('errors.not-found',['file'=>'Report'])]);
		
		$notes->note	=	$request->note;
		$notes->save();
		
		return response()->json(['status'=>'ok','msg'=>trans('success.pvt-notes-save')]);
	}
	
	public function ReadNotification(Request $request)
	{
		auth()->user()->notification()->whereIn('id',json_decode($request->ids))->update(['is_seen'=>1]);
		return response()->json(['status'=>'ok']);
	}
}
