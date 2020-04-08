<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    public const DEFAULT_ASSET_PATH = 'courses/images';

    protected $fillable = [
        "name",
        "description",
        "image_path",
        'quiz_id'
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id', 'id');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }

    public function quizPass()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id')->with('questions.options');
    }
}
