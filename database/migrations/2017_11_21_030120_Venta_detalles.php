<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VentaDetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('Venta_Detalles', function (Blueprint $table) {
            $table->integer('idventa');
            $table->foreign('idventa')->references('id')->on('Ventas');
            $table->integer('Codproducto');
            $table->integer('Talla');
            $table->integer('precio')->nullable(false);
            
            $table->foreign(array('Codproducto','Talla','precio'))->references(array('codigo','talla','precio_venta'))->on('products');
           
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
        //
    }
}
