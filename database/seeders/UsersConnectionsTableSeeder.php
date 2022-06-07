<?php

namespace Database\Seeders;

use App\Models\UserConnections;
use Illuminate\Database\Seeder;

class UsersConnectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Make sent connections */
        UserConnections::factory()
            ->count(10)
            ->create();

        /** Make accepted connections */
        UserConnections::factory()
            ->accepted()
            ->count(15)
            ->create();

        /** Make withdrawn connections */
        UserConnections::factory()
            ->withdrawn()
            ->count(9)
            ->create();

        /** Make receive sent connections */
        UserConnections::factory()
            ->receiveSent()
            ->count(6)
            ->create();

        /** Make receive accept connections */
        UserConnections::factory()
            ->receiveAccepted()
            ->count(16)
            ->create();

        /** Make receive withdrawn connections */
        UserConnections::factory()
            ->receiveWithdrawn()
            ->count(8)
            ->create();
    }
}
