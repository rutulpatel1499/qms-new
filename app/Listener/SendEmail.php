<?php

namespace App\Listener;

use App\Event\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
class SendEmail
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
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        Log::info($event->email);
        Log::info('email has been sent your gmail  address.');
        echo ('email has been sent your gmail  address');
        // echo $event->email;
    }
}
