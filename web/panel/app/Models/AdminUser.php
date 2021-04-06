<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class AdminUser extends Model
{
    protected $table = 'admin_users';

    public function getUserCombo(){
        return AdminUser::select(
            DB::raw("CONCAT(first_name,' ',last_name) AS name"),'id'
        )
        -> pluck('name', 'id');
    }
}
