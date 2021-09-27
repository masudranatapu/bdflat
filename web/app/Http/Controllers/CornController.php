<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;

class CornController extends Controller
{


    public function __construct()
    {

    }

    public function makeSuggProperty()
    {

        $auth_id = Auth::id();
        $lists = DB::table('PRD_LISTINGS')
        ->select('PRD_LISTINGS.PK_NO','PRD_LISTINGS.PROPERTY_FOR','PRD_LISTINGS.F_PROPERTY_TYPE_NO','PRD_LISTINGS.F_PROPERTY_CONDITION','PRD_LISTING_VARIANTS.PROPERTY_SIZE','PRD_LISTING_VARIANTS.BEDROOM','PRD_LISTING_VARIANTS.BATHROOM','PRD_LISTING_VARIANTS.TOTAL_PRICE','PRD_LISTINGS.F_AREA_NO','PRD_LISTINGS.MAX_SHARING_PERMISSION','PRD_LISTINGS.IS_VERIFIED','PRD_LISTINGS.F_CITY_NO', 'PRD_LISTINGS.F_USER_NO')
        ->join('WEB_USER', 'WEB_USER.PK_NO','PRD_LISTINGS.F_USER_NO')
        ->join('PRD_LISTING_VARIANTS', 'PRD_LISTING_VARIANTS.F_LISTING_NO','PRD_LISTINGS.PK_NO')
        ->where('PRD_LISTINGS.STATUS',10)
        ->where('PRD_LISTINGS.PAYMENT_STATUS',1)
        ->where('WEB_USER.STATUS',1)
        ->orderBy('PRD_LISTINGS.PK_NO', 'ASC')
        // ->orderBy('PRD_LISTINGS.MODIFIED_AT', 'DESC')
        ->limit(2000)
        ->get();



        if($lists && count($lists) > 0 ){
            foreach ($lists as $key => $list) {
                $i = 0;
                $limit = $list->MAX_SHARING_PERMISSION + 20;
                $seekers = DB::table('PRD_REQUIREMENTS')
                ->select('PRD_REQUIREMENTS.PK_NO','PRD_REQUIREMENTS.F_USER_NO','PRD_REQUIREMENTS.F_AREAS','PRD_REQUIREMENTS.F_PROPERTY_TYPE_NO','PRD_REQUIREMENTS.PROPERTY_FOR', 'PRD_REQUIREMENTS.MIN_SIZE','PRD_REQUIREMENTS.MAX_SIZE', 'PRD_REQUIREMENTS.MIN_BUDGET','PRD_REQUIREMENTS.MAX_BUDGET', 'PRD_REQUIREMENTS.BEDROOM','PRD_REQUIREMENTS.PROPERTY_CONDITION', 'PRD_REQUIREMENTS.F_CITY_NO', 'PRD_REQUIREMENTS.F_PROPERTY_CONDITION')
                ->where('PRD_REQUIREMENTS.IS_ACTIVE',1)
                ->where('PRD_REQUIREMENTS.IS_VERIFIED',1)
                ->where('PRD_REQUIREMENTS.F_PROPERTY_TYPE_NO', $list->F_PROPERTY_TYPE_NO)
                ->where('PRD_REQUIREMENTS.PROPERTY_FOR', $list->PROPERTY_FOR)
                ->where('PRD_REQUIREMENTS.F_CITY_NO', $list->F_CITY_NO)
                ->orderBy('PRD_REQUIREMENTS.MODIFIED_AT', 'DESC')
                ->limit($limit)
                ->get();



                if($seekers && count($seekers) > 0 ){
                    foreach ($seekers as $key1 => $list1) {

                        $total_val = 80;
                        $req_max_size   = $list1->MAX_SIZE + 50;
                        $req_min_size   = $list1->MIN_SIZE - 50;
                        $req_max_budget = $list1->MAX_BUDGET - 100;
                        $req_min_budget = $list1->MIN_BUDGET - 100;
                        $bedroom = json_decode($list1->BEDROOM);
                        $ares    = json_decode($list1->F_AREAS);
                        $conds   = json_decode($list1->F_PROPERTY_CONDITION);

                        if(in_array($list->F_AREA_NO, $ares) && in_array($list->F_PROPERTY_CONDITION, $conds)){

                            $insertData = [
                                'F_LISTING_NO'  => $list->PK_NO,
                                'F_COMPANY_NO'  => $list->F_USER_NO,
                                'F_USER_NO'     => $list1->F_USER_NO,
                                'CREATED_AT'    => date('Y-m-d H::s'),
                                'CREATED_BY'    => $auth_id ,
                                'PROPERTY_FOR'  => 20 ,
                                'PROPERTY_TYPE' => 20,
                                'AREA'          => 20,
                                'PROPERTY_CONDITION' => 20
                             ];

                            if($list->PROPERTY_SIZE < $req_max_size &&  $list->PROPERTY_SIZE > $req_min_size ){
                                $total_val += 10;
                                $insertData['SIZE'] = 10;
                            }

                            if($list->TOTAL_PRICE < $req_max_budget &&  $list->TOTAL_PRICE > $req_min_budget ){
                                $total_val += 10;
                                $insertData['TOTAL_PRICE'] = 10;
                            }

                            if($bedroom && $bedroom['0'] == 'any'){
                                $total_val += 10;
                                $insertData['BEDROOM'] = 10;
                            }elseif(in_array($list->BEDROOM, $bedroom)){
                                $total_val += 10;
                                $insertData['BEDROOM'] = 10;
                            }

                            $insertData['TOTAL_VAL'] = $total_val;
                            DB::table('PRD_SUGGESTED_PROPERTY_TEMP')->insert($insertData);
                            $i++;

                        }

                       if($list->MAX_SHARING_PERMISSION < $i ){break;}
                    }
                }

            }
        }


        $temp = DB::table('PRD_SUGGESTED_PROPERTY_TEMP')->orderBy('TOTAL_VAL', 'DESC')->get();
        if($temp){
            foreach ($temp as $key2 => $value2) {
                $check =  DB::table('PRD_SUGGESTED_PROPERTY')->where('F_LISTING_NO',$value2->F_LISTING_NO)->where('F_USER_NO',$value2->F_USER_NO)->first();
                if($check == null){
                    $order_id =  DB::table('PRD_SUGGESTED_PROPERTY')->where('F_LISTING_NO', $value2->F_LISTING_NO)->where('F_USER_NO',$value2->F_USER_NO)->max('ORDER_ID');

                    $listing =  DB::table('PRD_LISTINGS as a')->select('a.PROPERTY_FOR','a.PROPERTY_TYPE','a.F_AREA_NO','b.PROPERTY_SIZE','b.BEDROOM','b.BATHROOM','b.TOTAL_PRICE')->leftJoin('PRD_LISTING_VARIANTS as b', 'b.F_LISTING_NO', 'a.PK_NO')->where('a.PK_NO',$value2->F_LISTING_NO)->first();

                    DB::table('PRD_SUGGESTED_PROPERTY')->insert([
                    'F_LISTING_NO'  => $value2->F_LISTING_NO,
                    'F_COMPANY_NO'  => $value2->F_COMPANY_NO,
                    'F_USER_NO'     => $value2->F_USER_NO,
                    'CREATED_AT'    => date('Y-m-d H::s'),
                    'CREATED_BY'    => $auth_id ,
                    'PROPERTY_FOR'  => $listing->PROPERTY_FOR,
                    'PROPERTY_TYPE' => $listing->PROPERTY_TYPE,
                    'AREA'          => $listing->F_AREA_NO,
                    'SIZE'          => $listing->PROPERTY_SIZE,
                    'BEDROOM'       => $listing->BEDROOM,
                    'BATHROOM'      => $listing->BATHROOM,
                    'TOTAL_PRICE'   => $listing->TOTAL_PRICE,
                    'PROPERTY_CONDITION' => 20,
                    'ORDER_ID'      => $order_id+1,
                ]);
                }


            }
        }

        DB::table('PRD_SUGGESTED_PROPERTY_TEMP')->delete();

        dd($temp);

    }


    public function makeExpairedProperty(){

        $curr_date = date('Y-m-d');

        $data = DB::table('PRD_LISTINGS')->select('PK_NO','EXPAIRED_AT')
        ->whereIn('USER_TYPE', [2,3,4])
        ->where('EXPAIRED_AT','<', $curr_date)
        ->where('STATUS',10)
        ->where('PAYMENT_STATUS',1)
        ->get();
        if($data){
            foreach ($data as $key => $value) {
               DB::table('PRD_LISTINGS')->where('PK_NO', $value->PK_NO)->update(['STATUS' => 40, 'PAYMENT_STATUS' => 0]);
            }
        }
        dd($data);
    }



}











