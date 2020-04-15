<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\WebServiceErroredException;
use App\Exceptions\WebServiceException;
use App\Http\Controllers\WebBaseController;
use App\Http\Requests\QuizControllerRequests\StoreOrUpdateQuizRequest;
use App\Models\Education\Course;
use App\Models\Education\Quiz;
use App\Models\Education\QuizResult;
use Illuminate\Support\Facades\Auth;

class QuizController extends WebBaseController
{
    public function store($course_id, StoreOrUpdateQuizRequest $request)
    {
        $course = Course::findOrFail($course_id);
        $quiz = Quiz::create([
            'name' => $request->name,
            'course_id' => $course_id
        ]);
        $course->quiz_id = $quiz->id;
        $course->save();
        $this->added();
        return redirect()->back();
    }

    public function update($id, StoreOrUpdateQuizRequest $request)
    {
        $quiz = Quiz::with('course')->findOrFail($id);
        $quiz->update($request->all());
        $this->edited();
        return redirect()->back();
    }

    public function index()
    {
        $quizzes = Quiz::with('course')->paginate(10);
        return view('admin.main.quizzes.index', compact('quizzes'));
    }

    public function pass($id)
    {
        $quiz = Quiz::where('id', $id)->with('questions.options')->first();
        $i = 1;
        return view('admin.main.quizzes.pass', compact('quiz', 'i'));
    }

    public function passCourseTest($course_id)
    {
        $course = Course::where('id', $course_id)->with('quiz')->first();
        if (!$course) {
            throw new WebServiceErroredException('Не найден курс');
        }
        $quiz = $course->quizPass;
        $i = 1;
        $quizResult = QuizResult::where('quiz_id', $quiz->id)->where('user_id', Auth::id())->first();
        return view('admin.main.quizzes.passCourse', compact('quiz', 'i', 'quizResult'));
    }
}
