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
        Schema::create('conversation_group', function (Blueprint $table) {
            $table->unsignedBigInteger('conversation_id');
            $table->unsignedBigInteger('group_id');
            $table->timestamps();

            $table->foreign('conversation_id')->references('id')->on('conversations');
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversation_group');
    }
};
