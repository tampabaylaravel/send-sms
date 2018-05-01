<?php

namespace App\Channels;

use App\Phone\PhoneInterface;
use Illuminate\Notifications\Notification;

class TwilioChannel
{
    protected $phone;

    public function __construct(PhoneInterface $phone)
    {
        $this->phone = $phone;
    }

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toTwilioSms($notifiable);

        return $this->phone->sendSms($message->to, $message->from, $message->message);
    }
}
