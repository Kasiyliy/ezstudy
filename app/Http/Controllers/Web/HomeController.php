<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebBaseController;
use App\Models\System\User;

class HomeController extends WebBaseController
{

    public function index()
    {
        return view('admin.main.index');
    }

}
