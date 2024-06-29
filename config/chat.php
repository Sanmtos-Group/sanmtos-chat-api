<?php

return [

    /*
    |--------------------------------------------------------------------------
    | The Chattable Model Settings
    |--------------------------------------------------------------------------
    |
    |
    */
    'chattable' => [

        /**
         * This is the model field's that is set as the primary key
         */ 
        'primary_key' => env('SANMTOS_CHATTABLE_PRIMARY_KEY', 'id'),

        /**
         *  This is the data type of the model's primary key
         */
        'primary_key_type' => env('SANMTOS_CHATTABLE_PRIMARY_KEY_TYPE', 'integer'),
    ],

    'providers' => [
        // Other service providers...
        Sanmtos\Chat\ChatServiceProvider::class,
    ],
];