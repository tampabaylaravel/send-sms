<?php

namespace Tests\Unit\Phone;

use Tests\TestCase;
use App\Phone\TwilioPhone;

class TwilioPhoneTest extends TestCase
{

    /** @test */
    public function canSendSms()
    {
        $phone = new TwilioPhone('ACe18a7b6751b6e576e2b1f31edcb2402b', '2817d2bbbdae7eb8ffb9a8e03a22cccb');

        $messageId = $phone->sendSms('+13173953583', '+13176220305', 'This is a text message');

        $this->assertEquals('Sent from your Twilio trial account - This is a text message', $phone->getMessage($messageId)->message);
    }
}
