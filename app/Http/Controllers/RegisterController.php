<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class RegisterController extends Controller
{
    public function create() {

        return view('register.create');

    }

    public function store() {

        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'username' => ['required', 'max:255', 'unique:users,username'], // method 2 to unique a field
            'password' => ['required', 'max:255'],
        ]);

        User::create($attributes);

        /**
         * Method 1 of doing flash session message
         */
        // session()->flash('success', 'Your account has been created.');


        /**
         * Method 2 of doing flash session message
         */
        return redirect('/')->with('success', 'Your account has been created.');

    }
}
