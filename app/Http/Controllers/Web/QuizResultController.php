<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\WebServiceErroredException;
use App\Http\Controllers\WebBaseController;
use App\Models\Education\Option;
use App\Models\Education\Quiz;
use App\Models\Education\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizResultController extends WebBaseController
{
    public function pass($id, Request $request) {
        $user = Auth::user();
        $quiz = Quiz::find($id);
        if(!$quiz) {
            throw new WebServiceErroredException('Не найден куиз');
        }
        $answers = Option::whereIn('id', $request->input('answers', []))->get();
        $total = 0;
        foreach ($request->input('answers', []) as $key => $answer) {
            if($answers->where('id', $answer)->first()->is_right) {
                $total += 1;
            }
        }

        $quizResult = QuizResult::where('quiz_id', $id)->where('user_id', $user->id)->first();
        if(!$quizResult) {
            $quizResult = new QuizResult();
            $quizResult->quiz_id = $quiz->id;
            $quizResult->user_id = $user->id;
        }
        $quizResult->result = $total;
        $quizResult->save();
        return redirect()->route('my.courses');

    }
}
