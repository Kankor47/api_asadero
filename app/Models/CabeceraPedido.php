<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabeceraPedido extends Model
{
    use HasFactory;
    protected $table="tbl_cabecera_pedido";
    protected $primaryKey = 'id_cabecera';
    public $timestamps=false;
}
