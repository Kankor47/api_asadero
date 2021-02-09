<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table="tbl_usuario";
    protected $primaryKey = 'id_usuario';
    public $timestamps=false;

}
