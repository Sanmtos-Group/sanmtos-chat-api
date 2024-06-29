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
        Schema::create('sc_chats', function (Blueprint $table) {
            $table->uuid('id');

            $key_type = config('chat.chattable.primary_key_type');

            switch ($key_type) {
                 
                case 'uuid':
                    $table->foreignUuid('sender_id');
                    $table->uuid('chattable_id');
                    break;
                
                case 'ulid':
                    $table->foreignUlid('sender_id');
                    $table->foreignUlid('chattable_id');
                    break;

                case 'string':
                    $table->string('sender_id');
                    $table->foreign('sender_id');

                    $table->string('chattable_id');
                    break;
                   
                default:
                    $table->foreignId('sender_id');                   
                    $table->integer('chattable_id');
                    # code...
                    break;
            }

            $table->string('message_type')->default(\Sanmtos\Chat\Enums\MessageTypeEnum::Text->value);
            $table->longText('message')->nullable();
            $table->string('media')->nullable();
            $table->string('chattable_type');
            $table->timestamp('sender_read_at');
            $table->timestamp('receiver_read_at');
            $table->timestamps();
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
