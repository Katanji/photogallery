<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->email == 'admin@admin.com';
    }

    public function rules()
    {
        return [
            'name' => 'required|max:32',
            'featured_image' => 'required|image|max:10000'
        ];
    }
}
