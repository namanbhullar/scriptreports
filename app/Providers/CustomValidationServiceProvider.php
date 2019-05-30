<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;

class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //Extand Validator Fro custom Check
		Validator::extend("capital", function($attribute, $value, $parameters) {
			preg_match('/([A-Z])/',$value,$matchCap);
			if(count($matchCap) != 0){
				return true;
			}else{
				return false;
			}
		});
		Validator::extend("number1", function($attribute, $value, $parameters) {
			preg_match('/([0-9])/',$value,$matchNum);
			if(count($matchNum) != 0){
				return true;
			}else{
				return false;
			}
		});
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
