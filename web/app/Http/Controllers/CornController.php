<?php

namespace App\Http\Controllers;

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
        ->select('PRD_LISTINGS.PK_NO','PRD_LISTINGS.PROPERTY_FOR','PRD_LISTINGS.F_PROPERTY_TYPE_NO','PRD_LISTINGS.F_PROPERTY_CONDITION','PRD_LISTING_VARIANTS.PROPERTY_SIZE','PRD_LISTING_VARIANTS.BEDROOM','PRD_LISTING_VARIANTS.BATHROOM','PRD_LISTING_VARIANTS.TOTAL_PRICE','PRD_LISTINGS.F_AREA_NO','PRD_LISTINGS.MAX_SHARING_PERMISSION','PRD_LISTINGS.IS_VERIFIED','PRD_LISTINGS.F_CITY_NO')
        ->join('WEB_USER', 'WEB_USER.PK_NO','PRD_LISTINGS.F_USER_NO')
        ->join('PRD_LISTING_VARIANTS', 'PRD_LISTING_VARIANTS.F_LISTING_NO','PRD_LISTINGS.PK_NO')
        ->where('PRD_LISTINGS.STATUS',10)
        ->where('PRD_LISTINGS.PAYMENT_STATUS',1)
        ->where('WEB_USER.STATUS',1)
        ->orderBy('PRD_LISTINGS.MODIFIED_AT', 'DESC')
        ->limit(200)->get();


        if($lists && count($lists) > 0 ){
            foreach ($lists as $key => $list) {
                $limit = $list->MAX_SHARING_PERMISSION + 20;
                $seekers = DB::table('PRD_REQUIREMENTS')
                ->select('PRD_REQUIREMENTS.PK_NO','PRD_REQUIREMENTS.F_USER_NO','PRD_REQUIREMENTS.F_AREAS','PRD_REQUIREMENTS.F_PROPERTY_TYPE_NO','PRD_REQUIREMENTS.PROPERTY_FOR', 'PRD_REQUIREMENTS.MIN_SIZE','PRD_REQUIREMENTS.MAX_SIZE', 'PRD_REQUIREMENTS.MIN_BUDGET','PRD_REQUIREMENTS.MAX_BUDGET', 'PRD_REQUIREMENTS.BEDROOM','PRD_REQUIREMENTS.PROPERTY_CONDITION', 'PRD_REQUIREMENTS.F_CITY_NO', 'PRD_REQUIREMENTS.F_PROPERTY_CONDITION')
                ->where('PRD_REQUIREMENTS.IS_ACTIVE',1)
                ->where('PRD_REQUIREMENTS.IS_ACTIVE',1)
                // ->where('PRD_REQUIREMENTS.F_PROPERTY_TYPE_NO', $list->F_PROPERTY_TYPE_NO)
                // ->where('PRD_REQUIREMENTS.PROPERTY_FOR', $list->PROPERTY_FOR)
                ->where('PRD_REQUIREMENTS.F_CITY_NO', $list->F_CITY_NO)
                ->limit($limit)
                ->get();
                if($seekers && count($seekers) > 0 ){
                    foreach ($seekers as $key1 => $list1) {
                        $total_val = 40;
                        $req_max_size = $list1->MAX_SIZE + 50;
                        $req_min_size = $list1->MIN_BUDGET - 50;
                        $ares   = json_decode($list1->F_AREAS);
                        $conds  = json_decode($list1->F_PROPERTY_CONDITION);
                        if(in_array($list->F_AREA_NO, $ares) && in_array($list->F_AREA_NO, $conds)){
                            $insertData = array([
                                'F_LISTING_NO'  => $list->PK_NO,
                                'F_COMPANY_NO'  => $list->F_USER_NO,
                                'F_USER_NO'     => $list1->F_USER_NO,
                                'CREATED_AT'    => date('Y-m-d H::s'),
                                'CREATED_BY'    => $auth_id ,
                                'PROPERTY_FOR'  => 20 ,
                                'PROPERTY_TYPE' => 20,
                                'AREA'          => 20,
                                'PROPERTY_CONDITION' => 20
                             ]);

                             if($list->PROPERTY_SIZE < $req_max_size &&  $list->PROPERTY_SIZE > $req_min_size ){
                                $total_val += 10;
                                $insertData['SIZE'] = 10;
                             }

                            //  ['F_LISTING_NO' => $list->PK_NO, 'F_COMPANY_NO' => $list->F_USER_NO, 'F_USER_NO' => $list1->F_USER_NO, 'CREATED_AT' => date('Y-m-d H::s'), 'CREATED_BY' => $auth_id , 'PROPERTY_FOR' => 20 , 'PROPERTY_TYPE' => 20, 'AREA' => 20, 'SIZE' => , 'BEDROOM' => ,'BATHROOM' => ,'TOTAL_PRICE' => ,'PROPERTY_CONDITION' => 20 ,'TOTAL_VAL' => ]

                            // DB::table('PRD_SUGGESTED_PROPERTY_TEMP')->insert($insertData);

dd($list1);
                        }
                    }
                }

            }
        }

    }



}











