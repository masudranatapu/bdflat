<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Area;
use App\Models\City;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\RepoResponse;
use App\Models\PropertyCondition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listings extends Model
{
    use RepoResponse;

    protected $table = 'PRD_LISTINGS';
    protected $primaryKey = 'PK_NO';
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'MODIFIED_AT';

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
        'MODIFIED_BY',
        'TOTAL_FLOORS',
        'FLOORS_AVAIABLE',
        'IS_FEATURE',
    ];

    public function getDefaultThumb()
    {
        return $this->hasOne('App\Models\ListingImages', 'F_LISTING_NO', 'PK_NO')->where('IS_DEFAULT', 1);
    }

    public function images()
    {
        return $this->hasMany('App\Models\ListingImages', 'F_LISTING_NO', 'PK_NO');
    }

    public function additionalInfo()
    {
        return $this->hasOne('App\Models\ListingAdditionalInfo', 'F_LISTING_NO', 'PK_NO');
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\Owner', 'F_USER_NO', 'PK_NO');
    }

    public function getListingVariant()
    {
        return $this->hasOne('App\Models\ListingVariants', 'F_LISTING_NO', 'PK_NO')->where('PRD_LISTING_VARIANTS.IS_DEFAULT', 1);
    }

    public function getListingVariants()
    {
        return $this->hasMany('App\Models\ListingVariants', 'F_LISTING_NO', 'PK_NO');
    }

    public function listingType(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\ListingType', 'PK_NO', 'F_LISTING_TYPE')
            ->leftJoin('SS_LISTING_PRICE', 'SS_LISTING_PRICE.F_LISTING_TYPE_NO', '=', 'PRD_LISTING_TYPE.PK_NO');
    }

    public function getFeatureListings()
    {
        $limit = WebSetting::where('PK_NO', 1)->first('FEATURE_PROPERTY_LIMIT')->FEATURE_PROPERTY_LIMIT;
        return Listings::with(['getDefaultThumb', 'getListingVariant'])
            ->where('STATUS', '=', 10)
            ->where('IS_FEATURE', '=', 1)
            ->take($limit)
            ->get();
    }

    public function getVerifiedListings()
    {
        $limit = WebSetting::where('PK_NO', 1)->first('VERIFIED_PROPERTY_LIMIT')->VERIFIED_PROPERTY_LIMIT;
        return Listings::with(['getDefaultThumb', 'getListingVariant'])
            ->where('STATUS', '=', 10)
            ->where('IS_VERIFIED', '=', 1)
            ->take($limit)
            ->get();
    }

    public function getListings($for)
    {
        $limit = WebSetting::where('PK_NO', 1)->first(['SALE_PROPERTY_LIMIT', 'RENT_PROPERTY_LIMIT', 'ROOMMATE_PROPERTY_LIMIT']);
        switch ($for) {
            case 'sale':
                $limit = $limit->SALTE_PROPERTY_LIMIT;
                break;
            case 'rent':
                $limit = $limit->RENT_PROPERTY_LIMIT;
                break;
            default:
                $limit = $limit->ROOMMATE_PROPERTY_LIMIT;
        }

        return Listings::with(['getDefaultThumb', 'getListingVariant'])
            ->where('STATUS', '=', 10)
            ->where('PROPERTY_FOR', '=', $for)
            ->take($limit)
            ->get();
    }

    public function getSimilarListings($for, $id)
    {
        $limit = WebSetting::where('PK_NO', 1)->first('SIMILAR_PROPERTY_LIMIT')->SIMILAR_PROPERTY_LIMIT;
        return Listings::with(['getDefaultThumb', 'getListingVariant'])
            ->where('STATUS', '=', 10)
            ->where('PK_NO', '!=', $id)
            ->where('PROPERTY_FOR', '=', $for)
            ->take($limit)
            ->orderByDesc('PK_NO')
            ->get();
    }

    public function getListingDetails($url_slug)
    {
        $listing = Listings::with(['images', 'getListingVariant', 'additionalInfo', 'owner'])
            ->where('STATUS', '=', 10)
            ->where('URL_SLUG', '=', $url_slug)
            ->first();
        if (!$listing) {
            abort(404);
        }
        return $listing;
    }

    public function getListingFeatures($features)
    {
        return ListingFeatures::whereIn('PK_NO', json_decode($features))->get();
    }

    public function getProperties(Request $request): LengthAwarePaginator
    {
        $listings = Listings::with(['getDefaultThumb', 'getListingVariant'])
            ->where('PRD_LISTINGS.STATUS', '=', 10)
            ->select('PRD_LISTINGS.PK_NO', 'PRD_LISTINGS.PROPERTY_TYPE', 'PRD_LISTINGS.CODE', 'PRD_LISTINGS.PROPERTY_FOR', 'PRD_LISTINGS.ADDRESS', 'PRD_LISTINGS.PROPERTY_CONDITION', 'PRD_LISTINGS.TITLE', 'PRD_LISTINGS.CITY_NAME', 'PRD_LISTINGS.AREA_NAME', 'V.TOTAL_PRICE', 'PRD_LISTINGS.USER_TYPE', 'PRD_LISTINGS.IS_VERIFIED', 'PRD_LISTINGS.IS_TOP', 'PRD_LISTINGS.URL_SLUG')
            ->leftJoin('PRD_LISTING_VARIANTS AS V', function ($join) {
                $join->on('V.F_LISTING_NO', '=', 'PRD_LISTINGS.PK_NO');
                $join->on('V.IS_DEFAULT', '=', DB::raw(1));
            });

        $sortBy = $request->query('sb');
        $category = $request->query('cat');
        $condition = $request->query('condition');
        $priceMin = $request->query('p_min');
        $priceMax = $request->query('p_max');
        $postedBy = $request->query('by');
        $verified = $request->query('verified');

        if ($sortBy == 'hl') {
            $listings->orderByDesc('V.TOTAL_PRICE');
        } else if ($sortBy == 'lh') {
            $listings->orderBy('V.TOTAL_PRICE');
        }
        if ($verified == 'verified_properties') {
            $listings->where('PRD_LISTING.IS_VERIFIED', '=', 1);
        }
        if ($category) {
            //            dd($category);
            $listings->where('PRD_LISTINGS.F_PROPERTY_TYPE_NO', $category);
        }
        if ($condition) {
            $condition = explode(',', $condition);
            $listings->whereIn('PRD_LISTINGS.F_PROPERTY_CONDITION', $condition);
        }
        if ($priceMin) {
            $listings->where('V.TOTAL_PRICE', '>=', $priceMin);
        }
        if ($priceMax) {
            $listings->where('V.TOTAL_PRICE', '<=', $priceMax);
        }
        if ($postedBy) {
            $postedBy = explode(',', $postedBy);
            $listings->whereIn('PRD_LISTINGS.USER_TYPE', $postedBy);
        }

        $listings->orderByDesc('PRD_LISTINGS.IS_TOP')->orderByDesc('PRD_LISTINGS.IS_FEATURE');
        return $listings->paginate(12);
    }

    public function store($request): object
    {
        if (Auth::user()->TOTAL_LISTING >= Auth::user()->LISTING_LIMIT) {
            return $this->formatResponse(false, 'Your listings limit is overed !', 'listings.create');
        }

        DB::beginTransaction();
        try {

            if ($request->p_type == 'A') {
                $floors = $request->floor;
                $floor_available = json_encode($request->floor_available);
            } elseif ($request->p_type == 'B') {
                $floors = $request->floor;
                $floor_available = json_encode($request->floor_available);
            } elseif ($request->p_type == 'C') {
                $floors = null;
                $floor_available = null;
            }

            $slug = Str::slug($request->property_title);
            $check = Listings::where('URL_SLUG', $slug)->first();
            if ($check) {
                $sku = Listings::max('CODE') + 1;
                $slug = $slug . '-' . $sku;
            }

            $list = new Listings();
            $list->F_USER_NO = Auth::id();
            $list->PROPERTY_FOR = $request->property_for;
            $list->F_PROPERTY_TYPE_NO = $request->property_type;
            $list->F_CITY_NO = $request->city;
            $list->F_AREA_NO = $request->area;
            $list->ADDRESS = $request->address;
            $list->F_PROPERTY_CONDITION = $request->condition;
            $list->TITLE = $request->property_title;
            $list->URL_SLUG = $slug;
            $list->PRICE_TYPE = $request->property_price;
            $list->CONTACT_PERSON1 = $request->contact_person;
            $list->CONTACT_PERSON2 = $request->contact_person_2;
            $list->MOBILE1 = $request->mobile;
            $list->MOBILE2 = $request->mobile_2;
            $list->F_LISTING_TYPE = $request->listing_type;
            $list->TOTAL_FLOORS = $floors;
            $list->FLOORS_AVAIABLE = $floor_available;
            $list->CREATED_AT = Carbon::now();
            $list->CREATED_BY = Auth::user()->PK_NO;
            $list->save();

            //           for store listing variants
            $property_size = $request->size;
            foreach ($property_size as $key => $item) {

                if ($request->p_type == 'A') {
                    $bedroom = $request->bedroom[$key];
                    $bathroom = $request->bathroom[$key];
                } elseif ($request->p_type == 'B') {
                    $bedroom = 0;
                    $bathroom = 0;
                } elseif ($request->p_type == 'C') {
                    $bedroom = 0;
                    $bathroom = 0;
                }

                if ($key == 0) {
                    $is_default = 1;
                } else {
                    $is_default = 0;
                }

                $data = array(
                    'F_LISTING_NO' => $list->PK_NO,
                    'PROPERTY_SIZE' => $request->size[$key],
                    'BEDROOM' => $bedroom,
                    'BATHROOM' => $bathroom,
                    'TOTAL_PRICE' => $request->price[$key],
                    'IS_DEFAULT' => $is_default,
                );
                ListingVariants::insert($data);
            }

            //            for image upload
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $key => $image) {
                    $name = uniqid() . '.' . $image->getClientOriginalExtension();
                    $name2 = uniqid() . '.' . $image->getClientOriginalExtension();
                    $waterMarkUrl = public_path('assets/img/logo.png');

                    $destinationPath = public_path('/uploads/listings/' . $list->PK_NO . '/');
                    $destinationPath2 = public_path('/uploads/listings/' . $list->PK_NO . '/thumb');

                    if (!file_exists($destinationPath2)) {
                        mkdir($destinationPath2, 0755, true);
                    }

                    $thumb_img = Image::make($image->getRealPath());

                    $thumb_img->backup();

                    $thumb_img->resize(172, 115, function ($constraint) {
                    });
                    $thumb_img->save($destinationPath2 . '/' . $name2);

                    $thumb_img->reset();

                    $thumb_img->insert($waterMarkUrl, 'bottom-left', 5, 5);
                    $thumb_img->save($destinationPath . '/' . $name);

                    if ($key == 0) {
                        $is_default = 1;
                    } else {
                        $is_default = 0;
                    }

                    ListingImages::create([
                        'F_LISTING_NO' => $list->PK_NO,
                        'IMAGE_PATH' => '/uploads/listings/' . $list->PK_NO . '/' . $name,
                        'IMAGE' => $name,
                        'THUMB_PATH' => '/uploads/listings/' . $list->PK_NO . '/thumb/' . $name2,
                        'THUMB' => $name2,
                        'IS_DEFAULT' => $is_default,
                    ]);
                }
            }

            //            for features
            $features = new ListingAdditionalInfo();
            $features->F_LISTING_NO = $list->PK_NO;
            $features->F_FACING_NO = $request->facing;
            $features->HANDOVER_DATE = Carbon::parse($request->handover_date)->format('Y-m-d H:i:s');
            $features->DESCRIPTION = $request->description;
            $features->LOCATION_MAP = $request->map_url;
            $features->VIDEO_CODE = $request->videoURL;
            $features->F_FEATURE_NOS = json_encode($request->features);
            $features->F_NEARBY_NOS = json_encode($request->nearby);
            $features->save();

        } catch (\Exception $e) {
            //             dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Your listings not added successfully !', 'listings.create');
        }
        DB::commit();

        return $this->formatResponse(true, 'Your listings added successfully !', 'owner-listings');
    }

    public function postUpdate($request, $id): object
    {
        DB::beginTransaction();
        try {
            $list = $this->getListing($id);
            $list->PROPERTY_FOR = $request->property_for;
            $list->F_PROPERTY_TYPE_NO = $request->property_type;
            $list->F_CITY_NO = $request->city;
            $list->F_AREA_NO = $request->area;
            $list->ADDRESS = $request->address;
            $list->F_PROPERTY_CONDITION = $request->condition;
            $list->TITLE = $request->property_title;
            $list->PRICE_TYPE = $request->property_price;
            $list->CONTACT_PERSON1 = $request->contact_person;
            $list->CONTACT_PERSON2 = $request->contact_person_2;
            $list->MOBILE1 = $request->mobile;
            $list->MOBILE2 = $request->mobile_2;
            $list->F_LISTING_TYPE = $request->listing_type;
            $list->TOTAL_FLOORS = $request->floor;
            $list->FLOORS_AVAIABLE = json_encode($request->floor_available);
            $list->MODIFIED_BY = Auth::user()->PK_NO;
            $list->MODIFIED_AT = Carbon::now();
            $list->update();

            //            for store listing variants

            $property_size = $request->size;
            ListingVariants::where('F_LISTING_NO', $id)->delete();
            foreach ($property_size as $key => $item) {
                $data = array(
                    'F_LISTING_NO' => $list->PK_NO,
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
                    //                    $name = uniqid() . '.' . $image->getClientOriginalExtension();
                    //                    $image->move(public_path() . '/uploads/listings/'.$id.'/', $name);

                    $name = uniqid() . '.' . $image->getClientOriginalExtension();
                    $name2 = uniqid() . '.' . $image->getClientOriginalExtension();
                    $waterMarkUrl = public_path('assets/img/logo.png');

                    $destinationPath = public_path('/uploads/listings/' . $list->PK_NO . '/');
                    $destinationPath2 = public_path('/uploads/listings/' . $list->PK_NO . '/thumb');

                    if (!file_exists($destinationPath2)) {
                        mkdir($destinationPath2, 0755, true);
                    }

                    $thumb_img = Image::make($image->getRealPath());

                    $thumb_img->backup();

                    $thumb_img->resize(172, 115, function ($constraint) {
                    });
                    $thumb_img->save($destinationPath2 . '/' . $name2);

                    $thumb_img->reset();

                    $thumb_img->insert($waterMarkUrl, 'bottom-left', 5, 5);
                    $thumb_img->save($destinationPath . '/' . $name);

                    //                    if ($key == 0) {
                    //                        $is_default = 1;
                    //                    } else {
                    //                        $is_default = 0;
                    //                    }

                    ListingImages::create([
                        'F_LISTING_NO' => $list->PK_NO,
                        'IMAGE_PATH' => '/uploads/listings/' . $id . '/' . $name,
                        'IMAGE' => $name,
                        'THUMB_PATH' => '/uploads/listings/' . $list->PK_NO . '/thumb/' . $name2,
                        'THUMB' => $name2,
                        //                        'IS_DEFAULT'    => $is_default,
                    ]);
                }
            }

            //            for features
            $features = ListingAdditionalInfo::where('F_LISTING_NO', $request->id)->first();
            $features->F_LISTING_NO = $list->PK_NO;
            $features->F_FACING_NO = $request->facing;
            $features->HANDOVER_DATE = Carbon::parse($request->handover_date)->format('Y-m-d H:i:s');
            $features->DESCRIPTION = $request->description;
            $features->LOCATION_MAP = $request->map_url;
            $features->VIDEO_CODE = $request->videoURL;
            $features->F_FEATURE_NOS = json_encode($request->features);
            $features->F_NEARBY_NOS = json_encode($request->nearby);
            $features->update();
        } catch (\Exception $e) {
            DB::rollback();
            //            dd($e);
            return $this->formatResponse(false, 'Your listings not updated !', 'listings.create');
        }
        DB::commit();

        return $this->formatResponse(true, 'Your listings updated successfully !', 'owner-listings');
    }

    public function postDelete($id): object
    {
        DB::beginTransaction();
        try {
            $listing = $this->getListing($id);
            $listing->STATUS = 4;
            $listing->save();

            //            ListingVariants::where('F_LISTING_NO',$id)->delete();

            //            $images = ListingImages::where('F_LISTING_NO', $id)->get();
            //            foreach ($images as $item) {
            //                if (\File::exists(public_path($item->IMAGE_PATH))) {
            //                    \File::delete(public_path($item->IMAGE_PATH));
            //                }
            //                if (\File::exists(public_path($item->THUMB_PATH))) {
            //                    \File::delete(public_path($item->THUMB_PATH));
            //                }
            //            }
            //            ListingImages::where('F_LISTING_NO', $id)->delete();
            //
            //            ListingAdditionalInfo::where('F_LISTING_NO', $id)->delete();

        } catch (\Exception $e) {
            //             dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Your listings not updated successfully !', 'listings.create');
        }
        DB::commit();

        return $this->formatResponse(true, 'Your listings updated successfully !', 'owner-listings');
    }

    public function getLatest(int $limit)
    {
        return Listings::with(['getDefaultThumb', 'listingType'])
            ->where('F_USER_NO', '=', Auth::id())
            ->where('STATUS', '!=', 4)
            ->latest()
            ->take($limit)
            ->get();
    }

    public function getListing($id)
    {
        return Listings::with(['listingType'])
            ->where('STATUS', '!=', 4)
            ->find($id);
    }

    public function storePayment($id)
    {
        $status = false;
        $msg = 'Payment unsuccessful !';

        $user = Auth::user();
        DB::beginTransaction();
        try {
            $listing = $this->getListing($id);
            $type = $listing->PROPERTY_FOR;
            $price = 0;
            if ($type == 'sale') {
                $price = $listing->listingType->SELL_PRICE ?? 0;
            } else if ($type == 'rent') {
                $price = $listing->listingType->RENT_PRICE ?? 0;
            } else if ($type == 'roommate') {
                $price = $listing->listingType->ROOMMATE_PRICE ?? 0;
            }

            if ($user->UNUSED_TOPUP - $price >= 0) {
                $payment = new PaymentUsed();
                $payment->F_CUSTOMER_NO = Auth::id();
                $payment->F_LISTING_NO = $listing->PK_NO;
                $payment->AMOUNT = $price;
                $payment->START_DATE = Carbon::now();
                $payment->END_DATE = Carbon::now()->addDays($listing->listingType->DURATION);
                $payment->save();

                $status = true;
                $msg = 'Payment successful !';
            }
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();

        $url = 'owner-listings';
        if ($user->USER_TYPE == 3) {
            $url = 'developer-listings';
        }
        return $this->formatResponse($status, $msg, $url);
    }
}
