<?php

namespace App\Http\Controllers\Seeker;

use Auth;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Traits\SMSAPI;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;


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

    public function send_OTP(Request $request)
    {

        $phone = $request->post('user_phone');
        $otp = rand(1000, 9999);
        $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
        $todate = date('Y-m-d');
        $user = DB::table('web_user')->where('MOBILE_NO', $phone)->where('STATUS',1)->first();

        $user_check = DB::table('OTP_VARIFICATION')->where('MOBILE_NO', $phone)->where('STATUS',1)->first();

        if($user_check){
          Auth::login($user);
          Session::start();
          return redirect()->route('property-requirements')->withSuccess(__('OTP verification successful.'));
        }

        $check = DB::table('OTP_VARIFICATION')->where('MOBILE_NO', $phone)->where('OTP_DATE', $todate)->count('MOBILE_NO');
        //daily d times er besi send kora jabe na. $check && count($check)
        if ($check > 4) {
            return redirect()->back()->withDanger(__('Today you has Block, Please try again nextday.'));
        }
         else {
          $user_id = $user->PK_NO;
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
                $res['success'] = true;
                $res['MOBILE_NO'] = $phone;

            } else {
                $res['success'] = false;
                $res['MOBILE_NO'] = $phone;
            }
            $res = json_encode($res);
             // return response()->json(['success'=>'Check your mobile OTP send again.']);
            return redirect('/seeker_reg?response='.$res)->withSuccess(__('Check your mobile OTP send again.'));

        }

    }
//work controller
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

        $check = DB::table('otp_varification')
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
                return redirect()->route('property-requirements')->withSuccess(__('OTP verification successful.'));
              }

               // return redirect('/login?as=seeker')->withSuccess(__('OTP verification successful.'));

           }else {
               return redirect()->back()->withDanger(__('This OTP is invalid.'));

            }

        }else{
            return redirect()->back()->withDanger(__('Something wrong please try again.'));

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
        // return redirect('/login?as=seeker');
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

// not working
    // public function oldsendOtp(Request $request){
    //
    //     $otp = rand(1000,9999);
    //     // Log::info("otp = ".$otp);
    //     // Session::put('otp', $otp);
    //     $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
    //
    //     DB::table('OTP_VARIFICATION')->where('MOBILE_NO','=',$request->mobile)->update(['OTP' => $otp, 'EXPIRE_TIME' => $expire_time]);
    //
    //     $response = true;
    //     $res = [];
    //     // $response = $this->sendSMS($phone, $otp);
    //     if ($response) {
    //         $res['success'] = true;
    //         $res['MOBILE_NO'] = $phone;
    //
    //     } else {
    //         $res['success'] = false;
    //         $res['MOBILE_NO'] = $phone;
    //     }
    //     $res = json_encode($res);
    //     return redirect('/seeker_reg?response='.$res)->withSuccess(__('Check your mobile for OTP.'));
    //   }

    //work controller
    public function seeker_register_submit(Request $request)
    {
        $data = $request->validate([
            'mobile' => 'required|unique:WEB_USER,MOBILE_NO',
            // 'name' => 'nullable|string|min:2|max:30',
        ]);

        $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
        $name = $request->get('mobile');
        $phone = $request->get('mobile');
        $user = new User();
        $user->USER_TYPE    = 1;
        // $user->NAME         = $phone;
        $user->NAME         = $name;
        // $user->EMAIL        = $request->get('email');
        $user->EMAIL        = $phone;
        $user->MOBILE_NO    = $phone;
        $user->PASSWORD     = Hash::make($phone);
        $otp = rand(1000, 9999);
        $user->save();
        // $user->OTP = $otp;


        // $user_id = Session::getId();
        $user_id = $user->PK_NO;

        DB::table('OTP_VARIFICATION')->insert([
            'MOBILE' => $phone,
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
        return redirect('/seeker_reg?response='.$res)->withSuccess(__('Check your mobile for OTP.'));

        // return redirect('/seeker_reg?response='.$res);


    }
}
