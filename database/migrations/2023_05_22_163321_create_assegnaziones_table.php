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
        Schema::create('assegnaziones', function (Blueprint $table) {
            $table->string('utente');
            $table->integer('azienda')->unsigned();
        });

        Schema::table('assegnaziones', function (Blueprint $table) {
            $table->foreign('azienda')->references('id')
                ->on('aziendas');
            $table->foreign('utente')->references('username')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assegnaziones');
    }
};

