<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function create () {
        return view('auth.register');
    }

    public function store (RegistrationRequest $request) {
        User::create($request->all());
        return redirect('login')->with('status', 'Your account has been created. You can now login.');
    }
}
