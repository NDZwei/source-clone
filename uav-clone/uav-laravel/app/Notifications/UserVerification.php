<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

class UserVerification extends VerifyEmail implements ShouldQueue
{
    use Queueable;
    public $user;

    public function __construct($user = '')
    {
        $this->user = $user ?: Auth::user();
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $actionUrl = $this->verificationUrl($notifiable);
        return (new MailMessage)
            ->subject('[NDZ] Email verification')
            ->view('email-verification',
                [
                    'user' => $this->user,
                    'actionUrl' => $actionUrl,
                ]
        );
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

}
