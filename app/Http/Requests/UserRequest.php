<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->email == 'admin@admin.com';
    }

    public function rules()
    {
        return [
            'name' => 'required|max:32',
            'email' => 'required|email',
            'password' => request()->password === null ? '' : 'required|string'
        ];
    }
}
