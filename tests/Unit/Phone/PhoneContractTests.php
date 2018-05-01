<?php

namespace Tests\Unit\Phone;

trait PhoneContractTests
{
    /** @test */
    public function canSendSms()
    {
        $messageId = $this->phone->sendSms($this->testTo, $this->testFrom, $this->message);

        $this->assertEquals($this->messageToAssert, $this->phone->getMessage($messageId)->message);
    }
}
