<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use App\Models\User;
use App\Models\Scripts;
use App\Models\Templates;

class ReaderController extends Controller
{
	public function login(Request $request){
		if($request->session()->has('reader')) return redirect('/directory');
		
		return view('reader.login');
	}
	
	public function dologin(Request $request){
		if($request->password != "reader") return redirect('/directory/login')->withErrors(trans('errors.wrong-password'));
		
		$request->session()->put('reader',"yes");
		
		return redirect($request->session()->pull('reader_redirect','/directory'));
	}
	
	public function index(Request $request){
		$members	=	User::GetReaders('w'); 
		$featured	=	User::GetFeaturedUsers();
		
		return view('member-directory.list')->with([
													'members'=>$members,
													'featured'=>$featured,
													'data'=>$request->all()
													]);
	}
}
