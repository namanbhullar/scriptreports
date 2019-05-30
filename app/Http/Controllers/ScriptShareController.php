<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Scripts;

class ScriptShareController extends Controller
{
    public function track($id)
	{
		$script	=	Scripts::findOrFail($id);
		$track	=	$script->track;
		if(is_null($track)) return view('errors.not-found');
		return view('script-manager.scripts.track')->with(['script'=>$script]);
	}
}
