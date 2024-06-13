<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmailNotification extends Notification
{
    use Queueable;

    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = route('verify.email', ['token' => $this->token]);

        return (new MailMessage)
                    ->subject('Verifikasi Email')
                    ->line('Klik tombol di bawah untuk verifikasi email Anda.')
                    ->action('Verifikasi Email', $url)
                    ->line('Terima kasih!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
