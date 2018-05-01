<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Channels\TwilioChannel;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WingsEaten extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($from)
    {
        $this->from = $from;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TwilioChannel::class];
    }

    public function toTwilioSms($notifiable)
    {
        return (object) [
            'to' => $notifiable->phone,
            'from' => $this->from,
            'message' => 'You ate some wings!',
        ];
    }
}
