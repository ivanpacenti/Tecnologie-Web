<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utentes', function (Blueprint $table) {
            $table->string('username')->primary();
            $table->string('email');
            $table->string('password');
            $table->integer('età');
            $table->integer('livelloAccesso');
            $table->enum('genere', ['Maschio', 'Femmina', 'Altro']);
            $table->string('telefono');
            $table->string('nome');
            $table->string('cognome');
            $table->boolean('membroSenior')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utentes');
    }
};
