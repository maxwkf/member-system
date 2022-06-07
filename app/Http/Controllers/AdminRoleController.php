<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    public function index() {
        
        return view('admin.roles.index', [
            'roles' => Role::latest()->paginate(50)
        ]);
    }
}
