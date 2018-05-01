<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone\PhoneInterface;

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
}
