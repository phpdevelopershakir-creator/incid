<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SmsController extends Controller
{
      public function sms_sent(Request $request)
    {
         

        $csms_id = Str::random(20);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post('https://smsplus.sslwireless.com/api/v3/send-sms', [
            'api_token' => '6cusnxqn-soioxop0-wiefuowl-dvooav8r-l6ekxosf',
            'sid' => 'DHUMKETUNONMASK',
            'msisdn' => '01740125203',
            'sms' =>'Welcome to Incidine Project  ',
            'csms_id' => $csms_id,
        ]);

        if ($response->successful()) {
            return response()->json([
                'success' => true,
                'message' => 'SMS sent successfully',
                'csms_id' => $csms_id,
                'response' => $response->json()
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to send SMS',
            'error' => $response->body()
        ], 500);
    }
    

}
