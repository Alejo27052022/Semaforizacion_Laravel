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
        Schema::create('denuncia', function (Blueprint $table) {
            $table->bigIncrements('cod_denuncia');
            $table->bigInteger('ced_denunciante');

            $table->bigInteger('casos_id')->unsigned();
            $table->bigInteger('codigo_user')->unsigned();

            $table->string('victima');
            $table->string('victimario');
            $table->string('email_contacto');
            $table->bigInteger('num_contacto');
            $table->string('estatus');
            $table->timestamps();

            $table->foreign('casos_id')->references('id')->on('casos')->onDelete("cascade");
            $table->foreign('codigo_user')->references('codigo')->on('usuarios')->onDelete("cascade");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
