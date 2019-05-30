<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	
	protected $layout			=	'frontend.layout.masterlayout';
	protected $Comman_styles	=	['style.css','fonts.css','template.css'];
	protected $title			=	'';
	protected $content			=	'';
	
	public function setlayout(){
		return view($this->layout,['title'=>$this->title,'content'=>$this->content]);
	}
}
