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
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id', 'id');
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'quiz_id', 'id');
    }
}
