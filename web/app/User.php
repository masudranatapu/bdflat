<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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
    protected $fillable = ['NAME', 'EMAIL', 'PASSWORD','USER_TYPE','MOBILE_NO','CONTACT_PER_NAME','DESIGNATION','ADDRESS'];

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



}
