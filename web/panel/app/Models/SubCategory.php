<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table        = 'prd_sub_category';
    protected $primaryKey   = 'pk_no';
    public $timestamps      = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'hs_prefix'
    ];

    public function getSubCategoryCombo(){
        return SubCategory::pluck('name', 'pk_no');
    }

    public function getSubcateByCategor($id, $type = null){

        $data = SubCategory::where('f_prd_category_no',$id)->get();
        $response = null;

        if ($type == 'list') {
            $response = [];
            if ($data) {
                foreach ($data as $key => $value) {
                    $response[$value->pk_no] = $value->name;
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
        return $this->belongsTo('App\Models\Category', 'f_prd_category_no');
    }


}
