<?php

namespace Tests\Unit\Model\User;

use App\Models\User;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function testRequest()
    {
        $user = User::register(
            $name     = 'name',
            $email    = 'email',
            $password = 'password'
        );

        self::assertNotEmpty($user);
        self::assertEquals($name, $user->name);
        self::assertEquals($email, $user->email);
        self::assertNotEmpty($user->password);
        self::assertTrue(\Hash::check($password, $user->password));

        $user->delete();
    }
}
