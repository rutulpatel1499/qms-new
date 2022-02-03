<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendMailable;
use Log;
use Mail;
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // log::info('yessss');
        // $emailjob=(new SendEmailJob())->delay(now()->addSeconds(15));
        $user = ['message' => 'This is a test!'];
        Mail::to('ghanshyampatel6550@gmail.com')->send(new SendMailable($user));
    }
    
}
