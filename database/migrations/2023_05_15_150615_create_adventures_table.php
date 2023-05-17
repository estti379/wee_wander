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
        Schema::create('adventures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('trail_id');
            $table->dateTime('start_date');
            $table->dateTime('due_date');
            $table->timestamps();
        });

        Schema::table('adventures', function(Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('trail_id')->references('id')->on('trails');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adventures');
    }

    
};
