<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait SMSAPI
{
    protected function sendSMS($to, $message)
    {
        $message = str_replace(" ", "+", $message);
        $message = 'RM0 AWSBIZ : OTP  ' . $message;
        $apiUrl = "http://web.bulksms2u.com/websmsapi/ISendSMS.aspx";
        $query = [
            "username"  => "sms_asia",
            "password"  => "sms_asiapassword",
            "message"   => $message,
            "mobile"    => '+60' . $to,
            "sender"    => "pdtv",
            "type"      => 1
        ];

        $apiUrl .= '?' . http_build_query($query);

        $response = Http::get($apiUrl);
        $code = $response->body();
        $code = explode(":", $code)[0];
        if (!$response->serverError() && $code != "1701") {
            return false;
        }

        return true;
    }


    protected function sendSMS1($to, $message)
    {
        // $message = str_replace(" ", "+", $message);
        $message = 'RM0 AWSBIZ ' . $message;
        $apiUrl = "http://web.bulksms2u.com/websmsapi/ISendSMS.aspx";
        $query = [
            "username"  => "sms_asia",
            "password"  => "sms_asiapassword",
            "message"   => $message,
            "mobile"    => '+60' . $to,
            "sender"    => "pdtv",
            "type"      => 1
        ];

// dd($query);
        $apiUrl .= '?' . http_build_query($query);

        $response = Http::get($apiUrl);
        $code = $response->body();
        $code = explode(":", $code)[0];
        // dd($code);
        if (!$response->serverError() && $code != "1701") {
            return false;
        }

        return true;
    }
}
