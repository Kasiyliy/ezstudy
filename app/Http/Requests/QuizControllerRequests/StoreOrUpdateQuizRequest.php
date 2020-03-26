<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 26.03.2020
 * Time: 10:13
 */

namespace App\Http\Requests\QuizControllerRequests;


use App\Http\Requests\WebBaseRequest;

class StoreOrUpdateQuizRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'name' => ['required']
        ];
    }

}