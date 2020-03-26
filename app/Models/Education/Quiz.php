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

    public function quiz()
    {
        return $this->hasOne(Course::class, 'quiz_id', 'id');
    }



}
