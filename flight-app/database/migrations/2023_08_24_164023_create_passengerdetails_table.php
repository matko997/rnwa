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
        Schema::create('passengerdetails', function (Blueprint $table) {
            $table->id('passenger_id');
            $table->date('birthdate');
            $table->char('sex', 1)->nullable();
            $table->string('street', 100);
            $table->string('city', 100);
            $table->smallInteger('zip');
            $table->string('country', 100);
            $table->string('emailaddress', 120)->nullable();
            $table->string('telephoneno', 30)->nullable();
            $table->timestamps();

            $table->foreign('passenger_id')->references('passenger_id')->on('passenger')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passengerdetails');
    }
};
