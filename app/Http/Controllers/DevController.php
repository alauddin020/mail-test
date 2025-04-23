<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class DevController extends Controller
{
    public function mailTest(Request $request)
    {
        try {
            $email = $request->email?? 'alal@inflack.com';
            Notification::route('mail', $email)
                ->notify(new \App\Notifications\MailNotification());
            return response()->json([
                'status' => true,
                'message' => 'Mail sent successfully'
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
