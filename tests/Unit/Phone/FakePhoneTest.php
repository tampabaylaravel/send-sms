<?php

namespace Tests\Unit\Phone;

use Tests\TestCase;
use App\Phone\FakePhone;

class FakePhoneTest extends TestCase
{
    use PhoneContractTests;

    protected function setUp()
    {
        parent::setUp();

        $this->phone = new FakePhone;
        $this->message = 'This is a text message';
        $this->messageToAssert = $this->message;
        $this->testTo = '+15551234567';
        $this->testFrom = '+15557654321';
    }
}
