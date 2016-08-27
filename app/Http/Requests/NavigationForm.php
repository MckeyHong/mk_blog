<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class NavigationForm extends BackendForm
{
    public function rules()
    {
        return [
            'sequence' => 'required|integer',
            'name'     => 'required',
            'url'      => 'required|url',
        ];
    }

}