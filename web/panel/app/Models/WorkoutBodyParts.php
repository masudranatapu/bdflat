<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutBodyParts extends Model
{
    protected $table = 'workout_body_parts';

    public function body() {
        return $this->hasMany('App\Models\WorkoutItems');
    }
}
