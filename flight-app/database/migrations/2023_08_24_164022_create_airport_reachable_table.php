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
        Schema::create('airport_reachable', function (Blueprint $table) {
            $table->smallInteger('airport_id');
            $table->integer('hops')->nullable();
            $table->timestamps();

            $table->foreign('airport_id')->references('airport_id')->on('airport');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airport_reachable');
    }
};
