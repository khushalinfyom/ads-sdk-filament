<?php

namespace App\Filament\Pages\Auth;

use App\Notifications\ImmediateVerifyEmail;
use Filament\Auth\Pages\EmailVerification\EmailVerificationPrompt;
use Filament\Facades\Filament;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use LogicException;

class CustomEmailVerificationPrompt extends EmailVerificationPrompt
{
    protected function sendEmailVerificationNotification(MustVerifyEmail $user): void
    {
        if ($user->hasVerifiedEmail()) {
            return;
        }

        if (! method_exists($user, 'notify')) {
            $userClass = $user::class;

            throw new LogicException("Model [{$userClass}] does not have a [notify()] method.");
        }

        $notification = app(ImmediateVerifyEmail::class);
        $notification->url = Filament::getVerifyEmailUrl($user);

        $user->notify($notification);
    }
}
