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
        Schema::create('flight_log', function (Blueprint $table) {
            $table->increments('flight_log_id');
            $table->datetime('log_date');
            $table->string('user', 100);
            $table->unsignedBigInteger('flight_id');
            $table->char('flightno_old', 8)->collation('utf8mb4_unicode_ci');
            $table->char('flightno_new', 8)->collation('utf8mb4_unicode_ci');
            $table->smallInteger('from_old');
            $table->smallInteger('to_old');
            $table->smallInteger('from_new');
            $table->smallInteger('to_new');
            $table->datetime('departure_old');
            $table->datetime('arrival_old');
            $table->datetime('departure_new');
            $table->datetime('arrival_new');
            $table->unsignedBigInteger('airplane_id_old');
            $table->unsignedBigInteger('airplane_id_new');
            $table->smallInteger('airline_id_old');
            $table->smallInteger('airline_id_new');
            $table->string('comment', 200)->nullable();
            $table->timestamps();

            $table->index('log_date');
            $table->index('user');
            $table->index('flight_id');
            $table->index('flightno_old');
            $table->index('flightno_new');
            $table->index('from_old');
            $table->index('to_old');
            $table->index('from_new');
            $table->index('to_new');
            $table->index('airplane_id_old');
            $table->index('airplane_id_new');
            $table->index('airline_id_old');
            $table->index('airline_id_new');
            $table->foreign('flight_id')->references('flight_id')->on('flight');
            $table->foreign('flightno_old')->references('flightno')->on('flightschedule');
            $table->foreign('flightno_new')->references('flightno')->on('flightschedule');
            $table->foreign('from_old')->references('airport_id')->on('airport');
            $table->foreign('to_old')->references('airport_id')->on('airport');
            $table->foreign('from_new')->references('airport_id')->on('airport');
            $table->foreign('to_new')->references('airport_id')->on('airport');
            $table->foreign('airplane_id_old')->references('airplane_id')->on('airplane');
            $table->foreign('airplane_id_new')->references('airplane_id')->on('airplane');
            $table->foreign('airline_id_old')->references('airline_id')->on('airline');
            $table->foreign('airline_id_new')->references('airline_id')->on('airline');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_log');
    }
};
