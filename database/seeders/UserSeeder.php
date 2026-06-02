<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['role' => 'admin']);
        $editor = Role::create(['role' => 'editor']);
        $userRole = Role::create(['role' => 'user']);

        User::factory(10)->create()->each(function ($user) use ($userRole) {
            $user->roles()->sync([$userRole->id]);
        });
    }
}
