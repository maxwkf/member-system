<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter) {// validate
        request()->validate([
            'email' => 'required|email'
        ]);
    
    
        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages(['This email cannot be added to our newsletter subscription list.']);
        }
    
        return redirect('/')->with('success', 'You are now signed up for our newsletter.');
    }
}
