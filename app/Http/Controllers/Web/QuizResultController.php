<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebBaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuizResultController extends WebBaseController
{
    public function pass($id) {
        $user = Auth::id();
        return redirect()->route('my.courses');

    }
}
