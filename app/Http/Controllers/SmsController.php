<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Phone\PhoneInterface;
use App\Notifications\WingsEaten;

class SmsController extends Controller
{
    public function __construct(PhoneInterface $phone)
    {
        $this->phone = $phone;
    }

    public function sendSms(Request $request)
    {
        $messageId = $this->phone->sendSms(
            $request->input('to'),
            $request->input('from'),
            $request->input('text_message')
        );

        return response()->json(['message_id' => $messageId]);
    }

    public function notifySms()
    {
        $user = User::first();

        $user->notify(new WingsEaten(config('services.twilio.from')));

        return response()->json([], 200);
    }
}
