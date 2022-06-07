<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Make a test user */
        User::factory()
            ->create([
                'name' => 'test user',
                'email' => 'test@test.com',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now()
            ]);

        /** Make other users */
        User::factory()
            ->count(200)
            ->create();
    }
}
