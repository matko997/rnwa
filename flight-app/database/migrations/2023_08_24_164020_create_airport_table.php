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
        Schema::create('airport', function (Blueprint $table) {
            $table->smallInteger('airport_id')->autoIncrement();
            $table->char('iata', 3)->nullable();
            $table->char('icao', 4);
            $table->string('name', 50);
            $table->timestamps();


            $table->unique('icao');
            $table->index('name');
            $table->index('iata');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airport');
    }
};
