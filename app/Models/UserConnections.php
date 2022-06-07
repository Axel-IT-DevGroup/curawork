<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class UserConnectionsupdate
 *
 * @property User sender
 * @property User receiver
 * @property string status
 */
class UserConnections extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'status',
        'sender',
        'receiver',
    ];

    /**
     * List of users connections statuses
     */
    public const STATUS_SENT = 'sent';
    public const STATUS_WITHDRAWN = 'withdrawn';
    public const STATUS_ACCEPTED = 'accepted';
    public const STATUS_REJECTED = 'rejected';
    public const STATUS_REMOVED = 'removed';

    /**
     * List of connection directions
     */
    public const DIRECTION_SENT = 'sent';
    public const DIRECTION_RECEIVE = 'receive';
    public const DIRECTION_POTENTIAL = 'potential';

    /**
     * Return list of available statuses
     * @return string[]
     */
    public static function statuses(): array
    {
        return [
            self::STATUS_SENT,
            self::STATUS_WITHDRAWN,
            self::STATUS_ACCEPTED,
            self::STATUS_REJECTED,
            self::STATUS_REMOVED,
        ];
    }
    /**
     * Return list of available directions
     * @return string[]
     */
    public static function directions(): array
    {
        return [
            self::DIRECTION_RECEIVE,
            self::DIRECTION_SENT,
            self::DIRECTION_POTENTIAL,
        ];
    }

    /**
     * @return BelongsTo
     */
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'sender');
    }

    /**
     * @return BelongsTo
     */
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'receiver');
    }
}
