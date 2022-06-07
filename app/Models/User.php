<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 *
 * @property HasManyThrough sentConnections
 * @property HasManyThrough receiveConnections
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasManyThrough
     */
    public function sentConnections(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class,
            UserConnections::class,
            'sender',
            'id',
            'id',
            'receiver'
        );
    }

    /**
     * @return HasManyThrough
     */
    public function receiveConnections(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class,
            UserConnections::class,
            'receiver',
            'id',
            'id',
            'sender'
        );
    }
}
