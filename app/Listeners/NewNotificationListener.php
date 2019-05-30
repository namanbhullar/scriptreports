<?php

namespace App\Listeners;

use App\Events\NewNotificationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewNotificationListener
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
    public function handle(NewNotificationEvent $event)
    {
		$event->notifaication->user_id		=	($event->inbox->inbox->sender_id == $event->sender->id) ? $event->inbox->inbox->receiver_id :  $event->sender->id;
		$event->notifaication->sender_id	=	$event->sender->id;
		$event->notifaication->type			=	$event->type;
		$event->notifaication->is_seen		=	0;
		$event->notifaication->item_id		=	$event->inbox->inbox->id;
		$event->notifaication->message		=	trans("notification.".$event->type, ['name' => str_limit($event->sender->first_name,20)]);
		$event->notifaication->notification_type	=	$event->cat;
		$event->notifaication->save();
    }
}
