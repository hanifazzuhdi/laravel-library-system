<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'  => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password'  => bcrypt('password')
        ]);

        $user->assignRole('admin');
    }
}
