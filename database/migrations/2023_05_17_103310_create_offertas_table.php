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
            Schema::create('offertas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('modalità',100);
                $table->string('immagine',100)->nullable();
                $table->string('luogoFruizione',100);
                $table->string('descrizione',250);
                $table->date('dataInizio');
                $table->date('dataFine');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offertas');
    }
};
