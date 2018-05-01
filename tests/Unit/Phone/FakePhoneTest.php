<?php

namespace Tests\Unit\Phone;

use Tests\TestCase;
use App\Phone\FakePhone;

class FakePhoneTest extends TestCase
{

    /** @test */
    public function canSendSms()
    {
        $phone = new FakePhone;

        $messageId = $phone->sendSms('5551234567', '5557654321', 'This is a text message');

        $this->assertEquals('This is a text message', $phone->getMessage($messageId)->message);
    }
}
