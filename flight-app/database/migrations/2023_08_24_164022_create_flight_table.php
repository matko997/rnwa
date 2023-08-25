<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('flight', function (Blueprint $table) {
            $table->id('flight_id');
            $table->char('flightno', 8)->collation('utf8mb4_unicode_ci');
            $table->smallInteger('from');
            $table->smallInteger('to');
            $table->datetime('departure');
            $table->datetime('arrival');
            $table->smallInteger('airline_id');
            $table->unsignedBigInteger('airplane_id');
            $table->timestamps();

            $table->index('from');
            $table->index('to');
            $table->index('departure');
            $table->index('arrival');
            $table->index('airline_id');
            $table->index('airplane_id');
            $table->unique('flightno');
            $table->foreign('from')->references('airport_id')->on('airport');
            $table->foreign('to')->references('airport_id')->on('airport');
            $table->foreign('airline_id')->references('airline_id')->on('airline');
            $table->foreign('airplane_id')->references('airplane_id')->on('airplane');
            $table->foreign('flightno')->references('flightno')->on('flightschedule');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight');
    }
};
