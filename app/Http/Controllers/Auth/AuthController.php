<?php

namespace App\Http\Controllers\Auth;

use Toastr;
use Hash;
use Session;
use App\User;
use App\Traits\SMSAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use SMSAPI;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $password = $request->password;
        $user = User::where('EMAIL',$request->email)->first();
        if($user){

            if (!Hash::check($password, $user->PASSWORD)) {
                Toastr::error('Your password is not correct', "Success", ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }

            if($user->IS_VERIFIED == 1){
                Auth::login($user, true);
                Toastr::success('Login successful', "Success", ["positionClass" => "toast-top-right"]);
                if(isset($request->referrer) && $request->referrer == 'post_your_add'){
                    if($user->USER_TYPE != 1 ){
                        return redirect()->route('listings.create');
                    }else{
                        return redirect()->route('my-account');
                    }
                }
                return redirect()->route('my-account');
            }else{
                $otp = rand(1000, 9999);
                $messageData = [
                    'message'   => 'Thank you for being with bdflats.com. Activation Code',
                    'otp'       => $otp
                ];
                $text  = 'Thank you for being with bdflats.com. Activation Code: '.$otp;
                $phone = $user->MOBILE_NO;
                $email = $user->EMAIL;
                $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
                $otp_phone = $user->COUNTRY_CODE == 'bd' ? $user->MOBILE_NO : $user->EMAIL;

                $check_otp = DB::table('OTP_VARIFICATION')
                ->whereDate('OTP_DATE', '=', date('Y-m-d'))
                ->where('MOBILE',$otp_phone)
                ->first();

                if($check_otp){
                    if($check_otp->OTP_COUNT > 5){
                        $res['success'] = false;
                        $res['message'] = 'Please try another day or contact with admin';
                    }else{
                        $otp_count = $check_otp->OTP_COUNT+1;
                        DB::table('OTP_VARIFICATION')->whereDate('OTP_DATE', '=', date('Y-m-d'))
                        ->where('MOBILE',$otp_phone)
                        ->update([ 'OTP' => $otp,'EXPIRE_TIME' => $expire_time, 'CREATED_AT' => now(), 'OTP_COUNT' =>$otp_count, 'STATUS' => 0]);

                        if($user->COUNTRY_CODE =='bd'){
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
                        'USER_ID'       => $user->PK_NO,
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

                    if($user->COUNTRY_CODE =='bd'){
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

                return redirect()->route('register',['mode'=>'verify','mobile'=>$user->MOBILE_NO,'code'=>$user->COUNTRY_CODE,'email'=>$user->EMAIL]);

            }
        }else{
            Toastr::success('You are not register user', "Success", ["positionClass" => "toast-top-right"]);
            return redirect()->route('register');
        }

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|EMAIL|unique:WEB_USER,EMAIL',
            'password' => 'required|min:6',
            'usertype' => 'required',
            'mobile' => 'required|max:15|unique:WEB_USER,MOBILE_NO',
            'contact_name' => 'nullable|max:50',
            'designation' => 'nullable|max:50',
            'office_address' => 'nullable|max:255',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(),422);

        } else {
            $User = new User;
            $User->NAME             = $request->name;
            $User->EMAIL            = $request->email;
            $User->COUNTRY_CODE     = $request->countryCode ?? 'bd';
            $User->MOBILE_NO        = $request->mobile;
            $User->CONTACT_PER_NAME = $request->contact_name;
            $User->DESIGNATION      = $request->designation;
            $User->ADDRESS          = $request->office_address;
            $User->IS_VERIFIED      = 0;
            $User->USER_TYPE        = $request->usertype;
            $User->PASSWORD         = bcrypt($request->password);
            $User->save();
            $otp = rand(1000, 9999);
            $messageData = [
                'message'   => 'Thank you for being with bdflats.com. Activation Code',
                'otp'       => $otp
            ];
            $text  = 'Thank you for being with bdflats.com. Activation Code: '.$otp;
            $phone = $request->mobile;
            $email = $request->email;
            $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
            $otp_phone = $request->countryCode == 'bd' ? $request->mobile : $request->email;
            DB::table('OTP_VARIFICATION')->insert([
                'MOBILE'        => $otp_phone,
                'USER_ID'       => $User->PK_NO,
                'OTP_DATE'      => date('Y-m-d'),
                'OTP'           => $otp,
                'STATUS'        => 0,
                'EXPIRE_TIME'   => $expire_time,
                'CREATED_AT'    => now(),
                'CREATED_BY'    => 1,
                'OTP_COUNT'     => 1,
                'UPDATED_AT'    => null,
                'UPDATED_BY'    => null
            ]);

            $otp = rand(1000, 9999);
            $messageData = [
                'message'   => 'Thank you for being with bdflats.com. Activation Code',
                'otp'       => $otp];

            $text  = 'Thank you for being with bdflats.com. Activation Code: '.$otp;
            $phone = $request->mobile;
            $email = $request->email;
            $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
            $otp_phone = $request->countryCode == 'bd' ? $request->mobile : $request->email;

            if($request->countryCode == 'bd'){
                //sms
                $this->sendSmsMetrotel($text,$phone);

            }else{
                //mail
                Mail::send('email.otp_email',$messageData, function($message) use($email)
                {
                    $message->to($email)->subject('Login Otp Code.');
                });

            }

            return response()->json([
                "status"=>'success',
                "msg"=>"You have successfully registered, But you should self verify your account",
                "data" => $User,
            ]);

        }
    }

    public function postOtpVerify(Request $request){

        $validator = Validator::make($request->all(), [
            'country_code' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'otp_num' => 'required|max:4|min:4',
        ]);

        $otp = rand(1000, 9999);
        $messageData = [
            'message'   => 'Thank you for being with bdflats.com. Activation Code',
            'otp'       => $otp];

        $text  = 'Thank you for being with bdflats.com. Activation Code: '.$otp;
        $mobile = $request->mobile;
        $email = $request->email;
        $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
        $user = User::where('MOBILE_NO',$mobile)->where('EMAIL',$email)->first();
        $otp_phone = $user->COUNTRY_CODE == 'bd' ? $request->mobile : $request->email;

        if($request->submit == 'otp_again'){
            $check_otp = DB::table('OTP_VARIFICATION')
            ->whereDate('OTP_DATE', '=', date('Y-m-d'))
            ->where('MOBILE',$otp_phone)
            ->first();


            if($check_otp){
                if($check_otp->OTP_COUNT > 5){
                    $res['success'] = false;
                    $res['message'] = 'Please try another day or contact with admin';
                }else{
                    $otp_count = $check_otp->OTP_COUNT+1;
                    DB::table('OTP_VARIFICATION')->whereDate('OTP_DATE', '=', date('Y-m-d'))
                    ->where('MOBILE',$otp_phone)
                    ->update([ 'OTP' => $otp,'EXPIRE_TIME' => $expire_time, 'CREATED_AT' => now(), 'OTP_COUNT' =>$otp_count, 'STATUS' => 0]);

                    if($request->country_code =='bd'){
                        $this->sendSmsMetrotel($text,$mobile);
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
                    'MOBILE'        => $mobile,
                    'USER_ID'       => $user->PK_NO,
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

                if($request->country_code =='bd'){
                    $this->sendSmsMetrotel($text,$mobile);
                }else{
                    Mail::send('email.otp_email',$messageData, function($message) use($email)
                    {
                        $message->to($email)->subject('Login Otp Code.');
                    });
                }
                $res['success'] = true;
                $res['message'] = 'Otp sended successfully';
            }
            Toastr::success($res['message'], "Success", ["positionClass" => "toast-top-right"]);
            return redirect()->back();

        }else{
            //check and login success and redirect dashboard
            $check_otp = DB::table('OTP_VARIFICATION')
            ->whereDate('OTP_DATE', '=', date('Y-m-d'))
            ->where('MOBILE',$otp_phone)
            ->where('OTP',$request->otp_num)
            ->first();

            if($check_otp){
                $user = User::where('MOBILE_NO',$mobile)->where('EMAIL',$email)->first();
                if($user){
                    $is_mobile_verified = $is_email_verified = 0;
                    if($user->COUNTRY_CODE == 'bd'){
                        $is_mobile_verified = 1;
                    }else{
                        $is_email_verified = 1;
                    }

                    Auth::login($user, true);
                    DB::table('OTP_VARIFICATION')->where('MOBILE',$mobile)->where('STATUS',0)->update(['STATUS' => 1]);
                    User::where('MOBILE_NO',$mobile)->update(['IS_VERIFIED' => 1, 'IS_MOBILE_VERIFIED' => $is_mobile_verified, 'IS_EMAIL_VERIFIED' => $is_email_verified]);
                    Toastr::success('Your account verified successful', "Success", ["positionClass" => "toast-top-right"]);
                    return redirect()->route('my-account');
                }

            }else{
                Toastr::success('Your OTP is wrong or expired', "Success", ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }

        }

        return redirect()->back();

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
