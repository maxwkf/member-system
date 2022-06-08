<?php

namespace Tests\Unit;

use Illuminate\Support\Carbon;
use Tests\TestCase;
use Illuminate\Support\Str;

class AdminUserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_store_user() {
        $name = 'Test Store User ' . (Carbon::now())->format('Ymd_His');
        $username = Str::slug($name);
        
        $userAttributes = [
            'name' => $name,
            'email' => $username . '@ms.com',
            'username' => $username,
            'password' => 'rootroot',
        ];
        $userRoles = ['admin','editor','asset-manager'];

        $user = \App\Models\User::create($userAttributes);

        $user->roles()->syncWithoutDetaching($userRoles);

        $this->assertTrue($user->roles()->count() == 3);
    }
    
    public function test_db() {
        $user = \App\Models\User::find(1);
        $this->assertTrue($user != null);
    }
}
