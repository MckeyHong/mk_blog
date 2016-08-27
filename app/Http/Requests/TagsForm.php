<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class TagsForm extends BackendForm
{
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

}