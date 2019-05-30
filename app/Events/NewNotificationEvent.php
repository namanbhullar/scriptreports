<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Models\Inboxdetail;
use App\Models\Notification;

class NewNotificationEvent extends Event
{
    use SerializesModels;

	public $inbox;
	
	public $notifaication;
	
	public $type;
	
	public $cat;
	
	public $sender;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Inboxdetail $inbox, Notification $notifi, $type)
    {
        $this->inbox	=	$inbox;
		$this->notifaication	=	$notifi;
		$this->type	=	$type;
		
		$this->sender	=	$inbox->sender;
		
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
				case 'script-share':
					if($this->inbox->has_template)								$this->type	=	'script-with-template';
					else														$this->type	=	'script-share';
				break;
				
				case 'template-share':
					if($this->inbox->has_script)								$this->type	=	'template-with-script';
					else														$this->type	=	'template-share';
				break;
				
				case 'report-share':
					if($this->inbox->has_template && $this->inbox->has_script)	$this->type	=	'report-with-both';
					elseif($this->inbox->has_script)							$this->type	=	'report-with-script';
					elseif($this->inbox->has_template)							$this->type	=	'report-with-template';
					else														$this->type	=	'report-share';
				break;
				
				case 'contactaddbyinvite':
					$this->type	=	'invite-friend';
				break;
				
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
				
				case 'message-recieve':
				default:
					if($this->inbox->has_template && $this->inbox->has_script)	$this->type	=	'message-with-both';
					elseif($this->inbox->has_script)							$this->type	=	'message-with-script';
					elseif($this->inbox->has_template)							$this->type	=	'message-with-template';
					else														$this->type	=	'message-recieve';
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
