<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;

/**
 * Class UserSeeder
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Demo user',
            'email' => 'demo@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
        ];

        User::updateOrCreate($user);
    }
}
