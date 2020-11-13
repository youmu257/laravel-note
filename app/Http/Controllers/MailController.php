<?php

namespace App\Http\Controllers;

use App\Services\Mail\MailService;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * @var MailService
     */
    private $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    /**
     * Send mail sample.
     */
    public function sendSampleMail()
    {
        try {
            $result = $this->mailService->sendSampleMail();

            return $this->format($result);
        } catch (Exception $e) {
            Log::error(__METHOD__.': '.$e->getMessage());
            return $this->exceptionResponse($e);
        }
    }
}
