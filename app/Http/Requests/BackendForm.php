<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Response;

class BackendForm extends FormRequest
{
    public function rules()
    {

    }

    public function authorize()
    {
        return Auth::check();
    }


    public function forbiddenResponse()
    {
        return Response::make('Permission denied foo!', 403);
    }

}