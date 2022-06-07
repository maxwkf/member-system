<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /**
         * Random Data
         */
        \App\Models\User::factory(10)->create();

        collect([
            "admin" => "Administrator",
            "editor" => "Editor",
            "asset-manager" => "Asset Manager",
            "member" => "Member",
        ])->each(function($name, $slug) {
            
            (new \App\Models\Role())->create([
                "slug" => $slug,
                "name" => $name,
            ]);
        });

        $roles = \App\Models\Role::all();

        \App\Models\User::all()->each(function (\App\Models\User $user) use ($roles) {
            $user->roles()->attach(
                [ $roles->where('id', rand(1, 3))->first()->slug, 'member']
            );
        });



        \App\Models\Post::factory(20)->create();

        /**
         * Dedicated Data
         */
        $name = 'Max Admin';
        \App\Models\User::create([
            'username' => Str::slug($name),
            'name' => $name,
            'email' => 'max-admin@ms.com',
            'email_verified_at' => now(),
            'password' => 'rootroot', // password
            'remember_token' => Str::random(10),
        ])->roles()->attach(['member','admin']);

        $name = 'Max Editor';
        \App\Models\User::create([
            'username' => Str::slug($name),
            'name' => $name,
            'email' => 'max-editor@ms.com',
            'email_verified_at' => now(),
            'password' => 'rootroot', // password
            'remember_token' => Str::random(10),
        ])->roles()->attach(['member','editor']);

        $name = 'Max Asset Manager';
        \App\Models\User::create([
            'username' => Str::slug($name),
            'name' => $name,
            'email' => 'max-asset-manager@ms.com',
            'email_verified_at' => now(),
            'password' => 'rootroot', // password
            'remember_token' => Str::random(10),
        ])->roles()->attach(['member','asset-manager']);
    }
}
