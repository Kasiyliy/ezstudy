<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 22.03.2020
 * Time: 01:16
 */

namespace App\Http\Requests\CourseControllerRequests;


use App\Http\Requests\WebBaseRequest;

class StoreOrUpdateCourseRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        $id = $this->route('id');
        if ($id) {
            return [
                'name' => ['required', 'string'],
                'description' => ['required', 'string'],
                'image' => ['image'],
            ];
        } else {
            return [
                'name' => ['required', 'string'],
                'description' => ['required', 'string'],
                'image' => ['image', 'required'],
            ];
        }
    }

}