<?php

namespace App\Application\UserConnections;

use App\Http\Requests\UserConnections\ConnectionUpdateRequest;
use App\Models\UserConnections;

/**
 * Class UpdateConnection
 */
class UpdateConnection
{
    /**
     * @param  ConnectionUpdateRequest  $request
     * @param $id
     *
     * @return UserConnections
     */
    public static function update(ConnectionUpdateRequest $request, $id): UserConnections
    {
        /** @var UserConnections $connection */
        $connection = UserConnections::query()->findOrFail($id);
        $connection->status = $request->get('status');
        $connection->save();

        return $connection;
    }
}