<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductRequirements extends Model
{
    use RepoResponse;

    protected $table = 'PRD_REQUIREMENTS';
    protected $primaryKey = 'PK_NO';
    public $timestamps = false;
    protected $fillable = [
        'F_CITY_NO',
        'F_AREAS',
        'CITY_NAME',
        'AREA_NAMES',
        'PROPERTY_FOR',
        'F_PROPERTY_TYPE_NO',
        'PROPERTY_TYPE',
        'MIN_SIZE',
        'MAX_SIZE',
        'MIN_BUDGET',
        'MAX_BUDGET',
        'BEDROOM',
        'PROPERTY_CONDITION',
        'REQUIREMENT_DETAILS',
        'PREP_CONT_TIME',
        'EMAIL_ALERT',
        'CREATED_AT',
        'CREATED_BY',
        'MODIFYED_AT',
        'MODIFYED_BY',
        'IS_VERIFIED',
        'IS_ACTIVE',
        'F_VERIFIED_BY',
        'VERIFIED_AT',
    ];

    public function storeOrUpdate($request)
    {
        DB::beginTransaction();
        try {
            if (!$request->auth_id) {
                assert(Auth::user()->USER_TYPE == 1);
            }
            $list = new ProductRequirements();
            $list->F_USER_NO            = Auth::id() ?? $request->auth_id;
            $list->PROPERTY_FOR         = $request->itemCon;
            $list->F_CITY_NO            = $request->f_city_id;
            $list->F_AREAS              = json_encode($request->area);
            $list->F_PROPERTY_TYPE_NO   = $request->property_type;
            $list->MIN_SIZE             = $request->minimum_size;
            $list->MAX_SIZE             = $request->maximum_size;
            $list->MIN_BUDGET           = $request->minimum_budget;
            $list->MAX_BUDGET           = $request->maximum_budget;
            $list->BEDROOM              = json_encode($request->rooms);
            $list->PROPERTY_CONDITION   = json_encode($request->condition);
            $list->REQUIREMENT_DETAILS  = $request->requirement_details;
            $list->PREP_CONT_TIME       = $request->time;
            $list->EMAIL_ALERT          = $request->alert;
            $list->CREATED_BY           = Auth::id() ?? $request->auth_id;
            $list->MODIFYED_BY          = Auth::id() ?? $request->auth_id;
            $list->save();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return $this->formatResponse(false, 'Property Requirements not added successfully !', 'property-requirements');
        }

        DB::commit();
        return $this->formatResponse(true, 'Property Requirements added successfully !', 'property-requirements');
    }
}
