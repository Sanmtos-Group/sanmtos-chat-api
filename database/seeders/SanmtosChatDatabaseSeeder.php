<?php

namespace Sanmtos\Chat\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SanmtosChatDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           ConversationSeeder::class,
           ChatSeeder::class,
        ]);
    }
}
