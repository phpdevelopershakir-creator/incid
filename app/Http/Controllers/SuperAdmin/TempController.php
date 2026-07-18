<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TempController extends Controller
{
    public function TempSaveQuestion(Request $request)
    {
        $question_no = $request->input('question_no');

        if (!empty($question_no)) {
            // ডাইনামিক সেশন কি (যেমন: question5)
            $session_key = 'question' . $question_no;

            // ফ্রন্টএন্ড থেকে আসা পুরো অ্যারেটি সরাসরি নেওয়া হচ্ছে
            $raw_data = $request->input($session_key);

            // 🌟 কোনো json_encode ছাড়া সরাসরি অ্যারেটি সেশনে সেভ করুন
            $request->session()->put($session_key, $raw_data);

            // সেশন ডাটা ইনস্ট্যান্টলি রাইট করা
            $request->session()->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
}
