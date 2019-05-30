<?php
namespace App\ViewComposers;

use Illuminate\View\View;

use DB;

use URL;

class MessageComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $data;
	
	protected $defaults	=	['email'=>true,'ScriptPermission'=>false,'contact'=>true,'template'=>true,'redirect_url'=>'message-recieve','report'=>false];

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
		$this->data	=	$view->getData();
		
		array_walk($this->defaults ,function(&$a,$key,$data){ $a	= array_key_exists($key,$data) ? $data[$key] : $a; },$this->data);
		//dump($this->data);
		$view->with([
						'MSGtemplates'	=> $this->getTemplates(),
						'MSGscripts'=> $this->getScripts(),
						'MSGcontacts' => $this->getContacts(),
						'MSGreaders' => $this->getReders()
						])
					->with($this->defaults);					
		
		
    }
	
	public function getTemplates()
	{		
		if(array_key_exists('MSGtemplates',$this->data) && !$this->data['MSGtemplates'] ) return false;		
		
		$user_id	=	auth()->user()->id;
		$template	=	DB::table('lr_templates')
					->leftjoin("lr_favorites",function($query) use ($user_id){
						$query->on("lr_favorites.item_id","=","lr_templates.id")
								->where("lr_favorites.item_type","=","template")
								->where('lr_favorites.user_id','=',$user_id);
					})
					->select('lr_templates.*')
					->addselect('lr_favorites.id as fid')
					->where('lr_templates.user_id','=',$user_id)					
					->orwhere('lr_favorites.user_id','=',$user_id)
					->get();
					
		return $template;		
	}
	
	public function getScripts()
	{
		if(array_key_exists('MSGscripts',$this->data) && !$this->data['scripts'] ) return false;		
		
		return auth()->user()->scripts()->get();
	}
	
	public function getContacts()
	{
		if(array_key_exists('contacts',$this->data) && !$this->data['contacts'] ) return false;		
		
		$contacts =  auth()->user()->contacts()->with('contactUser.profile')->get();		
		
		$contacts	=	$contacts->filter(function($value,$i){
											return !is_null($value->contactUser);
										});
			
		return $contacts;
	}
	
	public function getReders()
	{
											
		auth()->user()->load('submission.reader.user.profile');	
		
		if(!is_null(auth()->user()->submission)){	
			$readers		=	auth()->user()->submission->reader;	
			
		}else{
			$readers = array();	
		}

		return $readers;
	}
	
}