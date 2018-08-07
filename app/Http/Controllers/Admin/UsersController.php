<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20);

        $statuses = [
            User::STATUS_WAIT => 'Waiting',
            User::STATUS_ACTIVE => 'Active',
        ];

        return view('admin.users.index', compact('users', 'statuses'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
        dd('store');

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'status' => User::STATUS_ACTIVE
        ]);

        return redirect()->route('admin.users.show', $user);
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $statuses = [
            User::STATUS_WAIT => 'Waiting',
            User::STATUS_ACTIVE => 'Active'
        ];

        return view('admin.users.edit', compact('user', 'statuses'));
    }

    public function update(UserRequest $request, User $user)
    {
        $dataUser = [
            'name' => $request['name'],
            'email' => $request['email']
        ];

        $request->password === null ?: $dataUser['password'] = bcrypt($request->password);

        $user->update($dataUser);

        return redirect()->route('admin.users.show', $user);
    }

    public function destroy(User$user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
