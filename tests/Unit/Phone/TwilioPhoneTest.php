<?php

namespace Tests\Unit\Phone;

use Tests\TestCase;
use App\Phone\TwilioPhone;

class TwilioPhoneTest extends TestCase
{
    use PhoneContractTests;

    protected function setUp()
    {
        parent::setUp();

        $config = config('services.twilio');
        $this->config = $config;

        $this->phone = new TwilioPhone($config['account_sid'], $config['auth_token']);
        $this->message = 'This is a text message';
        $this->messageToAssert = 'Sent from your Twilio trial account - ' . $this->message;
        $this->testTo = $config['test_to'];
        $this->testFrom = $config['from'];
    }
}
