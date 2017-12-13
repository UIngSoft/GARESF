<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class VentaDetalle extends Model
{
    protected $fillable = ['idventa','codProducto','talla','precio'];
}
