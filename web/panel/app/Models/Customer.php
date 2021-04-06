<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Customer extends Model
{
   
    public $timestamps      = false;
    // const CREATED_AT     = 'create_dttm';
    // const UPDATED_AT     = 'update_dttm';


      protected $table = 'ss_customers';

    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function package(){
        return $this->hasOne('App\Models\Package', 'pk_no', 'package_id');
    }

    

    
 

    
    

    
}
