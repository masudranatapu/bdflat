<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $request->validate(['phone' => 'required']);

        $user = User::query()
            ->where('MOBILE_NO', '=', $request->get('phone'))
            ->first();

        if ($user) {
            $token = rand(1000, 99999);
            Session::put('phone_otp', $token);
            return response()->json([
                'status' => true,
                'code' => $token,
                'message' => 'OTP Sent to your phone number.'
            ]);
        }

        return response()->json([
            'status' => false,
            'code' => '',
            'message' => 'Wrong credential.'
        ]);
    }

    protected function attemptLogin(Request $request)
    {
    }

    public function username(): string
    {
        return 'MOBILE_NO';
    }
}
