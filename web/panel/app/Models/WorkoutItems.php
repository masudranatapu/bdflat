<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutItems extends Model
{
    protected $table = 'workout_items';

    public function group() {
        return $this->belongsTo('App\Models\WorkoutBodyParts', 'body_parts_id', 'id');
    }
}
