<?php

namespace App\Http\Controllers;

use App\Core\Interfaces\WithUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WebBaseController extends Controller implements WithUser
{
    public function warning()
    {
        request()
            ->session()
            ->flash('warning', 'Ескерту!');

    }

    public function added()
    {
        request()
            ->session()
            ->flash('warning', 'Қосылды!');
    }

    public function inModeration()
    {
        request()
            ->session()
            ->flash('warning', "Администраторға тексеріске жеткізілді!");
    }

    public function deleted()
    {
        request()
            ->session()
            ->flash('warning', 'Жойылды!');
    }

    public function successOperation()
    {
        request()
            ->session()
            ->flash('success', 'Сәтті!');
    }

    public function edited()
    {
        request()
            ->session()
            ->flash('warning', 'Жаңартылды!');
    }

    public function notFound()
    {
        request()
            ->session()
            ->flash('warning', 'Табылмады!');
    }


    public function error()
    {
        request()
            ->session()
            ->flash('error', 'Қате!');
    }

    public function makeToast($type, $message)
    {
        request()
            ->session()
            ->flash($type, $message);
    }

    public function getCurrentUser()
    {
        return Auth::user();
    }

    public function getCurrentUserId()
    {
        return Auth::id();
    }

}