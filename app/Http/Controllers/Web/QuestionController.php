<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebBaseController;
use App\Models\Education\Quiz;

class QuestionController extends WebBaseController
{
    public function index($quiz_id)
    {
        $quiz = Quiz::with('course')->findOrFail($quiz_id);
        $course = $quiz->course;
        return view('admin.main.questions.index', compact('quiz', 'course'));
    }
}
