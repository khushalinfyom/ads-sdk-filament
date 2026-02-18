<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
                'name'              => 'Super Admin',
                'email'             => 'admin@ads.com',
                'email_verified_at' => Carbon::now(),
                'password'          => Hash::make('123456'),
        ];
        User::create($users);
    }
}
