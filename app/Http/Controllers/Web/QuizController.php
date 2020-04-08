<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebBaseController;
use App\Http\Requests\QuizControllerRequests\StoreOrUpdateQuizRequest;
use App\Models\Education\Course;
use App\Models\Education\Quiz;

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
        $quiz = Quiz::findOrFail($id);
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
}
