<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('codigo')->nullable(false);
            $table->integer('talla')->nullable(false);
            $table->integer('cantidad')->nullable(false);
            $table->integer('precio_compra')->nullable(false);
            $table->integer('precio_venta')->nullable(false);
            $table->string('tipo_producto')->nullable(false);
            $table->timestamps();

            $table->primary(['codigo', 'talla','precio_venta']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
