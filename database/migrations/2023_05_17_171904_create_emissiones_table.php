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
        Schema::create('emissiones', function (Blueprint $table) {
            $table->integer('azienda')->unsigned();
            $table->integer('offerta')->unsigned();
        });

        Schema::table('emissiones', function (Blueprint $table) {
            $table->foreign('offerta')->references('id')
                ->on('offertas');
            $table->foreign('azienda')->references('id')
                ->on('aziendas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emissiones');
    }
};
