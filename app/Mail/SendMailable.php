<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Log;
class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data =$data;
        Log::info('$data');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'rutulpatel6550@gmail.com';
        $name = 'rutul patel';

        return $this->view('testmail')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->with([ 'test_message' => $this->data ]);
    }
}
