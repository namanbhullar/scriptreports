<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use Request;
use URL;

use App\Models\ShareScript;
use App\Models\Inbox;

class MenuComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $user;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
		$this->user	=	auth()->user();
        // Dependencies automatically resolved by service container...
       if($this->user->user_group == 4)
	   {
		  $this->SubMenus['script-manager']["submission-guidelines"] ="submission-guidelines";
	   }
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */	 
    public function compose(View $view)
    {
		
		$menu	=	$this->getMenuUrl( $this->Menus );
		
		$submenu	=	$this->getMenuUrl( $this->SubMenus );	
		
		$active	=	$this->getActiveMenu();
		
		//echo "<pre>";print_r($submenu);exit;
		
        $view->with('menus', $menu)
			 ->with('submenu',$submenu)
			 ->with('active',$active)
			 ->with('unReadCount',$this->unreadcount());
    }
	
	public function getUrlFunction(){	
		return function($url) {
			if(is_array($url)){
				return $this->handleSubmenu($url);
			}
			return url("myaccount/$url");
		};
	}
	
	public function handleSubmenu($value){
		$parent	=	array_search($value,$this->SubMenus);
		$value	=	array_map(function($val) use ($parent){ return $parent.'/'.$val;},$value);
		return 	$this->getMenuUrl($value);
	}
		
	public function getMenuUrl($arr){
		return array_map($this->getUrlFunction(),$arr);
	}
	
	protected $Menus	=	[
		"script-manager"	=>	"script-manager",
		"script-reports"	=>	"script-reports",
		"report-template"	=>	"report-template",
		"message"	=>	"message",
		"profile"	=>	"profile",
		"contacts"	=>	"contacts",
		"favorites"	=>	"favorites",
		"invite-friends"	=>	"invite-friends",
	];
	
	protected $SubMenus	=	[
		"script-manager"	=>[
			"scripts"=>"scripts",
			"script-add"=>"script-add",
			//"request-scripts"=>"request-scripts",
			//"submission-guidelines"=>"submission-guidelines",
			"my-documents"=>"my-documents",
		],
	];
	
	public function getActiveMenu(){
		$baseurl	=	URL::to('/myaccount');
		$uri	=	URL::current();
		$lenth	=	strpos($uri,$baseurl) + strlen($baseurl) + 1;//+1 for '/'		
		$diff	=	explode('/',substr($uri,$lenth));
				
		$MainMenu	=	array_intersect($diff,$this->Menus);
		$submenu	=	array_map(function($value) use ($diff){
			return array_intersect($value,$diff);
		},$this->SubMenus);
		
//			echo "<pre>";print_r(['main'=>$MainMenu,'sub'=>$submenu]);exit;
		
		return ['main'=>empty($MainMenu) ? ['script-manager'] : $MainMenu,'sub'=>$submenu];
	}
	
	public function unreadcount()
	{		//echo $this->user->MessageReceivedByMe()->where('r_status',1)->count(); exit;
		return [
			'script-manager.scripts'=> $this->user->ScriptSharedToME()->where('is_seen',0)->count(),
			'message'=> ($this->user->MessageReceivedByMe()->where('r_status',1)->count() + $this->user->MessageSendedByMe()->where('s_status',1)->count()),
			'script-reports'=> $this->user->ScriptReports()->where('owner_id','!=',$this->user->id)->where('type',1)->where('is_seen',0)->count()
		];
	}
}