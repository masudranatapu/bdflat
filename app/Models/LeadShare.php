<?php

namespace App\Models;
use Auth;
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
        $user_id = Auth::id();
        return LeadShare::with(['getRequirements'])
            ->where('F_COMPANY_NO', $user_id)
            ->where('STATUS', 0)
            ->orderBy('ORDER_ID')
            ->paginate(10);
    }

    public function getLeads($request){
        $user_id = Auth::id();
        return LeadShare::with(['getRequirements'])
            ->where('F_COMPANY_NO', $user_id)
            ->where('STATUS', 1)
            ->paginate(10);
    }

    public function getLeadDetails($id){
        return LeadShare::with(['getRequirements'])
            ->where('PK_NO',$id)
            ->where('F_COMPANY_NO',Auth::id())
            ->first();
    }

    public function getdeveloperLeads(){
        return LeadShare::with(['getRequirements'])
            ->where('STATUS',1)
            ->where('F_COMPANY_NO',Auth::id())
            ->orderBy('ORDER_ID')
            ->paginate(10);
    }





}
