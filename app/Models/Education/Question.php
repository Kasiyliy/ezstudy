<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    public function quiz() {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }

    public function options() {
        return $this->hasMany(Option::class, 'question_id', 'id');

    }
}
