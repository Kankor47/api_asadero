<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table="tbl_categoria";
    protected $primaryKey = "id_categoria";
    public $timestamps=false;
    protected $fillable = [
        'id_categoria', 
        'detalle_categoria'
    ];
}
