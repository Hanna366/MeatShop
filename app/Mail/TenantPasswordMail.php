<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class TenantPasswordMail extends Mailable
{
    use Queueable;

    public $userName;
    public $password;
    public $businessName;

    public function __construct($userName, $password, $businessName)
    {
        $this->userName = $userName;
        $this->password = $password;
        $this->businessName = $businessName;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Welcome to MeatShop POS - Your Account Details',
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.tenant-password',
            with: [
                'userName' => $this->userName,
                'password' => $this->password,
                'businessName' => $this->businessName,
            ],
        );
    }
}
