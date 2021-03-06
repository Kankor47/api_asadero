<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;
    protected $table="tbl_local";
    protected $primaryKey = "id_local";
    public $timestamps=false;
    protected $fillable = [
        'id_local', 
        'nombre_local',
        'direccion_local'
    ];
}
