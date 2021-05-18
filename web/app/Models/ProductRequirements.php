<?php

namespace App\Models;
use App\Traits\RepoResponse;
use Carbon\Carbon;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductRequirements extends Model
{
    use RepoResponse;
    protected $table        = 'PRD_REQUIREMENTS';
    protected $primaryKey   = 'PK_NO';
    public $timestamps = false;
    protected $fillable     = [
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

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $list                           = new ProductRequirements();
            $list->PROPERTY_FOR             = $request->itemCon;
            $list->F_PROPERTY_TYPE_NO       = $request->property_type;
            $list->MIN_SIZE                 = $request->minimum_size;
            $list->MAX_SIZE                 = $request->maximum_size;
            $list->MIN_BUDGET               = $request->minimum_budget;
            $list->MAX_BUDGET               = $request->maximum_budget;
            $list->BEDROOM                  = $request->rooms;
            $list->PROPERTY_CONDITION       = $request->condition;
            $list->REQUIREMENT_DETAILS      = $request->requirement_details;
            $list->PREP_CONT_TIME           = $request->time;
            $list->EMAIL_ALERT              = $request->alert;
            $list->CREATED_AT               = Carbon::now();
            $list->CREATED_BY               = Auth::user()->PK_NO;
            $list->MODIFYED_AT              = Carbon::now();
            $list->MODIFYED_BY              = Auth::user()->PK_NO;
            $list->save();

        } catch (\Exception $e) {
             dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Property Requirements not added successfully !', 'property-requirements');
        }
        DB::commit();

        return $this->formatResponse(true, 'Property Requirements added successfully !', 'property-requirements');
    }
}
