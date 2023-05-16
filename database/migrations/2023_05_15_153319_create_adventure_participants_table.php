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
            $table->unsignedBigInteger('id_adventure');
            $table->unsignedBigInteger('id_participant');
            $table->timestamps();
        });

        Schema::table('adventure_participants', function(Blueprint $table) {
            $table->foreign('id_adventure')->references('id')->on('adventures');
            $table->foreign('id_participant')->references('id')->on('users');
            $table->unique(['id_adventure', 'id_participant']);
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
