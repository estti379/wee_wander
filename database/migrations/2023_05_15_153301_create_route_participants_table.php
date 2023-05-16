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
            $table->unsignedBigInteger('id_route');
            $table->unsignedBigInteger('id_participant');
            $table->timestamps();
        });

        Schema::table('route_participants', function(Blueprint $table) {
            $table->foreign('id_route')->references('id')->on('routes');
            $table->foreign('id_participant')->references('id')->on('users');
            $table->unique(['id_route', 'id_participant']);
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
