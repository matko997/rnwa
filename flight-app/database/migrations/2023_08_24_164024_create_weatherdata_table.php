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
        Schema::create('weatherdata', function (Blueprint $table) {
            $table->date('log_date');
            $table->time('time');
            $table->integer('station');
            $table->decimal('temp', 3, 1);
            $table->decimal('humidity', 4, 1);
            $table->decimal('airpressure', 10, 2);
            $table->decimal('wind', 5, 2);
            $table->enum('weather', [
                'Nebel-Schneefall', 'Schneefall', 'Regen', 'Regen-Schneefall',
                'Nebel-Regen', 'Nebel-Regen-Gewitter', 'Gewitter', 'Nebel', 'Regen-Gewitter'
            ])->nullable();
            $table->smallInteger('winddirection');
            $table->timestamps();

            $table->primary(['log_date', 'time', 'station']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weatherdata');
    }
};
