<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserConnections;
use Illuminate\Database\Eloquent\Factories\Factory;
use Exception;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserConnectionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition(): array
    {
        $usersCount = User::query()->count();
        return [
            'sender' => '1',
            'receiver' => random_int(2, $usersCount),
            'status' => UserConnections::STATUS_SENT
        ];
    }

    /**
     * @return UserConnectionsFactory
     */
    public function accepted(): UserConnectionsFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => UserConnections::STATUS_ACCEPTED,
            ];
        });
    }

    /**
     * @return UserConnectionsFactory
     */
    public function withdrawn(): UserConnectionsFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => UserConnections::STATUS_WITHDRAWN,
            ];
        });
    }

    /**
     * @return UserConnectionsFactory
     */
    public function receiveSent(): UserConnectionsFactory
    {
        return $this->state(function (array $attributes) {
            $usersCount = User::query()->count();
            return [
                'sender' => random_int(2, $usersCount),
                'receiver' => 1,
                'status' => UserConnections::STATUS_SENT
            ];
        });
    }

    /**
     * @return UserConnectionsFactory
     */
    public function receiveAccepted(): UserConnectionsFactory
    {
        return $this->state(function (array $attributes) {
            $usersCount = User::query()->count();
            return [
                'sender' => random_int(2, $usersCount),
                'receiver' => 1,
                'status' => UserConnections::STATUS_ACCEPTED
            ];
        });
    }

    /**
     * @return UserConnectionsFactory
     */
    public function receiveWithdrawn(): UserConnectionsFactory
    {
        return $this->state(function (array $attributes) {
            $usersCount = User::query()->count();
            return [
                'sender' => random_int(2, $usersCount),
                'receiver' => 1,
                'status' => UserConnections::STATUS_WITHDRAWN
            ];
        });
    }
}
