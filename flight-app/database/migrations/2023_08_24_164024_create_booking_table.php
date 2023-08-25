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
        Schema::create('booking', function (Blueprint $table) {
            $table->id('booking_id');
            $table->unsignedBigInteger('flight_id');
            $table->char('seat', 4)->nullable()->collation('utf8mb4_unicode_ci');
            $table->unsignedBigInteger('passenger_id')->unsigned();
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->index('flight_id');
            $table->index('passenger_id');
            $table->foreign('flight_id')->references('flight_id')->on('flight');
            $table->foreign('passenger_id')->references('passenger_id')->on('passenger');
            $table->unique(['flight_id', 'seat']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
