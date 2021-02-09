<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoUsuario;


class TipoUsuarioController extends Controller
{
    function listID($id=null){
        return $id?TipoUsuario::find($id):TipoUsuario::all();
    }

    function add(Request $request){
        $tipoUsuario= new TipoUsuario();
        $tipoUsuario->deta_tipo=$request->deta_tipo;
        $result=$tipoUsuario->save();
        if($result){
            return response()->json(["data"=>"Información agregada con exito"]);
           }else{
            return response()->json(["error"=>"Error al agregar información"]);
        }     
    }

    function update(Request $request){
       
        $tipoUsuario= TipoUsuario::find($request->id_tipo);
        $tipoUsuario->deta_tipo=$request->deta_tipo;
        $result=$tipoUsuario->save();
        if($result){
            return response()->json(["data"=>"Información actualizada con exito"]);
           }else{
            return response()->json(["error"=>"Error al actualizar la información"]);
        }    
    }

    function search($palabra_clave){
        return TipoUsuario::where("deta_tipo",$palabra_clave)->get();
    }
       

    function delete($id){
       
        $tipoUsuario= TipoUsuario::find($id);
        $result=$tipoUsuario->delete();
        if($result){
            return response()->json(["data"=>"Información eliminada con exito"]);
           }else{
            return response()->json(["error"=>"Error al eliminar la información"]);
        }     
    }
}
