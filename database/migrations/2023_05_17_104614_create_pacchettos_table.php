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
            Schema::create('pacchettos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('descrizione');
                $table->string('luogoFruizione');
                $table->string('modalità');
                $table->string('immagine');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacchettos');
    }
};
