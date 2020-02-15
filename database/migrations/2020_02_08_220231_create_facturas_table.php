<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total');

            $table->unsignedBigInteger('pasajero_id');
            $table->unsignedBigInteger('vehiculo_id');
            $table->unsignedBigInteger('metodo_pago_id');
            $table->unsignedBigInteger('tarifa_id');

            $table->foreign('pasajero_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('vehiculo_id')
                ->references('id')
                ->on('vehiculos')
                ->onDelete('cascade');
            $table->foreign('metodo_pago_id')
                ->references('id')
                ->on('metodos_pago')
                ->onDelete('cascade');
            $table->foreign('tarifa_id')
                ->references('id')
                ->on('tarifas')
                ->onDelete('cascade');

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
        Schema::dropIfExists('facturas');
    }
}
