<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class RegisterController extends Controller
{
    public function create() {

        return view('register.create');

    }

    public function store() {

        $attributes = request()->validate([
            'name' => ['required', 'max:1'],
            'email' => ['required', 'email', 'max:255'],
            'username' => ['required', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);

        User::create($attributes);

        return redirect('/');

    }
}
