<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductImg extends Model
{
    protected $table 		= 'prd_img_library';
    protected $primaryKey   = 'pk_no';



    protected $fillable = [ 'img_name', 'serial_no'];




  
    
}
