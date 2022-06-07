<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{


    public function create() {
        return view('sessions.create');
    }

    public function store() {


        // validation
        $attributes = request()->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        // user authentication
        if (auth()->attempt($attributes)) {
            // prevent session fixation attacks
            session()->regenerate();

            // redirect and success
            return redirect('/')->with('success', 'Welcome back!');
        }

        /**
         * Method 1: using return error
         */
        // return back()
        //         ->withInput()
        //         ->withErrors(['email' => 'Your provided credentials count not be verified.']);

         /**
          * Method 2: throw validation exception
          */
        // throw if not authenticated
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);

    }

    public function destroy() {

        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
