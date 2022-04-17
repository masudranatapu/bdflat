<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Traits\SMSAPI;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{
    use AuthenticatesUsers;
    use SMSAPI;

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

    public function send_OTP(Request $request)
    {
        // $request->validate([
        //     'phone' => 'required|min:9|max:10',
        // ]);



        $otp = rand(1000, 9999);
        Session::put('otp', $otp);
        $phone = $request->get('phone');
        $user_id = "12345678";
        $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
        $todate = date('Y-m-d');
        $check_v = DB::table('OTP_VARIFICATION')->where('MOBILE_NO', $phone)->where('STATUS',1)->first();
        if($check_v){
            return response()->json([
                'success' => false,
                'otp_pin' => $otp,
                'verification' => 'verified',
                'msg' => 'This number already verified',
            ]);
        }

        $check = DB::table('OTP_VARIFICATION')->where('USER_ID', $user_id)->where('OTP_DATE', $todate)->get();

        //daily d times er besi send kora jabe na.
        if ($check && count($check) > 5) {
            return response()->json([
                'success' => false,
                'otp_pin' => $otp,
                'msg' => 'Please try next day',
            ]);
        } else {
            DB::table('OTP_VARIFICATION')->where('USER-ID', $user_id)->update(['STATUS' => 2]);
            DB::table('OTP_VARIFICATION')->insert([
                'MOBILE_NO' => $phone,
                'USER_ID' => $user_id,
                'OTP_DATE' => date('Y-m-d'),
                'OTP' => $otp,
                'STATUS' => 0,
                'EXPIRE_TIME' => $expire_time,
                'CREATED_AT' => now(),
                'CREATED_BY' => 1,
                'UPDATED_AT' => null,
                'UPDATED_BY' => null,
            ]);

            $response = true;
            // $response = $this->sendSMS($phone, $otp);
            if ($response) {
                return response()->json([
                    'success' => true,
                    'otp_pin' => $otp,
                    'msg' => 'Check your mobile for OTP',
                ]);

            } else {
                return response()->json([
                    'success' => false,
                    'otp_pin' => $otp,
                    'msg' => 'OTP sending failed',
                ]);
            }

        }

    }

    public function verifyOTP(Request $request)
    {

        $request->validate([
            'otp' => 'required|min:4|max:4',
        ]);

        $otp = $request->get('otp');
        dd($otp);
        exit;

        // $user_id = Session::getId();
        $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
        $todate = date('Y-m-d');
        $now = date('Y-m-d H:i:s');

        $check = DB::table('web_user')
            ->where('OTP', $otp)
            ->first();
            // echo $check->expire_time;
            // echo '<br>';
            // echo $now;
            // die();

        if($check){
            if($check->expire_time < $now){
                return response()->json([
                    'success'   => false,
                    'msg'       => 'This OTP is expired',
                ]);
            }elseif($check->OTP == $otp){


                // DB::table('OTP_VARIFICATION')
                //    ->where('id', $check->id)
                //    ->update(['status' => 1]);

               return response()->json([
                   'success'   => true,
                   'msg'       => 'OTP verification successful',
               ]);

           }else {
               return response()->json([
                   'success'   => false,
                   'msg'       => 'This OTP is invalid',
               ]);
            }

        }else{
            return response()->json([
                'success' => false,
                'msg' => 'Something wrong please try again',
            ]);
        }

        // if (Session::get('otp') && Session::get('otp') == $request->get('otp')) {
        //     Session::put('otp_verified', true);
        //     return response()->json([
        //         'success' => true
        //     ]);
        // }
        // return response()->json([
        //     'success' => false
        // ]);
        return redirect('/login?as=seeker');
    }

    public function loginWithOtp(Request $request){
        Log::info($request);
        $user  = User::where([['MOBILE_NO','=',request('mobile')],['OTP','=',request('otp')]])->first();
        if( $user){
            Auth::login($user, true);
            User::where('MOBILE_NO','=',$request->mobile)->update(['OTP' => null]);
            // return view('home');
        }
        else{
            return Redirect::back ();
        }
    }
    public function sendOtp(Request $request){

        $otp = rand(1000,9999);
        // Log::info("otp = ".$otp);
        Session::put('otp', $otp);
        $user = User::where('MOBILE_NO','=',$request->mobile)->update(['OTP' => $otp]);
        // send otp to mobile no using sms api
        return response()->json([$user],200);
    }
    public function seeker_register_submit(Request $request)
    {
        $data = $request->validate([
            'mobile' => 'required|unique:WEB_USER,MOBILE_NO',
            'email' => 'nullable|unique:WEB_USER,EMAIL',

        ]);
        $user = new User();
        $user->USER_TYPE    = 1;
        $user->NAME         = $request->get('name');
        $user->EMAIL        = $request->get('email');
        $user->MOBILE_NO    = $request->get('mobile');
        $user->PASSWORD     = Hash::make($request->get('password'));

        // $user->OTP = $otp;
        $user->save();

        // return redirect('/login?as=seeker');
        // $user_id = session::getID();
        $user_id = Session::getId();
        $otp = rand(1000, 99999);
        DB::table('OTP_VARIFICATION')->insert([
            'MOBILE_NO' => $phone,
            'USER_ID' => $user_id,
            'OTP_DATE' => date('Y-m-d'),
            'OTP' => $otp,
            'STATUS' => 0,
            'EXPIRE_TIME' => $expire_time,
            'CREATED_AT' => now(),
            'CREATED_BY' => 1,
            'UPDATED_AT' => null,
            'UPDATED_BY' => null,
        ]);


        $mobile = $request->get('mobile');;
        if ($mobile) {
            Session::put('phone_otp', $otp);

            return response()->json([
                'status' => true,
                'code' => $otp,
                'message' => 'OTP Sent to your phone number.'
            ]);
        }
        else {
          return response()->json([
              'status' => false,
              'code' => '',
              'message' => 'Wrong credential.'
          ]);
        }
    }
}
