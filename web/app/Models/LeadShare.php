<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadShare extends Model
{
    public $timestamps      = false;
    protected $table        = 'PRD_LEAD_SHARE_MAP';
    protected $primaryKey   = 'PK_NO';
    protected $fillable     = ['NAME', 'F_REQUIREMENT_NO'];


    public function getSuggestedLead($request){

        return 1;
    }
}
