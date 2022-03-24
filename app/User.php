<?php

namespace App;

use App\Models\BrowsedProperty;
use App\Models\Listings;
use App\Models\OwnerInfo;
use App\Traits\RepoResponse;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, RepoResponse;

    protected $table = 'WEB_USER';
    protected $primaryKey = 'PK_NO';

    public function getAuthPassword()
    {
        return $this->PASSWORD;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['NAME', 'EMAIL', 'PASSWORD', 'USER_TYPE', 'PROFILE_PIC', 'PROFILE_PIC_URL', 'MOBILE_NO', 'CONTACT_PER_NAME', 'DESIGNATION', 'ADDRESS', 'OTP'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['PASSWORD'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function requirements(): HasMany
    {
        return $this->hasMany('App\Models\ProductRequirements', 'CREATED_BY', 'PK_NO');
    }

    public function info(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\OwnerInfo', 'F_USER_NO', 'PK_NO');
    }

    public function browsedProperty(): HasMany
    {
        return $this->hasMany('App\Models\BrowsedProperty', 'F_USER_NO', 'PK_NO');
    }

    public function browsedProperties(): HasManyThrough
    {
        return $this->hasManyThrough(Listings::class, BrowsedProperty::class, 'F_USER_NO', 'PK_NO', 'PK_NO', 'F_LISTING_NO');
    }

    public function contactedProperty(): HasMany
    {
        return $this->hasMany('App\Models\ListingLeadPayment', 'F_USER_NO', 'PK_NO');
    }

    public function contactedProperties(): HasManyThrough
    {
        return $this->hasManyThrough('App\Models\Listings', 'App\Models\ListingLeadPayment', 'F_USER_NO', 'PK_NO', 'PK_NO', 'F_LISTING_NO');
    }

    public function paymentHistory($request)
    {


    }

    public function updateProfile($request)
    {
        DB::beginTransaction();
        try {
            $list = Auth::user();
            $list->NAME = $request->name;
            $list->MOBILE_NO = $request->mobile;
            $list->PAYMENT_AUTO_RENEW = $request->payment_auto_renew;

            if ($request->hasfile('image')) {
                if (\File::exists(public_path($list->PROFILE_PIC_URL))) {
                    \File::delete(public_path($list->PROFILE_PIC_URL));
                }
                $image = $request->file('image');
                $name = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = '/uploads/user/' . Auth::user()->PK_NO . '/' . $name;
                $image->move(public_path('/uploads/user/' . Auth::user()->PK_NO), $name);

                $list->PROFILE_PIC = $name;
                $list->PROFILE_PIC_URL = $path;
            }

            if (in_array($list->USER_TYPE, [2, 3, 4, 5])) {
                $info = OwnerInfo::where('F_USER_NO', $list->getAuthIdentifier())->first();
                if (!$info) {
                    $info = new OwnerInfo();
                    $info->F_USER_NO = $list->getAuthIdentifier();
                }
                $info->SHOP_OPEN_TIME = $request->open_time;
                $info->SHOP_CLOSE_TIME = $request->close_time;
                $info->WORKING_DAYS = json_encode($request->working_days);
                $info->save();
            }

            $list->update();

        } catch (\Exception $e) {
                        //    dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Your Profile is not updated !', 'profile.edit');
        }
        DB::commit();
        return $this->formatResponse(true, 'Your Profile has been updated successfully !', 'profile.edit');
    }

    public function updatePass($request)
    {
        DB::beginTransaction();
        try {
            $list = User::where('PK_NO', Auth::user()->PK_NO)->first();
            $list->PASSWORD = Hash::make($request->password);
            $list->update();

        } catch (\Exception $e) {
            DB::rollback();
            return $this->formatResponse(false, 'Password is not updated successfully !', 'profile.edit');
        }
        DB::commit();
        return $this->formatResponse(true, 'Password has been updated successfully !', 'profile.edit');
    }


}
