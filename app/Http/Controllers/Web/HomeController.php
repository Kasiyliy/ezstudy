<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebBaseController;
use App\Models\Education\Course;
use App\Models\Education\Lesson;
use App\Models\Education\Question;
use App\Models\Education\Quiz;
use App\Models\Education\QuizResult;
use App\Models\System\User;

class HomeController extends WebBaseController
{

    public function index()
    {
        $courseCount = Course::count();
        $lessonCount = Lesson::count();
        $userCount = User::count();
        $quizCount = Quiz::count();
        $questionCount = Question::count();
        $quizResultCount = QuizResult::count();
        return view('admin.main.index',
            compact('courseCount', 'lessonCount', 'quizCount', 'userCount', 'questionCount', 'quizResultCount'));
    }

}
