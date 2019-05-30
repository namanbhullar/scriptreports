<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ScriptManagerController extends Controller
{
    public function index(){
		return view('script-manager.index');
	}
}
