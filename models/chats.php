<?php

class Conversations
{

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
        "chatable_id",
        "chatable_type",
        "sender_read_at",
        "receiver_read_at"
    ];


}