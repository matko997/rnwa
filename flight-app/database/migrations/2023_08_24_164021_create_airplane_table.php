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
        Schema::create('airplane', function (Blueprint $table) {
            $table->id('airplane_id');
            $table->mediumInteger('capacity')->unsigned();
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('airline_id');
            $table->timestamps();

            $table->foreign('type_id')->references('type_id')->on('airplane_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airplane');
    }
};
