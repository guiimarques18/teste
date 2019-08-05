<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastro_veiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa')->unique();
            $table->biginteger('renavam');
            $table->string('modelo');
            $table->string('marca');
            $table->integer('ano');
            $table->string('proprietario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculo');
    }
}
