<?php

namespace App\Phone;

interface PhoneInterface
{
    public function sendSms($to, $from, $message);

    public function getMessage($messageId);
}
