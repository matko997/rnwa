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
        Schema::create('airport_geo', function (Blueprint $table) {
            $table->smallInteger('airport_id');
            $table->string('name', 50);
            $table->string('city', 50)->nullable();
            $table->string('country', 50)->nullable();
            $table->decimal('latitude', 11, 8);
            $table->decimal('longitude', 11, 8);
            $table->point('geolocation');
            $table->timestamps();

            $table->primary('airport_id');
            $table->spatialIndex('geolocation');
            $table->foreign('airport_id')->references('airport_id')->on('airport');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airport_geo');
    }
};
