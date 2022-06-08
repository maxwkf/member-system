<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The fillable here will block the creation of a new user, use no guard
     */
    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];


    // protected $guarded = [];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Before Laravel 9.x
     */
    // public function setPasswordAttribute($password) {
    //     $this->attributes['password'] = bcrypt($password);
    // }

    /**
     * Laravel 9.x
     */
    /**
     * Interact with the user's password
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => bcrypt($value)
        );
    }


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function roles() {
        // dd($this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_slug',null,'role_slug')->toSql());
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_slug',null,'slug');
    }

    public function hasRoles($roles = []) {
        return $this->roles()->where('slug',
            is_array($roles) ? $roles : [$roles]
        )->exists();
    }

    public function hasRole($role) {
        return $this->hasRoles($role);
    }
    
}
