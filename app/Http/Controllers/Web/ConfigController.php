<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ConfigController extends WebBaseController
{

    public function command($request)
    {
        if ($request->token == 'kasya' && $request->command) {
            return Artisan::call($request->command);
        } else {
            return 'fail';
        }
    }


    public function optimize(Request $request)
    {
        if ($request->token == 'kasya') {
            return Artisan::call('optimize');
        } else {
            return 'fail';
        }
    }
}
