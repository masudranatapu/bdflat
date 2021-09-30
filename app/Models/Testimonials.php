<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    protected $table        = 'WEB_TESTIMONIALS';
    protected $primaryKey   = 'PK_NO';

    public function getTestimonials()
    {
        return Testimonials::where('IS_ACTIVE',1)->get();
    }
}
