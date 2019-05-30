<?php
namespace App\ViewComposers;

use Illuminate\View\View;


use DB;
use Route;
use URL;
use App\Http\Helper;

class HeaderComposer
{
    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
       
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */	 
	 
	
    public function compose(View $view)
    {
		
		$view->with([
						'languages' => 	Helper::GetLocales();,
						'currencies'=>	Helper::GetCurrencies();,
						'countries' => 	Helper::GetCountries()
						]);
		
		
    }
		
}