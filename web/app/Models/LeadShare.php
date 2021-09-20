<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadShare extends Model
{
    public $timestamps      = false;
    protected $table        = 'PRD_LEAD_SHARE_MAP';
    protected $primaryKey   = 'PK_NO';
    protected $fillable     = ['NAME', 'F_REQUIREMENT_NO'];

    public function getRequirements()
    {
        return $this->belongsTo('App\Models\ProductRequirements', 'F_REQUIREMENT_NO', 'PK_NO')->where('IS_ACTIVE', 1);
    }

    public function getSuggestedLead($request){
        return LeadShare::with(['getRequirements'])
            ->latest()
            ->paginate(10);
    }

    public function getSuggestedLeadDetails($id){
        return LeadShare::with(['getRequirements'])
            ->where('PK_NO',$id)
            ->latest()
            ->first();
    }
}
