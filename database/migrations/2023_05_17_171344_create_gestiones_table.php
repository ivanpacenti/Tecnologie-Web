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
        Schema::create('gestiones', function (Blueprint $table) {
            $table->string('utente');
            $table->integer('faq')->unsigned();


        });

        Schema::table('gestiones', function (Blueprint $table) {
            $table->foreign('faq')->references('id')
                ->on('faqs');
            $table->foreign('utente')->references('username')
                ->on('utentes');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gestiones');
    }
};
