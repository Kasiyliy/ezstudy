<?php

namespace App\Http\Requests\QuestionRequests;

use App\Http\Requests\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class OptionStoreAndUpdateRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'name' => ['required'],
            'is_right' => ['numeric']
        ];
    }
}
