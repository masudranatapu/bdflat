<?php

namespace App\Http\Controllers\Seeker;

use Auth;
use Mail;
use App\User;
use App\Traits\SMSAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    use AuthenticatesUsers;
    use SMSAPI;

   // not working
    public function login(Request $request)
    {
        $request->validate(['phone' => 'required|unique:WEB_USER,MOBILE_NO']);
        $phone = $request->get('phone');

        $user = User::where('MOBILE_NO',$phone)->first();
        $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));

        if ($user) {
            $token = rand(1000, 9999);
            DB::table('OTP_VARIFICATION')
                   ->where('MOBILE_NO', $phone)
                   ->update(['OTP' => $token, 'EXPIRE_TIME' => $expire_time]);

        $response = true;
        $res = [];
        // $response = $this->sendSMS($phone, $otp);
        if ($response) {
            $res['success'] = true;
            $res['MOBILE_NO'] = $phone;

        } else {
            $res['success'] = false;
            $res['MOBILE_NO'] = $phone;
        }
        $res = json_encode($res);
        return redirect('/seeker_reg?response='.$res)->withSuccess(__('Check your mobile for OTP.'))->withDanger(__('Something wrong please try again.'));
        }

    }

    protected function attemptLogin(Request $request)
    {
    }

    public function username(): string
    {
        return 'MOBILE_NO';
    }


    public function verifyOTP(Request $request)
    {

        $request->validate([
            'otp' => 'required|min:4|max:4',
        ]);

        $otp = $request->get('otp');
        $MOBILE_NO = $request->get('MOBILE_NO');

        // $user_id = Session::getId();

        $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));

        $todate = date('Y-m-d');
        $now = date('Y-m-d H:i:s');

        $check = DB::table('OTP_VARIFICATION')
            ->where('OTP', $otp)
            ->first();

        if($check){
            if($check->EXPIRE_TIME < $now){
                return redirect()->back()->withDanger(__('This OTP is expired, Please send PIN Request again.'));
            }
            elseif($check->OTP == $otp){
                DB::table('OTP_VARIFICATION')
                   ->where('USER_ID', $check->USER_ID)
                   ->update(['status' => 1]);

              $user = User::where('MOBILE_NO',$MOBILE_NO)->first();


            //   dd($user);
              if($user){
                Auth::login($user);
                Session::start();
                // auth()->login($user);
                return redirect()->back()->withSuccess(__('OTP verification successful.'));
                // return redirect()->route('property-requirements')->withSuccess(__('OTP verification successful.'));
              }

               // return redirect('/login?as=seeker')->withSuccess(__('OTP verification successful.'));

           }else {
               return redirect()->back()->withDanger(__('This OTP is invalid.'));

            }

        }else{
            return redirect()->back()->withDanger(__('Something wrong please try again.'));

        }


    }

    public function loginWithOtp(Request $request){
        Log::info($request);
        $mobile         = $request->mobile;
        $otp_num        = $request->otp_num;
        $name           = $request->name;
        $email          = $request->email;
        $countryCode    = $request->countryCode;
        $c_time = date('Y-m-d H:i:s');

        $check = DB::table('OTP_VARIFICATION')
        ->where('MOBILE',$mobile)
        ->where('OTP',$otp_num)
        ->where('STATUS',0)
        ->where('EXPIRE_TIME', '>',$c_time)
        ->first();
        if($check){
            $user = User::where('MOBILE_NO',$mobile)->first();
            if($user){

                Auth::login($user, true);
                DB::table('OTP_VARIFICATION')->where('MOBILE',$mobile)->where('STATUS',0)->update(['STATUS' => 1]);
                User::where('MOBILE_NO',$mobile)->update(['IS_VERIFIED' => 1, 'IS_MOBILE_VERIFIED' => 1]);
                $res['status'] = true;
                $res['message'] = 'Welcome to BDflats.com';
            }
        }else{
            $res['status'] = false;
            $res['message'] = 'Please try again';
        }
        return response()->json($res);

    }



    public function seeker_reg_ajax(Request $request){
        $data = $request->validate([
            'mobile'    => 'required',
            'name'      => 'required|string|min:1|max:30',
        ]);
        $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
        $name   = $request->get('name');
        $phone  = $request->get('mobile');
        $user   = User::where('MOBILE_NO',$phone)->first();
        $otp    = rand(1000, 9999);
        $res['success'] = false;
        $res['message'] = 'Something wrong';
        $res['phone'] = $phone;
        $res['name'] = $name;
        $res['email'] = $request->email;
        $res['countryCode'] = $request->countryCode;
        $messageData = [
            'message'   => 'Thank you for being with bdflats.com. Activation Code',
            'otp'       => $otp

        ];
        $text = 'Thank you for being with bdflats.com. Activation Code: '.$otp;
        if(empty($user)){
            $user = new User();
            $user->USER_TYPE    = 1;
            $user->NAME         = $request->name;
            $user->EMAIL        = $request->email;
            $user->MOBILE_NO    = $phone;
            $user->PASSWORD     = Hash::make($phone);
            $user->save();
        }

        $email      = $request->email;
        $user_id    = $user->PK_NO;
        $check_otp = DB::table('OTP_VARIFICATION')
        ->whereDate('OTP_DATE', '=', date('Y-m-d'))
        ->where('MOBILE',$phone)
        ->first();

        if($check_otp){
            if($check_otp->OTP_COUNT > 5){
                $res['success'] = false;
                $res['message'] = 'Please try another day or contact with admin';
            }else{
                $otp_count = $check_otp->OTP_COUNT+1;
                DB::table('OTP_VARIFICATION')->whereDate('OTP_DATE', '=', date('Y-m-d'))
                ->where('MOBILE',$phone)
                ->update([ 'OTP' => $otp,'EXPIRE_TIME' => $expire_time, 'CREATED_AT' => now(), 'OTP_COUNT' =>$otp_count, 'STATUS' => 0]);

                if($request->countryCode =='bd'){
                    $this->sendSmsMetrotel($text,$phone);
                }else{
                    Mail::send('email.otp_email',$messageData, function($message) use($email)
                    {
                        $message->to($email)->subject('Login Otp Code.');
                    });
                }
                $res['success'] = true;
                $res['message'] = 'Otp sended successfully';
            }
        }else{
            DB::table('OTP_VARIFICATION')->insert([
                'MOBILE'        => $phone,
                'USER_ID'       => $user_id,
                'OTP_DATE'      => date('Y-m-d'),
                'OTP'           => $otp,
                'STATUS'        => 0,
                'EXPIRE_TIME'   => $expire_time,
                'CREATED_AT'    => now(),
                'CREATED_BY'    => 1,
                'OTP_COUNT'     => 1,
                'UPDATED_AT'    => null,
                'UPDATED_BY'    => null,
            ]);

            if($request->countryCode =='bd'){
                $this->sendSmsMetrotel($text,$phone);
            }else{
                Mail::send('email.otp_email',$messageData, function($message) use($email)
                {
                    $message->to($email)->subject('Login Otp Code.');
                });
            }
            $res['success'] = true;
            $res['message'] = 'Otp sended successfully';
        }

        return response()->json($res);
    }



    public function get_user_phone(Request $request){
        $user = User::where('MOBILE_NO',$request->phone_number)->first();
        if(!empty($user->MOBILE_NO)){
            $user_phone = $user->MOBILE_NO;
            $user_name = $user->NAME;
            $user_email = $user->EMAIL;
        }else{
            $user_phone = $user_name = $user_email = null;
        }
        return response()->json([
            'user_phone'=>$user_phone,
            'user_name'=>$user_name,
            'user_email'=>$user_email
        ]);
    }



}
