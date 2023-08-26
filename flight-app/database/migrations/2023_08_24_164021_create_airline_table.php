<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('airline', function (Blueprint $table) {
            $table->smallInteger('airline_id')->autoIncrement();
            $table->char('iata', 2);
            $table->string('airlinename', 30)->nullable();
            $table->smallInteger('base_airport');
            $table->timestamps();

            $table->unique('iata');
            $table->foreign('base_airport')->references('airport_id')->on('airport');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airline');
    }
};
