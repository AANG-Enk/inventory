<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolePermissionSeeder::class);

        $user = User::create([
            'name'              => 'admin',
            'email'             => 'admin@gmail.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password'          => Hash::make('admin1234')
        ]);
        $user->assignRole('Admin');
    }
}
