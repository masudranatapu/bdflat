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
use Mail;


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

    /*
    public function send_OTP(Request $request)
    {

        $phone = $request->post('user_phone');
        $otp = rand(1000, 9999);
        $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
        $todate = date('Y-m-d');
        $user = DB::table('web_user')->where('MOBILE_NO', $phone)->where('STATUS',1)->first();
        $user_check = DB::table('OTP_VARIFICATION')->where('MOBILE', $phone)->where('STATUS',1)->first();
        if($user_check){
          Auth::login($user);
          Session::start();
          return redirect()->route('property-requirements')->withSuccess(__('OTP verification successful.'));
        }

        $check = DB::table('OTP_VARIFICATION')->where('MOBILE', $phone)->where('OTP_DATE', $todate)->count('MOBILE');
        Session::put('otp_phone',$phone);
        // $this->sendSmsMetrotel('Thank you for being with bdflats.com. Activation Code: '.$otp,$phone);
        //daily d times er besi send kora jabe na. $check && count($check)
        if ($check > 5) {
            return redirect()->back()->withDanger(__('Today you has Block, Please try again nextday.'));
        }
         else {
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
    */

    /*
    public function seeking_resend_otp(Request $request)
    {

        $phone = $request->mobile;
        $otp = rand(1000, 9999);
        $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
        $todate = date('Y-m-d');
        $user = DB::table('WEB_USER')->where('MOBILE_NO', $phone)->where('STATUS',1)->first();
        $user_check = DB::table('OTP_VARIFICATION')->where('MOBILE', $phone)->where('STATUS',1)->first();
        // if($user_check){
        //   Auth::login($user);
        //   Session::start();
        //   return redirect()->route('property-requirements')->withSuccess(__('OTP verification successful.'));
        // }

        $check = DB::table('OTP_VARIFICATION')->where('MOBILE', $phone)->where('OTP_DATE', $todate)->count('MOBILE');
        Session::put('otp_phone',$phone);

        $email = $request->email;
        $messageData = [
            'message' => 'Thank you for being with bdflats.com. Activation Code',
            'otp' =>$otp

        ];
        if($request->countryCode =='bd'){
            $this->sendSmsMetrotel('Thank you for being with bdflats.com. Activation Code: '.$otp,$phone);
        }else{
            Mail::send('auth.email',$messageData, function($message) use($email)
            {
                $message->to($email)->subject('Login Otp Code.');
            });
        }
        //daily d times er besi send kora jabe na. $check && count($check)
        if ($check > 6) {
            return redirect()->back()->withDanger(__('Today you has Block, Please try again nextday.'));
        }
         else {

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
             return response()->json([
                'phone'=> $phone,
                'phone_count' => $check
            ]);

        }

    }
    */

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
                $res['status'] = true;
                $res['message'] = 'Welcome to BDflats.com';
            }
        }else{
            $res['status'] = false;
            $res['message'] = 'Please try again';
        }
        return response()->json($res);

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
    /*
    public function seeker_register_submit(Request $request)
    {
        $data = $request->validate([
            'mobile' => 'required',
            // 'name' => 'nullable|string|min:2|max:30',
        ]);

        $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
        $name = $request->get('mobile');
        $phone = $request->get('mobile');
        $user = User::where('MOBILE_NO',$phone)->first();
        Session::put('otp_phone',$phone);
        $otp = rand(1000, 9999);
        if(empty($user)){
            $user = new User();
            $user->USER_TYPE    = 1;
            // $user->NAME         = $phone;
            $user->NAME         = $name;
            // $user->EMAIL        = $request->get('email');
            $user->EMAIL        = $phone;
            $user->MOBILE_NO    = $phone;
            $user->PASSWORD     = Hash::make($phone);
            // $user->save();
        }


        // $this->sendSmsMetrotel('Thank you for being with bdflats.com. Activation Code: '.$otp,$phone);

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
    */


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
                    Mail::send('auth.email',$messageData, function($message) use($email)
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
                Mail::send('auth.email',$messageData, function($message) use($email)
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
    /*
    public function check_otp_before_submit(Request $request){
        $user_verify = DB::table('OTP_VARIFICATION')->where('OTP',$request->otp_num)->where('MOBILE',$request->user_phone)->orderBy('PK_NO','desc')->first();
        return response()->json([
            'user_verify'=>$user_verify
        ]);
    }
    */

    function sendSmsMetrotel($body, $mobile ){
        $url = "http://portal.metrotel.com.bd/smsapi";
        $data = [
          "api_key" => "R20000315d809876d27604.84144217",
          "type" => "text",
          "contacts" => $mobile,
          "senderid" => "8809612440143",
          "msg" => $body,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
