<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
	protected $fillable = ['id','cedCliente','fecha','garantia','PrecioTotal','iva'];
	
}
