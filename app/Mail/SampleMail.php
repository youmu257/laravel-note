<?php

namespace App\Mail;

use Config;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SampleMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * input data 
     * 
     * @var array
     */
    private $requestData;

    /**
     * Create a new message instance.
     *
     * @param array $requestData
     * 
     * @return void
     */
    public function __construct(array $requestData)
    {
        $this->requestData = $requestData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(trans('messages.SAMPLE_MAIL_SUBJECT'))
            ->view('email.sample_email')
            ->with($this->requestData);
    }
}
