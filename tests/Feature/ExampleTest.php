<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Phone\FakePhone;
use App\Phone\PhoneInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->phone = new FakePhone;
        $this->app->instance(PhoneInterface::class, $this->phone);
    }

    public function testTextRouteSendsSms()
    {
        $response = $this->post('send-sms', [
            'to' => config('services.twilio.test_to'),
            'from' => config('services.twilio.from'),
            'text_message' => 'Some text message',
        ]);

        $response->assertStatus(200);

        $messageId = $response->decodeResponseJson('message_id');
        $this->assertEquals('Some text message', $this->phone->getMessage($messageId)->message);
    }
}
