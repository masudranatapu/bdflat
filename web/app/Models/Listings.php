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

    protected $table = 'PRD_LISTINGS';
    protected $primaryKey = 'PK_NO';
    public $timestamps = false;

    protected $fillable = [
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
            $user = new Listings();
            $user->PROPERTY_FOR = $request->property_for;
            $user->PROPERTY_TYPE = $request->property_type;
            $user->F_CITY_NO = $request->city;
            $user->F_AREA_NO = $request->area;
            $user->ADDRESS = $request->address;
            $user->PROPERTY_CONDITION = $request->condition;
            $user->PRICE_TYPE = $request->property_price;
            $user->MOBILE1 = $request->mobile;
            $user->CREATED_AT = Carbon::now();
            $user->MODIFIED_AT = Carbon::now();
            $user->save();

//            for store listing variants
            $listing_no = Listings::latest()->first();
            $property_size = $request->size;

            foreach ($property_size as $key => $item) {
                $data = array(
                    'F_LISTING_NO' => $listing_no->PK_NO,
                    'PROPERTY_SIZE' => $request->size[$key],
                    'BEDROOM' => $request->bedroom[$key],
                    'BATHROOM' => $request->bathroom[$key],
                    'TOTAL_PRICE' => $request->price[$key],
                );
                ListingVariants::insert($data);
            }

//            for image upload
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $key => $image) {
                    $name = uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path() . '/uploads/', $name);

                    if ($key == 0) {
                        $is_default = 1;
                    } else {
                        $is_default = 0;
                    }

                    ListingImages::create([
                        'F_LISTING_NO' => $listing_no->PK_NO,
                        'IMAGE_PATH' => public_path() . '/uploads/' . $name,
                        'IMAGE' => $name,
                        'IS_DEFAULT' => $is_default,
                    ]);
                }
            }

//            for features
            $features = new ListingAdditionalInfo();
            $features->F_LISTING_NO = $listing_no->PK_NO;
            $features->FACING = $request->facing;
            $features->HANDOVER_DATE = Carbon::parse($request->handover_date)->format('Y-m-d H:i:s');
            $features->DESCRIPTION = $request->description;
            $features->VIDEO_CODE = $request->videoURL;
            $features->F_FEATURE_NOS = json_encode($request->features);
            $features->F_NEARBY_NOS = json_encode($request->nearby);
            $features->save();

        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Your listings not added successfully !', 'listings.create');
        }
        DB::commit();

        return $this->formatResponse(true, 'Your listings added successfully !', 'owner-listings');
    }


}
