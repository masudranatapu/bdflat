<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $table        = 'WEB_TEAM_MEMBERS';
    protected $primaryKey   = 'PK_NO';

    public function getTeamMembers()
    {
        return TeamMember::where('IS_ACTIVE',1)->get();
    }
}
