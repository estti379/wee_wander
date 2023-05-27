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
        Schema::create('adventure_participants', function (Blueprint $table) {
            $table->unsignedBigInteger('adventure_id');
            $table->unsignedBigInteger('participant_id');
            $table->timestamps();
        });

        Schema::table('adventure_participants', function(Blueprint $table) {
            $table->foreign('adventure_id')->references('id')->on('adventures');
            $table->foreign('participant_id')->references('id')->on('users');
            $table->unique(['adventure_id', 'participant_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adventure_participants');
    }
};
