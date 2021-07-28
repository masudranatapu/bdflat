<?php

namespace App;

use App\Traits\RepoResponse;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    protected $fillable = ['NAME', 'EMAIL', 'PASSWORD','USER_TYPE','PROFILE_PIC','PROFILE_PIC_URL','MOBILE_NO','CONTACT_PER_NAME','DESIGNATION','ADDRESS'];

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


    public function paymentHistory($request){


    }

    public function updateProfile($request)
    {
        DB::beginTransaction();
        try {
//            $list                           = User::where('PK_NO',Auth::user()->PK_NO)->first();
            $list                           = Auth::user();
            $list->NAME                     = $request->name;
//            $list->EMAIL                    = $request->email;
            $list->MOBILE_NO                = $request->mobile;

            if ($request->hasfile('image')) {
                if(\File::exists(public_path($list->PROFILE_PIC_URL))){
                    \File::delete(public_path($list->PROFILE_PIC_URL));
                }
                $image = $request->file('image');
                $name = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = '/uploads/user/'.Auth::user()->PK_NO.'/'.$name;
                $image->move(public_path('/uploads/user/'.Auth::user()->PK_NO), $name);

                $list->PROFILE_PIC              = $name;
                $list->PROFILE_PIC_URL          = $path;
            }

            $list->update();

        }catch (\Exception $e){
//                dd($e);
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
            $list                           = User::where('PK_NO',Auth::user()->PK_NO)->first();
            $list->PASSWORD                 = Hash::make($request->password);
            $list->update();

        }catch (\Exception $e){
            DB::rollback();
            return $this->formatResponse(false, 'Password is not updated successfully !', 'profile.edit');
        }
        DB::commit();
        return $this->formatResponse(true, 'Password has been updated successfully !', 'profile.edit');
    }



}
