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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('start_location_long');
            $table->string('start_location_latit');
            $table->string('end_location_long');
            $table->string('end_location_latit');
            $table->float('distance');
            $table->dateTime('start_date');
            $table->float('price');
            $table->integer('max_seats');
            $table->integer('bike_capacity');
            $table->boolean('pets_allowed');
            $table->boolean('smokers_allowed');
            $table->boolean('lugagge');
            $table->unsignedBigInteger('carowner_id');
            $table->unsignedBigInteger('start_adventure_id');
            $table->unsignedBigInteger('end_adventure_id');
            $table->timestamps();
        });

        Schema::table('routes', function(Blueprint $table) {
            $table->foreign('carowner_id')->references('id')->on('users');
            $table->foreign('start_adventure_id')->references('id')->on('adventures');
            $table->foreign('end_adventure_id')->references('id')->on('adventures');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }


    
};
