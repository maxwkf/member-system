<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index() {
        return view('admin.users.index', [
            'users' => User::latest()->paginate(50)
        ]);
    }

    public function create() {
        return view('admin.users.create');
    }
}
