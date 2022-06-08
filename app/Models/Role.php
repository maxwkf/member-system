<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class Role extends Model
{
    use HasFactory;

    public function users() {        
        return $this->belongsToMany(User::class, 'role_user', 'role_slug', 'user_id');
    }

    static public function htmlOptionPairs() {
        $roles = Role::all();

        return $roles->map(function(Role $role) {
            $stdClass = new stdClass();
            $stdClass->id = $role->slug;
            $stdClass->name = $role->name;
            return $stdClass;
        })->toArray();
    }
}
