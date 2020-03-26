<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function course()
    {
        return $this->hasOne(Course::class, 'quiz_id', 'id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'quiz_id', 'id');
    }
}
