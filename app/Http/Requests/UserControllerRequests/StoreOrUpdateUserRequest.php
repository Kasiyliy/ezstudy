<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 22.03.2020
 * Time: 01:16
 */

namespace App\Http\Requests\UserControllerRequests;


use App\Http\Requests\WebBaseRequest;

class StoreOrUpdateUserRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        $id = $this->route('id');
        if ($id) {
            return [
                'first_name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'password' => ['required', 'string'],
                'email' => ['email', 'required', "unique:users,email,$id"],
            ];
        } else {
            return [
                'first_name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'email' => ['email', 'required', 'unique:users,email'],
            ];
        }
    }

}