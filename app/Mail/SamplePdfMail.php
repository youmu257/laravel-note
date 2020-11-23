<?php

namespace App\Mail;

use Config;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class SamplePdfMail extends Mailable
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
        $pdf = PDF::loadView('email.sample_pdf', $this->requestData);
    
        return $this->subject(trans('messages.SAMPLE_PDF_MAIL_SUBJECT'))
            ->view('email.sample_pdf_email')
            ->attachData($pdf->output(), 'pdf-sample.pdf')
            ->with($this->requestData);
    }
}
