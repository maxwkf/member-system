<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminRoleController extends Controller
{
    public function index() {
        
        return view('admin.roles.index', [
            'roles' => Role::latest()->paginate(50)
        ]);
    }

    public function create() {
        return view('admin.roles.create');
    }

    public function store() {
        $attributes = $this->validateRole();
        $attributes['slug'] = \Illuminate\Support\Str::slug($attributes['name']);
        Role::create($attributes);

        return redirect('/admin/roles')->with('success', 'Role created successfully');

    }

    public function edit(Role $role) {

        return view('admin.roles.edit', ['role' => $role]);

    }

    public function update(Role $role) {
        $attributes = $this->validateRole($role);

        $role->update($attributes);

        return redirect('/admin/roles')->with('success', 'Role is updatd');
    }

    public function destroy(Role $role) {
        $role->delete();
        return back()->with('success', 'Role Deleted');
    }

    protected function validateRole(?Role $role = null) {
        $role ??= new Role();

        $validateRules = (function() use ($role) {
            $rules = ['name' => 'required'];
            if (!$role->exists) {
                $rules['slug'] = ['required', Rule::unique("roles", "slug")];
            }
            return $rules;
        })();

        return request()->validate($validateRules);

    }
}
