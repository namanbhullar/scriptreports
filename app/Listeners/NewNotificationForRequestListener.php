<?php

namespace App\Listeners;

use App\Events\NewNotificationForRequestEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use URL;

class NewNotificationForRequestListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewNotificationEvent  $event
     * @return void
     */
    public function handle(NewNotificationForRequestEvent $event)
    { 
		$event->notifaication->user_id		=	$event->request->receiver_id;
		$event->notifaication->sender_id	=	$event->request->sender_id;
		$event->notifaication->type		=	$event->type;
		$event->notifaication->is_seen	=	0;
		$event->notifaication->item_id	=	$event->request->id;
		$event->notifaication->message	=	trans("notification.".$event->type, ['name' => "<a target='_blank' href='".url::to('/profile/'.$event->request->sender->id.'/view')."'>".$event->request->sender->first_name."</a>"]);
		$event->notifaication->notification_type	=	$event->cat;
		$event->notifaication->save();
    }
}
