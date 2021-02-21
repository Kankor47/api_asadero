<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPlatillo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_platillo', function (Blueprint $table) {
            $table->increments('id_platillo');
            $table->integer("id_categoria")->unsigned();
            $table->integer("id_local")->unsigned();
            $table->string('nombre_platillo',200);
            $table->string('ingredientes',300);
            $table->double('costo', 8, 2); 
            $table->string('imagen',400);       
            $table->foreign("id_categoria")->references("id_categoria")->on("tbl_categoria")
            ->onDelete("cascade")
            ->onUpdate("cascade");
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
        Schema::dropIfExists('tbl_platillo');
    }
}
