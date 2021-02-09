<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'tbl_local';
    protected $primaryKey = 'id_local';
    public $timestamps=false;
    use HasFactory;
}
