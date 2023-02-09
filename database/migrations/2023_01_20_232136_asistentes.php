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
        Schema::create('asistentes', function (Blueprint $table) {
            $table->bigIncrements('cod_asistente');

            $table->bigInteger('cod_caso')->unsigned();

            $table->string('nom_asistente');
            $table->string('last_asistente');
            $table->string('cargo');
            $table->string('email');
            $table->string('pass');
            $table->timestamps();

            $table->foreign('cod_caso')->references('cod_caso')->on('caso')->onDelete("cascade");
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
