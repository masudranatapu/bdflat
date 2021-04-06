<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table 		= 'prd_model';
    protected $primaryKey   = 'pk_no';
	public $timestamps 		= false;

       // const CREATED_AT     = 'create_dttm';
    // const UPDATED_AT     = 'update_dttm';


    protected $fillable = [
        'brand_pk_no', 'name'
    ];


    public function brand() {
        return $this->belongsTo('App\Models\Brand', 'brand_pk_no');
    }



    public function getProdModel($brand_id,$type = null){

    	$data = ProductModel::where('F_PRD_BRAND_NO',$brand_id)->get();
        $response = null;

        if ($type == 'list') {
            $response = [];
            if ($data) {
                foreach ($data as $key => $value) {
                    $response[$value->pk_no] = $value->NAME;
                }
            }

        }else{
            $response = '';
            if ($data) {
                foreach ($data as $value) {
                    $response .= '<option value="'.$value->pk_no.'">'.$value->name.'</option>';
                }
            }else{
                $response .= '<option value="">No data found</option>';
            }
        }


        return $response;
    }



    public function category() {
           return $this->belongsTo('App\Models\Category', 'cat_pk_no');
       }

    


}
