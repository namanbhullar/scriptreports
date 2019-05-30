<?php

namespace App\Http\Middleware;

use Closure;
use URL;

class Reader
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
		if(!$request->session()->has('reader')){
			$request->session()->put('reader_redirect',URL::current());
			return redirect('/directory/login')->withErrors(trans('errors.page-protected'));
		}
		
        return $next($request);
    }
}
