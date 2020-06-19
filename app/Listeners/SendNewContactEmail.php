<?php

namespace App\Listeners;

use App\Jobs\NewContact;
use App\Events\NewContactEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewContactEmail implements ShouldQueue
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
     * @param  NewContactEvent  $event
     * @return void
     */
    public function handle(NewContactEvent $event)
    {
        NewContact::dispatch($event->contact)->delay(now()->addSeconds('15'));
    }
}
