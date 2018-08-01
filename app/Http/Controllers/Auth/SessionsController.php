<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }
	
	public function create()
    {
        return view('sessions.create');
    }
	
	 public function store()
    {
        if (! auth()->attempt(request(['email', 'password']))){
			return back()->withErrors([
				'message' => 'Please check your credentials and try again'
			]);
		}

		if (auth()->user()->email == "admin@admin.com") return redirect('/admin');

        return redirect('/');
    }
    
    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
