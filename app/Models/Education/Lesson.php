<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "name",
        "description",
        "course_id",
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
