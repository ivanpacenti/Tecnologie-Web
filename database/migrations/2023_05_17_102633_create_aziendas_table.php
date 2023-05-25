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
            $table->string('partitaIva',11)->default('XXXXX-XXXXX');
            $table->string('nome')->nullable();
            $table->string('posizione',)->nullable();
            $table->string('descrizione',)->nullable();
            $table->string('tipologia',)->nullable();
            $table->string('logo')->default('img/img_Logo.png')->nullable();
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
