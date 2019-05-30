<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Models\RequestsAll;
use App\Models\Notification;

class NewNotificationForRequestEvent extends Event
{
    use SerializesModels;

	public $request;
	
	public $notifaication;
	
	public $type;
	
	public $cat;
	
	public $sender;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(RequestsAll $request, Notification $notifi, $type)
    {
        $this->request			=	$request;
		$this->notifaication	=	$notifi;
		$this->type				=	$type;
		
		$this->sender			=	$request->sender_id;
		
		$this->setType();
		$this->setCat();
		
		
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
	
	public function setType()
		{
			switch($this->type)
			{
				
				case'report-rturned':
					$this->type	=	'report-rturned';
				break;
				
				case'request-script':
					$this->type	=	'request-script';
				break;
				
				case'submission-profile-request':
					$this->type	=	'subm-add-prof-req';
				break;
				
				case 'script-view-request':
					$this->type	=	'script-view-request';
				break;
				
				case 'invite-friend':
				default:
					$this->type	=	'invite-friend';
				break;
		}
	}
	
	
	//type 1 == notification with message
	//type 2 == notification only
	//type 3 == same as 1 , for future use
	
	public function setCat()
	{
		switch($this->type)
		{		
				
				
				
				case 'invite-friend':
				case 'contactaddbyinvite':
				case 'report-rturned':
					$this->cat	=	2;
				break;
				
			
				case 'script-view-request':
					$this->cat	=	3;
				break;	
				
				case 'subm-add-prof-req':
				case'request-script':				
				case'submission-profile-request':
				case 'script-share':
				case 'template-share':
				case 'report-share':
				case 'message-recieve':
				default:
					$this->cat	=	1;
				break;
				
				
				
		}
	}
}
