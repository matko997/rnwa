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
        Schema::create('passenger', function (Blueprint $table) {
            $table->id('passenger_id');
            $table->char('passportno', 9)->collation('utf8mb4_unicode_ci');
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->timestamps();

            $table->unique('passportno');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passenger');
    }
};
