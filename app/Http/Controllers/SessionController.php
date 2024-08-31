<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }


    public function store()
    {
        // Validate the user
        $validatedUser =    request()->validate([
            'email' => ['required', 'email'],
            "password" => ["required"],
        ]);

        // Attempt to login
        if (!Auth::attempt($validatedUser)) {
            throw ValidationException::withMessages([
                'email' => 'The provided email or password is incorrect.'
            ]);
        }

        // Regenerate the session token
        request()->session()->regenerate();

        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/jobs');
    }
}
