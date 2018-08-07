<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property $id
 * @property $name
 * @property $email
 * @property $status
 */
class User extends Authenticatable
{
    use Notifiable;

    const STATUS_WAIT = 'wait';
    const STATUS_ACTIVE = 'active';

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public static function register($name, $email, $password)
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);
    }
}
