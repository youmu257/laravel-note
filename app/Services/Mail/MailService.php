<?php
namespace App\Services\Mail;

use App\Mail\SampleMail;
use App\Services\Service;
use Mail;

class MailService extends Service
{
    /**
     * Send mail sample
     * 
     * @return array
     */
    public function sendSampleMail(): array
    {
        try {
            $smapleData = [
                'text1' => 'This is a sample text.',
            ];
            $receiverMail = 'youmu257@gmail.com';

            $sampleMail = new SampleMail($smapleData);
            Mail::to($receiverMail)
                ->send($sampleMail);

            return $this->getSuccessResult();
        } catch (Exception $e) {
            Log::error(__METHOD__.': '.$e->getMessage());
            return $this->getFailResult($e->getMessage());
        }
    }
}