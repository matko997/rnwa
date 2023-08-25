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
        Schema::create('employee', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->date('birthdate');
            $table->char('sex', 1)->nullable();
            $table->string('street', 100);
            $table->string('city', 100);
            $table->smallInteger('zip');
            $table->string('country', 100);
            $table->string('emailaddress', 120)->nullable();
            $table->string('telephoneno', 30)->nullable();
            $table->decimal('salary', 8, 2)->nullable();
            $table->enum('department', ['Marketing', 'Buchhaltung', 'Management', 'Logistik', 'Flugfeld'])->nullable();
            $table->string('username', 20)->nullable();
            $table->char('password', 32)->nullable();
            $table->timestamps();

            $table->unique('username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
