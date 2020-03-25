<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 22.03.2020
 * Time: 01:16
 */

namespace App\Http\Requests\LessonControllerRequests;


use App\Http\Requests\WebBaseRequest;

class StoreOrUpdateLessonRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }
}