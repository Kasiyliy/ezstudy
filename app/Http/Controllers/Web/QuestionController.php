<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebBaseController;
use App\Http\Requests\QuestionRequests\QuestionStoreAndUpdateRequest;
use App\Models\Education\Question;
use App\Models\Education\Quiz;

class QuestionController extends WebBaseController
{
    public function index($quiz_id)
    {
        $quiz = Quiz::with('course')->findOrFail($quiz_id);
        $course = $quiz->course;
        $questions = Question::where('quiz_id', $quiz->id)->paginate(10);
        return view('admin.main.questions.index', compact('quiz', 'course', 'questions'));
    }

    public function create($quiz_id)
    {
        $quiz = Quiz::with('course')->findOrFail($quiz_id);
        $question = new Question();
        return view('admin.main.questions.create', compact('quiz', 'question'));
    }

    public function store($quiz_id, QuestionStoreAndUpdateRequest $request)
    {
        $quiz = Quiz::with('course')->findOrFail($quiz_id);
        $question = new Question();
        $question->content = $request->name;
        $question->quiz_id = $quiz_id;
        $question->save();
        $this->added();
        return redirect()->route('questions.index', ['id' => $quiz->id]);
    }

    public function delete($id)
    {

    }
}
