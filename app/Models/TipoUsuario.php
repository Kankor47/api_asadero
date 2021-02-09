<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;
    protected $table="tbl_tipo_user";
    protected $primaryKey = 'id_tipo';
    public $timestamps=false;

}
