<?php

namespace App\Phone;

class FakePhone implements PhoneInterface
{
    protected $messages;

    public function __construct()
    {
        $this->messages = collect();
    }

    public function sendSms($to, $from, $message)
    {
        $this->messages[] = (object) [
            'to' => $to,
            'from' => $from,
            'message' => $message,
        ];

        return $this->messages->keys()->last();
    }

    public function getMessage($messageId)
    {
        return $this->messages[$messageId];
    }
}
