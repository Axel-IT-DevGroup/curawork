<?php

namespace App\Application\UserConnections;

use App\Http\Requests\UserConnections\ConnectionStoreRequest;
use App\Models\User;
use App\Models\UserConnections;

/**
 * Class StoreNewConnection
 */
class StoreNewConnection
{
    /**
     * @param  ConnectionStoreRequest  $request
     *
     * @return UserConnections
     */
    public static function store(ConnectionStoreRequest $request): UserConnections
    {
        /** @var User $sender */
        $sender = $request->user();
        $receiver = User::query()->findOrFail($request->get('user_id'));

        $connection = new UserConnections([
            'sender' => $sender->id,
            'receiver' => $receiver->id,
        ]);
        $connection->save();

        return $connection;
    }
}