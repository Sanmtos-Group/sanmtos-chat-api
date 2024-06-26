<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('sender_id');
            $table->enum('message_type', ['text', 'file'])->default('text');
            $table->longText('message')->nullable();
            $table->string('media')->nullable();
            $table->uuid('chatable_id');
            $table->string('chatable_type');
            $table->timestamp('sender_read_at');
            $table->timestamps('receiver_read_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
