<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidoproducto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');

            $table->integer('idcliente')->unsigned();
            $table->integer('idproductolocal')->unsigned();

            $table->foreign('idcliente')->references('id')->on('cliente');
            $table->foreign('idproductolocal')->references('id')->on('productolocal');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PedidoProducto');
    }
}
