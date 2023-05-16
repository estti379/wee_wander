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
            $table->unsignedBigInteger('id_event');
            $table->unsignedBigInteger('id_trail');
            $table->dateTime('start_date');
            $table->dateTime('due_date');
            $table->timestamps();
        });

        Schema::table('adventures', function(Blueprint $table) {
            $table->foreign('id_event')->references('id')->on('events');
            $table->foreign('id_trail')->references('id')->on('trails');
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
