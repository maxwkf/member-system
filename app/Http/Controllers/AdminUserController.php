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

    public function store() {

        $attributes = $this->validateUser();
        $roles = $attributes['roles'];
        unset($attributes['roles']);

        User::create($attributes)->roles()->syncWithoutDetaching($roles);

        return redirect('/admin/users')->with('success', 'New user created.');
    }

    public function edit(User $user) {
        return view('admin.users.edit', ['user' => $user, 'roleOptions' => Role::htmlOptionPairs()]);
    }

    public function update(User $user) {
        $attributes = $this->validateUser($user);
        $roles = $attributes['roles'];
        unset($attributes['roles']);
        unset($attributes['username']);
        unset($attributes['password']);
        
        $user->update($attributes);
        $user->roles()->syncWithoutDetaching($roles);
        return back()->with('success', 'User updated.');
    }

    public function destroy(User $user) {
        $user->delete();
        return back()->with('success', 'User deleted');
    }

    protected function validateUser(?User $user = null) {
        $user ??= new User();

        return request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'username' => $user->exists ? [] : ['required', 'max:255', Rule::unique('users', 'username')],
            // 'username' => ['required', 'max:255', 'unique:users,username'], // method 2 to unique a field
            'password' => $user->exists ? [] : ['required', 'max:255'],
            'roles' => 'required'
        ]);

    }
}
