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
        Schema::create('flightschedule', function (Blueprint $table) {
            $table->char('flightno', 8);
            $table->smallInteger('from');
            $table->smallInteger('to');
            $table->time('departure');
            $table->time('arrival');
            $table->smallInteger('airline_id');
            $table->boolean('monday')->default(0);
            $table->boolean('tuesday')->default(0);
            $table->boolean('wednesday')->default(0);
            $table->boolean('thursday')->default(0);
            $table->boolean('friday')->default(0);
            $table->boolean('saturday')->default(0);
            $table->boolean('sunday')->default(0);
            $table->timestamps();

            $table->primary('flightno');
            $table->index('from');
            $table->index('to');
            $table->index('airline_id');
            $table->foreign('from')->references('airport_id')->on('airport');
            $table->foreign('to')->references('airport_id')->on('airport');
            $table->foreign('airline_id')->references('airline_id')->on('airline');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flightschedule');
    }
};
