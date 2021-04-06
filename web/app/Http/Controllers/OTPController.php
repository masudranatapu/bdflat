<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;

class OTPController extends Controller
{
   
    public function __construct()
    {
       $this->middleware('auth');
    }


    public function checkOTP($mobile,$number_sl)
    {
        $response = false ;
        $otp_code = rand ( 1000 , 9999 );

        if (strlen($mobile) != 11 ) { $response = false ; }        

        DB::beginTransaction();

        try {

            $username = "ronymia";
            $hash = "7ab63de834125a4428bf1d91c8eb3367"; 
            $numbers = $mobile; //Recipient Phone Number multiple number must be separated by comma
            $message = "Dalal Bazar ভেরিফিকেশন কোডটি হলো ".$otp_code.". এটি ৫ মিনিট পর্যন্ত কার্যকর থাকবে।";


            $params = array('app'=>'ws', 'u'=>$username, 'h'=>$hash, 'op'=>'pv', 'unicode'=>'1','to'=>$numbers, 'msg'=>$message);

            //$ch = curl_init();
            //curl_setopt($ch, CURLOPT_URL, "http://alphasms.biz/index.php?".http_build_query($params, "", "&"));
            //curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json", "Accept:application/json"));
            //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
           // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

            //$response = curl_exec($ch);
           // curl_close ($ch);
            

            if ($number_sl == 1) {
                User::where('id', Auth::user()->id)->update(['mobile1' => $mobile, 'mobile1_otp_code' => $otp_code, 'mobile1_is_verified' => 1]);
            }

            if ($number_sl == 2) {
                User::where('id', Auth::user()->id)->update(['mobile2' => $mobile, 'mobile2_otp_code' => $otp_code, 'mobile2_is_verified' => 1]);
            }

            $response = true ;

        } catch (\Exception $e) {
            DB::rollback();
            $response = false ;
        }

        DB::commit();
        
        return response()->json($response);
    }


    public function verifyOTP($otp,$number_sl)
    {
        $response = false ;
        $otp_code = rand ( 1000 , 9999 );

        if (strlen($otp) != 4 ) 
            { 
                $response = false ; 
                return response()->json($response); 
            }
        

        DB::beginTransaction();

        try {

            if ($number_sl == 1) {
                $user = User::where('id', Auth::user()->id)->where(['mobile1_otp_code' => $otp])->whereRaw('mobile1_otp_code_extime > NOW()')->first();
                if (!empty($user)) {
                    User::where('id', Auth::user()->id)->update(['mobile1_is_verified' => 1]);
                    $response = true ;
                }
            }

            if ($number_sl == 2) {
                $user = User::where('id', Auth::user()->id)->where(['mobile2_otp_code' => $otp])->whereRaw('mobile2_otp_code_extime > NOW()')->first();
                if (!empty($user)) {
                    User::where('id', Auth::user()->id)->update(['mobile2_is_verified' => 1]);
                    $response = true ;
                }
            }

           

        } catch (\Exception $e) {
            DB::rollback();
            $response = false ;
        }

        DB::commit();
        
        return response()->json($response);
    }
    

    
   


    public function getArea($location_id,$type)
    {
        $response = '<option value="">No data found</option>';

        if ($type == 'city') {
            $data = Area::where('city_pk_no',$location_id)->get();
        }elseif($type == 'division'){
            $data = Area::where('division_pk_no',$location_id)->get();
        }else{
            $data = null;
        }
        if ($data && count($data) > 0 ) {
            $response = '';
          foreach ($data as $key => $value) {
            $response .= '<option value="'.$value->pk_no.'">'.$value->name.'</option>';
          }
        }
           
         
         
        return response()->json($response);
    }



    


     
}











