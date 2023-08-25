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
        Schema::create('airplane_type', function (Blueprint $table) {
            $table->unsignedInteger('type_id');
            $table->string('identifier', 50)->nullable();
            $table->text('description');
            $table->timestamps();

            $table->primary('type_id');
            $table->fulltext(['identifier', 'description']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airplane_type');
    }
};
