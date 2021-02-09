<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    protected $table = 'tbl_platillo';
    protected $primaryKey = 'id_platillo';
    public $timestamps=false;
    use HasFactory;
}
