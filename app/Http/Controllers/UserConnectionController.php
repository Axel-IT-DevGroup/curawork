<?php

namespace App\Http\Controllers;

use App\Application\UserConnections\GetUserConnectionsList;
use App\Application\UserConnections\StoreNewConnection;
use App\Application\UserConnections\UpdateConnection;
use App\Http\Requests\UserConnections\ConnectionsListRequest;
use App\Http\Requests\UserConnections\ConnectionStoreRequest;
use App\Http\Requests\UserConnections\ConnectionUpdateRequest;

/**
 * Class UserConnectionController
 */
class UserConnectionController extends Controller
{
    /**
     * @param  ConnectionsListRequest  $request
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function index(ConnectionsListRequest $request)
    {
        return GetUserConnectionsList::get($request);
    }

    /**
     * @param  ConnectionStoreRequest  $request
     *
     * @return \App\Models\UserConnections
     */
    public function store(ConnectionStoreRequest $request)
    {
        return StoreNewConnection::store($request);
    }

    /**
     * @param  ConnectionUpdateRequest  $request
     * @param $id
     *
     * @return \App\Models\UserConnections
     */
    public function update(ConnectionUpdateRequest $request, $id)
    {
        return UpdateConnection::update($request, $id);
    }
}