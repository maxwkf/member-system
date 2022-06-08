<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    public function index() {
        return view('admin.users.index', [
            'users' => User::latest()->paginate(50)
        ]);
    }

    public function create() {
        return view('admin.users.create', ['roleOptions' => Role::htmlOptionPairs()]);
    }

    public function edit() {
        return view('admin.users.edit');
    }

    public function update() {

    }

    public function store() {

        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'username' => ['required', 'max:255', 'unique:users,username'], // method 2 to unique a field
            'password' => ['required', 'max:255'],
            'roles' => 'required'
        ]);


        $roles = $attributes['roles'];
        unset($attributes['roles']);
        $user = User::create($attributes);

        $user->roles()->syncWithoutDetaching($roles);
        return redirect('/admin/users')->with('success', 'New user created.');
    }
}
