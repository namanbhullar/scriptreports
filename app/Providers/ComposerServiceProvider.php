<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
         view()->composer(
            'includes.myaccount.menu', 'App\ViewComposers\MenuComposer'
        );
		
		 view()->composer(
            ['message.message','message.view'], 'App\ViewComposers\MessageComposer'
        );
		
		view()->composer(
            'admin.*', 'App\ViewComposers\AdminComposer'
        );
		
		view()->composer(
            'includes.myaccount.header', 'App\ViewComposers\NotificationComposer'
        );
		
		view()->composer(
			['admin.users.add','admin.users.edit'], function($view){
				$usergroups	=	DB::table('lr_usergroups')->select('*')->get();
				return $view->with('usergroups',$usergroups);
			}
		);
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
