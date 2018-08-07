<?php

namespace App\Http\Requests\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property User $user
 */
class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->email == 'admin@admin.com';
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:32',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => request()->password === null ? '' : 'required|string'
        ];
    }
}
