<?php

namespace App\Http\Requests\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property User $user
 */
class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->email == 'admin@admin.com';
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:32',
            'email' => 'required|string|email|max:40|unique:users,id,' . $this->user->id,
            'password' => request()->password === null ? '' : 'required|string'
        ];
    }
}
