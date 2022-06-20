<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Services\SendSubscriptionAlertEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSubscriptionNotice implements ShouldQueue
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
     * @param  \App\Events\PostPublished  $event
     * @return void
     */
    public function handle(PostPublished $event)
    {
        SendSubscriptionAlertEmail::sendEmail($event->website, $event->post);
    }
}
