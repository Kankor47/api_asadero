<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_usuario', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('cedula',10);
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->string('telefono',11);
            $table->string('direccion',200);
            $table->string('email')->unique();
            $table->string('password');           
            $table->string('estado',1);
            $table->rememberToken();
            $table->integer("id_rol")->unsigned();
            $table->foreign("id_rol")->references("id_rol")->on("tbl_rol")
            ->onDelete("cascade")
            ->onUpdate("cascade");
            $table->integer("id_local")->unsigned()->nullable();
            $table->foreign("id_local")->references("id_local")->on("tbl_local")
            ->onDelete("cascade")
            ->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_usuario');
    }
}
