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
        Schema::create('route_participants', function (Blueprint $table) {
            $table->unsignedBigInteger('route_id');
            $table->unsignedBigInteger('participant_id');
            $table->timestamps();
        });

        Schema::table('route_participants', function(Blueprint $table) {
            $table->foreign('route_id')->references('id')->on('routes');
            $table->foreign('participant_id')->references('id')->on('users');
            $table->unique(['route_id', 'participant_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_participants');
    }
};
