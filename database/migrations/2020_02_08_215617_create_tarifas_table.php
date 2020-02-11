<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('valor');
            $table->unsignedBigInteger('origen_id');
            $table->unsignedBigInteger('destino_id');

            $table->foreign('origen_id')
                ->references('id')
                ->on('ubicaciones')
                ->onDelete('cascade');
            $table->foreign('destino_id')
                ->references('id')
                ->on('ubicaciones')
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
        Schema::dropIfExists('tarifas');
    }
}
