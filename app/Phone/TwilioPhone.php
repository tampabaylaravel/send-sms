<?php

namespace App\Phone;

use Twilio\Rest\Client;

class TwilioPhone implements PhoneInterface
{
    protected $client;

    public function __construct($sid, $authToken)
    {
        $this->client = new Client($sid, $authToken);
    }

    public function sendSms($to, $from, $message)
    {
        $message = $this->client->messages->create($to, [
            'from' => $from,
            'body' => $message,
        ]);

        return $message->sid;
    }

    public function getMessage($messageId)
    {
        $message = $this->client->messages($messageId)->fetch();

        return (object) [
            'to' => $message->to,
            'from' => $message->from,
            'message' => $message->body,
        ];
    }
}
