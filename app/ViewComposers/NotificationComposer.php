<?php
namespace App\ViewComposers;

use Illuminate\View\View;

use DB;

use URL;

class NotificationComposer
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
	     $this->user	=	  auth()->user();
		 $this->filterNotification();
    }
	
	protected $user;	
	protected $notification;	
	protected $message;	
	protected $request;
	

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */	 
	 
	public function filterNotification()
	{
		
		//$this->notification	=	$this->user->notification()->where('notification_type',1)->orderBy('id','desc')->take(15)->get();
									
		//$this->message		=	$this->user->notification()->where('notification_type',2)->orderBy('id','desc')->take(15)->get();
		
		$this->message		=	$this->user->notification()->whereIn('notification_type',[1,2,3])->orderBy('id','desc')->take(15)->get();
									
		//$this->request		=	$this->user->notification()->where('notification_type',3)->orderBy('id','desc')->take(15)->get();
				
	}
	
    public function compose(View $view)
    {	
		return $view->with([
						//'notifications'	=> $this->notification,
						'message'=> $this->message,
						//'request' => $this->request,						
						]);		
    }
}