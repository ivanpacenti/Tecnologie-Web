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
        Schema::create('aziendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('partitaIva',11);
            $table->string('nome');
            $table->string('posizione',);
            $table->string('descrizione',);
            $table->string('tipologia',);
            $table->string('logo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aziendas');
    }
};
