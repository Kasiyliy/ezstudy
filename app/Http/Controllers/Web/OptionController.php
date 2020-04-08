<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\WebServiceErroredException;
use App\Http\Controllers\WebBaseController;
use App\Http\Requests\QuestionRequests\OptionStoreAndUpdateRequest;
use App\Models\Education\Option;
use App\Models\Education\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends WebBaseController
{
    public function index($question_id) {
        $options = Option::where('question_id', $question_id)->paginate(10);
        $question = Question::find($question_id);
        return view('admin.main.questions.answers.index', compact('options', 'question'));
    }

    public function create($question_id) {
        $option = new Option();
        $question = Question::find($question_id);
        return view('admin.main.questions.answers.create', compact('option', 'question'));
    }

    public function store($question_id, OptionStoreAndUpdateRequest $request) {
        $option = new Option();
        $question = Question::find($question_id);
        foreach ($question->options as $optionCheck) {
            if($request->is_right && $optionCheck->is_right) {
                throw new WebServiceErroredException('2 жауап бірдей болуы мүмкін емес!');
            }
        }
        $option->content = $request->name;
        $option->question_id = $question_id;
        $option->is_right = $request->is_right ? true : false;
        $option->save();
        $this->added();
        return redirect()->route('options.index', ['question_id' => $question->id]);
    }

    public function delete($id) {
        $option = Option::find($id);
        $question_id = $option->question_id;
        $option->delete();
        $this->deleted();
        return redirect()->route('options.index', ['question_id' => $question_id]);
    }
}
