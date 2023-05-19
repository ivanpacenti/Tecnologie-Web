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
        Schema::create('utentes', function (Blueprint $table) {
            $table->string('username')->primary();
            $table->string('email');
            $table->string('password');
            $table->integer('età');
            $table->integer('livelloAccesso');
            $table->enum('genere', ['Maschio', 'Femmina', 'Altro']);
            $table->string('telefono');
            $table->string('nome');
            $table->string('cognome');
            $table->boolean('membroSenior')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utentes');
    }
};



// breze gia mette questa e noi dobbiamo introdurre nome e cognome, il campo username e il campo role, definito come una stringa di 10 caratteri
// può essere admin o user, per il campo ruolo definiamo ruolo di defaul che è user, in sintesi definisco, questo crea la tabella andiamo a vedere il model
//public function up()
//{
//    Schema::create('users', function (Blueprint $table) {
//        $table->bigIncrements('id');
//        $table->string('name');
//        $table->string('surname');
//        $table->string('email');
//        $table->timestamp('email_verified_at')->nullable();
//        $table->string('username',20);
//        $table->string('password');
//        $table->string('role',10)->default('user');
//        $table->rememberToken();
//        $table->timestamps();
//    });
//}
