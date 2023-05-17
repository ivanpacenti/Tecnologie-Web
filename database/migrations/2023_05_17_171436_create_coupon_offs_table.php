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
        Schema::create('coupon_offs', function (Blueprint $table) {
            $table->string('utente');
            $table->integer('offerta')->unsigned();
            $table->increments('id');
            $table->timestamps(null);
        });

        Schema::table('coupon_offs', function (Blueprint $table) {
            $table->foreign('offerta')->references('id')
                ->on('offertas');
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
        Schema::dropIfExists('coupon_offs');
    }
};
