<?php

namespace App\Application\UserConnections;

use App\Http\Requests\UserConnections\ConnectionsListRequest;
use App\Models\User;
use App\Models\UserConnections;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class GetUserConnectionsList
 */
class GetUserConnectionsList
{
    /**
     * @param  ConnectionsListRequest  $request
     *
     * @return LengthAwarePaginator
     */
    public static function get(ConnectionsListRequest $request): LengthAwarePaginator
    {
        $direction = $request->get('connectDirection');
        /** @var User $user */
        $user = $request->user();
        $query = UserConnections::query();

        switch ($direction) {
            case UserConnections::DIRECTION_POTENTIAL:
                $query = User::query()->whereNotIn('id', array_merge(
                    $user->sentConnections->pluck('id')->toArray(),
                    $user->receiveConnections->pluck('id')->toArray(),
                    [$user->id]
                ));
                break;

            case UserConnections::DIRECTION_SENT;
                $query = $query->where('sender', $user->id);
                if ($status = $request->get('status')) {
                    $query->where('status', $status);
                }
                break;

            case UserConnections::DIRECTION_RECEIVE:
                $query = $query->where('receiver', $user->id);
                if ($status = $request->get('status')) {
                    $query->where('status', $status);
                }
                break;
            default:
                $query = $query->where(function ($query) use ($user) {
                    $query->where('receiver', $user->id)->orWhere('sender', $user->id);
                });

                if ($status = $request->get('status')) {
                    $query->where('status', '=', $status, 'and');
                }

                break;
        }

        return $query->paginate(
            $perPage = $request->get('perPage', 15),
            $columns = ['*'],
            $pageName = 'page',
            $page = $request->get('page', 1)
        );
    }
}
