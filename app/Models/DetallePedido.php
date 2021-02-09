<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;
    protected $table="tbl_detalle_pedido";
    protected $primaryKey = 'id_detalle_pedido';
    public $timestamps=false;
}
