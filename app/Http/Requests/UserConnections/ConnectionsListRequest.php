<?php

namespace App\Http\Requests\UserConnections;

use App\Models\UserConnections;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class ConnectionsListRequest
 */
class ConnectionsListRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'connectDirection' => ['nullable', Rule::in(UserConnections::directions())],
            'status' => ['nullable', Rule::in(UserConnections::statuses())],
            'page' => ['nullable', 'numeric'],
            'perPage' => ['nullable', 'numeric'],
        ];
    }
}