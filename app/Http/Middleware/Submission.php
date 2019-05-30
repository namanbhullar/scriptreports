<?php

namespace App\Http\Middleware;

use Closure;
use URL;

class Submission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		if(auth()->check() && $request->route()->getPath() == "submission-directory/{id}/view"){
			$RouteParams	=	$request->route()->parameters();
			if(array_key_exists('id',$RouteParams)){
				if($RouteParams['id'] == auth()->user()->id) return $next($request); 
			}
		}
		
		if(!$request->session()->has('submission')){	
			$request->session()->put('submission_redirect',URL::current());
			return redirect('/submission-directory/login')->withErrors(trans('errors.page-protected'));
		}
		//$request->session()->forget('submission');
        return $next($request);
    }
}
