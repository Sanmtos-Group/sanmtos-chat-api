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
        Schema::create('sc_conversations', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $key_type = config('chat.chattable.primary_key_type');

            switch ($key_type) {
                 
                case 'uuid':
                    $table->foreignUuid('conversant1_id');
                    $table->foreignUuid('conversant2_id');
                    break;
                
                case 'ulid':
                    $table->foreignUlid('conversant1_id');
                    $table->foreignUlid('conversant2_id');
                    break;

                case 'string':
                    $table->string('conversant1_id');
                    $table->foreign('conversant1_id');

                    $table->string('conversant2_id');
                    $table->foreign('conversant2_id');
                    break;
                   
                default:
                    $table->foreignId('conversant1_id');                   
                    $table->foreignId('conversant2_id');
                    break;
            }

            $table->timestamps();

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};
