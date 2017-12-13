<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ventas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Ventas', function (Blueprint $table) {
           
            $table->integer('id');
            $table->primary('id');
            $table->integer('cedCliente')->nullable();
            $table->timestamp('fecha');
            $table->timestamp('garantia') -> nullable ();
            $table->integer('PrecioTotal');
            $table->double('iva', 11, 2);
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
