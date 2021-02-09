<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'tbl_pedido';
    protected $primaryKey = 'id_pedido';
    public $timestamps=false;
    use HasFactory;
}
