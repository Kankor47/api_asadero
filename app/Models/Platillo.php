<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    use HasFactory;
    protected $table="tbl_platillo";
    protected $primaryKey = "id_platillo";
    public $timestamps=false;
    protected $fillable = [
        'id_platillo', 
        'id_categoria',
        'id_local',
        'nombre_platillo',
        'ingredientes',
        'costo',
        'imagen'
    ];
}

