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
        Schema::create('coupon_pacs', function (Blueprint $table) {
            $table->string('utente');
            $table->integer('pacchetto')->unsigned();
            $table->increments('id');
            $table->date('dataAcquisto');
            $table->integer('sconto_agg');
        });

        Schema::table('coupon_pacs', function (Blueprint $table) {
            $table->foreign('pacchetto')->references('id')
                ->on('pacchettos');
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
        Schema::dropIfExists('coupon_pacs');
        }
};
