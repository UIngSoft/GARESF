<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['codigo', 'talla', 'cantidad', 'precio_compra', 'precio_venta', 'tipo_producto'];

    protected $primaryKey = 'codigo';
}
