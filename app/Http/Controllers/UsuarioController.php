<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    function listID($id=null){
        return $id?Usuario::find($id):Usuario::all();
    }

    function add(Request $request){
        $usuario= new Usuario;
        $usuario->cedula=$request->cedula;
        $usuario->nombres=$request->nombres;
        $usuario->telefono=$request->telefono;
        $usuario->direccion=$request->direccion;
        $usuario->id_tipo=$request->id_tipo;
        $usuario->id_local=$request->id_local;
        $usuario->user=$request->user;
        $usuario->pass=$request->pass;
        $usuario->estado=$request->estado;
        $result=$usuario->save();
        if($result){
            return response()->json(["data"=>"Información agregada con exito"]);
           }else{
            return response()->json(["error"=>"Error al agregar información"]);
        }      
    }

    function update(Request $request){
       
        $usuario= Usuario::find($request->id_usuario);
        $usuario->cedula=$request->cedula;
        $usuario->nombres=$request->nombres;
        $usuario->telefono=$request->telefono;
        $usuario->direccion=$request->direccion;
        $usuario->id_tipo=$request->id_tipo;
        $usuario->id_local=$request->id_local;
        $usuario->user=$request->user;
        $usuario->pass=$request->pass;
        $usuario->estado=$request->estado;
        $result=$usuario->save();
        if($result){
            return response()->json(["data"=>"Información agregada con exito"]);
           }else{
            return response()->json(["error"=>"Error al agregar información"]);
        }     
    }

    function search($palabra_clave){
        return Usuario::where("cedula",$palabra_clave)->get();
    }
}
