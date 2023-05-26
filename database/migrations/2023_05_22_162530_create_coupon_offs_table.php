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
            $table->string('utente')->nullable();
            $table->integer('offerta')->unsigned();
            $table->increments('id');
            $table->timestamps(null);
        });

        Schema::table('coupon_offs', function (Blueprint $table) {
            $table->foreign('offerta')->references('id')
                ->on('offertas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('utente')->references('username')
                ->on('users')->onUpdate('cascade')->onDelete('set null');
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
