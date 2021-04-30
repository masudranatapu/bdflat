<?php

namespace App\Models;
use Carbon\Carbon;
use App\Models\Area;
use App\Models\City;
use App\Traits\RepoResponse;
use App\Models\PropertyCondition;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Listings extends Model
{
    use RepoResponse;

    protected $table        = 'PRD_LISTINGS';
    protected $primaryKey   = 'PK_NO';
    public $timestamps      = false;

    protected $fillable     = [
        'CODE',
        'PROPERTY_FOR',
        'F_PROPERTY_TYPE_NO',
        'PROPERTY_TYPE',
        'ADDRESS',
        'PROPERTY_CONDITION',
        'F_PROPERTY_CONDITION',
        'PROPERTY_SIZE',
        'BEDROOM',
        'BATHROOM',
        'TOTAL_PRICE',
        'PRICE_TYPE',
        'TITLE',
        'URL_SLUG',
        'F_CITY_NO',
        'CITY_NAME',
        'F_AREA_NO',
        'AREA_NAME',
        'F_USER_NO',
        'USER_TYPE',
        'IS_EXPAIRED',
        'EXPAIRED_AT',
        'CONTACT_PERSON1',
        'CONTACT_PERSON2',
        'MOBILE1',
        'MOBILE2',
        'F_LISTING_TYPE',
        'LISTING_TYPE',
        'F_PREP_TENANT_NO',
        'PREP_TENANT',
        'AVAILABLE_FROM',
        'GENDER',
        'IS_VERIFIED',
        'VERIFIED_BY',
        'VERIFIED_AT',
        'CREATED_AT',
        'CREATED_BY',
        'MODIFIED_AT',
        'MODIFYED_BY',
    ];


    public function store($request)
    {

        DB::beginTransaction();
        try {
            $city_name  = City::where('PK_NO',$request->city)->first()->CITY_NAME;
            $area_name  = Area::where('PK_NO',$request->area)->first()->AREA_NAME;
            //$p_condition_name  = PropertyCondition::where('PK_NO',$request->condition)->first()->PROD_CONDITION;

            $user = new Listings();
            $user->PROPERTY_FOR = $request->property_for;
            $user->PROPERTY_TYPE = $request->property_type;
            $user->F_CITY_NO = $request->city;
            $user->CITY_NAME = $city_name;
            $user->F_AREA_NO = $request->area;
            $user->AREA_NAME = $area_name;
            $user->ADDRESS = $request->address;
            $user->PROPERTY_CONDITION = $request->condition;
            //$user->PROPERTY_CONDITION = $p_condition_name;
    //        $user->PROPERTY_SIZE = $request->size;
    //        $user->BEDROOM = $request->bedroom;
    //        $user->BATHROOM = $request->bathroom;
    //        $user->TOTAL_PRICE = $request->price;
            $user->PRICE_TYPE = $request->property_price;
    //        $user-> = $request->floor;
            $user->MOBILE1 = $request->mobile;
           // $user->MOBILE2 = $request->mobileNum;
            $user->CREATED_AT = Carbon::now();
            $user->MODIFIED_AT = Carbon::now();
            $user->save();
            // dd($user);

        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Your listings not added successfully !', 'listings.create');
        }
        DB::commit();

        return $this->formatResponse(true, 'Your listings added successfully !', 'owner-listings');
    }













}
