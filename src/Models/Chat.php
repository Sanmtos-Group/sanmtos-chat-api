<?php
namespace Sanmtos\Chat\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;


/**
 * Class Chat
 * @package Sanmtos\Chat\Models
 * @version 1.0.0
 *
 * @property string $id
 * @property integer|string  $sender_id
 * @property string $message_type
 * @property string $message
 * @property string $media
 * @property integer|string $chattable_id
 * @property string $chattable_type
 * @property string $sender_read_at
 * @property string $receiver_read_at
 */
class Chat extends Model
{

    use HasFactory;
    use HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sc_chats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $filliable = [
        "sender_id",
        "message_type",
        "message",
        "media",
        "chattable_id",
        "chattable_type",
        "sender_read_at",
        "receiver_read_at"
    ];

    /**
     * Get the parent chattable model (post or video).
     * 
     * @return Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function chattable(): MorphTo
    {
        return $this->morphTo();
    }
}