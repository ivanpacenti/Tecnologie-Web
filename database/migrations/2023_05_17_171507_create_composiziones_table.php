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
        Schema::create('composiziones', function (Blueprint $table) {
            $table->integer('offerta')->unsigned();
            $table->integer('pacchetto')->unsigned();
        });

        Schema::table('composiziones', function (Blueprint $table) {
            $table->foreign('offerta')->references('id')
                ->on('offertas');
            $table->foreign('pacchetto')->references('id')
                ->on('pacchettos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('composiziones');
    }
};
