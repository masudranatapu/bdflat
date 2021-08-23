<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table        = 'WEB_ABOUT';
    protected $primaryKey   = 'PK_NO';

    public function getAbout()
    {
        return AboutUs::where([['PK_NO',1],['IS_ACTIVE',1]])->first();
    }
}
