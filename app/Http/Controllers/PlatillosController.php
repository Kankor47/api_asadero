<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platillo;
use Validator;
class PlatillosController extends Controller
{
    function listID($id_platillo=null){
        return $id_platillo?Platillo::find($id_platillo):Platillo::all();
    }

    function add(Request $req){
        $platillo=new Platillo;
        $platillo->nombre_platillo=$req->nombre_platillo;
        $platillo->ingrediente=$req->ingrediente;
        $platillo->costo=$req->costo;
        $platillo->foto=$req->foto;
        $result=$platillo->save();
        if($result){
            return ["Result"=>"Información agregada con exito"];
        }
        else{
            return ["Result"=>"Error al agregar"];
        }
    }

    function update(Request $req){
        $rules=array(
            "nombre_platillo"=>"required",
            "ingrediente"=>"required",
            "costo"=>"required",
            "foto"=>"required"
        );
        $validator=Validator::make($req->all(),$rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),401);
        }
        else{
            $platillo= Platillo::find($req->id_platillo);
            $platillo->nombre_platillo=$req->nombre_platillo;
            $platillo->ingrediente=$req->ingrediente;
            $platillo->costo=$req->costo;
            $platillo->foto=$req->foto;
            $result=$platillo->save();
            if($result)
            {
            return ["Result"=>"Datos actualizados"];
        }
        else
        {
            return ["Result"=>"Error"];
        }
        }
        
        
    }

    function delete($id_platillo){
        $platillo=Platillo::find($id_platillo);
        $result=$platillo->delete();
        if($result){
            return ["Result"=>"Valor eliminado"];
        }
        else{
            return ["Result"=>"No se pudo borrar"];
        }
    }

    function search($nombre_platillo){
        return Platillo::where("nombre_platillo",$nombre_platillo)->get();
    }

    function testData(Request $req){
        $rules=array(
            "nombre_platillo"=>"required",
            "ingrediente"=>"ingrediente",
            "costo"=>"required",
            "foto"=>"required"
        );
        $validator=Validator::make($req->all(),$rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),401);
        }
        else{
            $platillo=new Platillo;
            $platillo->nombre_platillo=$req->nombre_platillo;
            $platillo->ingrediente=$req->ingrediente;
            $platillo->costo=$req->costo;
            $platillo->foto=$req->foto;
            $result=$platillo->save();
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
