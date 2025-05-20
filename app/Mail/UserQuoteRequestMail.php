<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserQuoteRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $quoteRequest;
    public $filePath;

    public function __construct($quoteRequest, $filePath = null)
    {
        $this->quoteRequest = $quoteRequest;
        $this->filePath = $filePath;
    }

    public function build()
    {
        $email = $this->view('email.user-quote-request')
                    ->subject('Thank you for your quote request')
                    ->with(['quoteRequest' => $this->quoteRequest]);
        
        if ($this->filePath) {
            $email->attach(storage_path('app/public/' . $this->filePath));
        }

        return $email;
    }
}

