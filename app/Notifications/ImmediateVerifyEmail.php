<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;

class ImmediateVerifyEmail extends VerifyEmail
{
    public string $url;

    protected function verificationUrl($notifiable): string
    {
        return $this->url;
    }
}
