<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;

class ImmediateResetPassword extends ResetPassword
{
    public string $url;

    protected function resetUrl($notifiable): string
    {
        return $this->url;
    }
}
