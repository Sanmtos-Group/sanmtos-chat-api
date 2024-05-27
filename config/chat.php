<?php

return [
    /*
    |--------------------------------------------------------------------------
    | The Chattable Model Primary Key Settings
    |--------------------------------------------------------------------------
    |
    | This value is the model field's that is set as the primary key
    |
    */
    'primary_key' => env('CHAT_PRIMARY_KEY', 'id'),

     /*
    |--------------------------------------------------------------------------
    | The Chattable Model Primary Key Type Settings
    |--------------------------------------------------------------------------
    |
    | This value is the data type of the model's primary key
    |
    */
    'primary_key_type' => env('CHAT_PRIMARY_KEY_TYPE', 'bigint'),
];