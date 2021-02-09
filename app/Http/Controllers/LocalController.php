<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local;

class LocalController extends Controller
{
    //
    function listID($id_local=null){
        return $id_local?Local::find($id_local):Local::all();
    }

    function add(Request $req){
        $local=new Local;
        $local->nombre_local=$req->nombre_local;
        $local->direccion_local=$req->direccion_local;
        $local->id_platillo=$req->id_platillo;
        $result=$local->save();
        if($result){
            return ["Result"=>"Información agregada con exito"];
        }
        else{
            return ["Result"=>"Error al agregar"];
        }
    }
    
    function update(Request $req){
        $local= Local::find($req);
        $local->nombre_local=$req->nombre_local;
        $local->direccion_local=$req->direccion_local;
        $local->id_platillo=$req->id_platillo;
        $result=$local->save();
        if($result)
        {
            return ["Resulta"=>"Datos actualizados"];
        }
        else
        {
            return ["Resulta"=>"Error"];
        }
    }

    function delete($id_local){
        $local=Local::find($id_local);
        $result=$local->delete();
        if($result){
            return ["Result"=>"Valor eliminado"];
        }
        else{
            return ["Result"=>"No se pudo borrar"];
        }
    }

    function search($nombre_local){
        return Local::where("nombre_local",$nombre_local)->get();
    }

    function testData(Request $req){
        $rules=array(
            "deta_ingrediente"=>"required"
        );
        $validator=Validator::make($req->all(),$rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),401);
        }
        else{
            $ingrediente=new Ingredientes;
            $ingrediente->deta_ingrediente=$req->deta_ingrediente;
            $result=$ingrediente->save();
            if($result)
            {
                return ["Result"=>"Dato ingresado"];
            }
            else{
                return ["Result"=>"Error"];
            }
        }
    }
}
