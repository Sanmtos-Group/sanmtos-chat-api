<?php
namespace Sanmtos\models;


use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Class Chat
 * @package Sanmtos\Chat\Models
 * @version 1.0.0
 *
 * @property uuid $id
 * @property integer|string  conversant1_id
 * @property integer|string  conversant1_id
 * @property string $message_type
 * @property string $message
 * @property string $media
 * @property integer|string $chattable_id
 * @property string $chattable_type
 * @property string $sender_read_at
 * @property string $receiver_read_at
 */

class Conversation extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sc_conversations';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $filliable = [
        "conversant1_id",
        "conversant2_id"
    ];

    /**
     * Get all of the converstaion's chat.
     * 
     * @return Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function chats(): MorphMany
    {
        return $this->morphMany(Comment::class, 'chattable');
    }
}