<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $role_user = Role::create([
            'name' => 'user',
            'guard_name' => 'web',
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
            'avatar' => null,
        ]);

        $admin->assignRole($role_admin);

        $user = User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@email.com',
            'password' => bcrypt('password'),
            'avatar' => null,
        ]);

        $user->assignRole($role_user);
    }
}
