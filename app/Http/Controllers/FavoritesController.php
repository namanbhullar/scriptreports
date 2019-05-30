<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Favorites;

use Validator;

class FavoritesController extends Controller
{
    public function ChagneStatus(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'id' => 'required',
			'status'=>'required',
        ]);
		
		if ($validator->fails()) {
            return response()->json(['status'=>'fails','msg'=>trans('errors.invalid-argument')]);
        }
		
		$user	=	auth()->user();
		
		$favorite	=	$user->favorites()->where('id',$request->id)->first();
		
		if(is_null($favorite)) return response()->json(['status'=>'fail','msg'=>trans('errors.not-found',['file'=>'Favorite'])]);
		
		if($request->status == 'delete')
		{
			$favorite->delete();
			return response()->json(['status'=>'ok','msg'=>trans('success.file-delete',['file'=>'Favorite'])]);
		}
		elseif($request->status == 'archived')
		{
				$favorite->status	=	0;
				$favorite->save();
				return response()->json(['status'=>'ok','msg'=>trans('success.move-to-folder',['file'=>'Favorite','to'=>'Archived'])]);
		}
		else
		{
				$favorite->status	=	1;
				$favorite->save();
				return response()->json(['status'=>'ok','msg'=>trans('success.move-to-folder',['file'=>'Favorite','to'=>ucfirst($favorite->item_type)]),'tab'=> ucfirst($favorite->item_type)]);
		}
	}
	
	
	public function create(Request $request)
	{
		$rules	=	['type'=>'required','id'=>'required'];
		$valdator	=	Validator::make($request->all(),$rules);
		
		if($valdator->fails)
		{
			return response()->json(['stauts'=>'fai;','msg'=>'Invalid Aruments.']);
		}
		
		$user	=	auth()->user();
		
		$check	=	$user->favorites()->where('item_type',$request->type)->where('item_id',$request->id)->first();
		
		if(!is_null($check))
		{
			$check->delete();
			return response()->json(['status'=>'remove','msg'=>trans('success.favorite-remove',['type'=>ucfirst($request->type)])]);
		}
		
		$favorites	=	new Favorites;
		$favorites->user_id	=	$user->id;
		$favorites->item_type	=	$request->type;
		$favorites->item_id	=	$request->id;
		$favorites->save();
		
		return response()->json(['status'=>'ok','msg'=>trans('success.favorite-add')]);
		
	}
}

