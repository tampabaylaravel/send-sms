<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use App\Phone\FakePhone;
use App\Phone\PhoneInterface;
use App\Channels\TwilioChannel;
use App\Notifications\WingsEaten;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

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

    public function testNotifyRouteSendsSmsViaNotification()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create([
            'phone' => '+13173953583',
        ]);

        Notification::fake();

        $response = $this->get('notify-sms');

        Notification::assertSentTo($user, WingsEaten::class, function ($notification, $channels) {
            return in_array(TwilioChannel::class, $channels);
        });
    }
}
