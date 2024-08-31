<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }


    public function store()
    {
        //  Validate the user
        $validatedUser  = request()->validate([
            'name' => 'required|min:5',
            'email' => 'required|min:5|email',
            "password" => ['required', Password::min(6), 'confirmed'],

        ]);

        // Create A new User
        $user = User::create($validatedUser);

        // Log the User In
        Auth::login($user);

        // Redirect
        return redirect('/jobs');
    }
}
