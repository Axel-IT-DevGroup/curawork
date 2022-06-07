<?php

namespace App\Http\Requests\UserConnections;

use App\Models\UserConnections;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class ConnectionStoreRequest
 */
class ConnectionUpdateRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'status' => ['required', Rule::in(UserConnections::statuses())],
        ];
    }
}