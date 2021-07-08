<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create super-admin user
        $admin = User::create([
            'first_name' => 'Guido',
            'last_name' => 'Admin',
            'email' => 'admin@fundamental.nl',
            'password' => Hash::make('test123'),
        ]);
    }
}
