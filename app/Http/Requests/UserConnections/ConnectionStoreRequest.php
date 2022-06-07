<?php

namespace App\Http\Requests\UserConnections;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ConnectionStoreRequest
 */
class ConnectionStoreRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id'
        ];
    }
}