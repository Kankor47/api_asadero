<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Rol;

class RolController extends Controller
{

    static function rules()
    {
        return [
            'nombre_rol' => 'required|string'
        ];
    } 

    function get($id=null){
        return $id?Rol::find($id):Rol::all();
    }

    function add(Request $request){      
        
        $validator = Validator::make($request->all(), RolController::rules());           
        if ($validator->fails()) {
            return response()->json($validator->errors());      
        }else{
            $rol = new Rol([
                'nombre_rol' => $request->nombre_rol
            ]);   
            $result=$rol->save();
            if($result){
                return response()->json(["data"=>"Información agregada con exito"]);
               }else{
                return response()->json(["error"=>"Error al agregar información"]);
            } 
        }
            
    }

    function update(Request $request){
              
        $validator = Validator::make($request->all(), RolController::rules());           
        if ($validator->fails()) {
            return response()->json($validator->errors() );      
        }else{
            $rol = Rol::find($request->id_rol);
            $rol->nombre_rol=$request->nombre_rol;
            $result=$rol->save();
            if($result){
                return response()->json(["data"=>"Información actualizada con exito"]);
               }else{
                return response()->json(["error"=>"Error al actualizar la información"]);
            } 
        }          
    }

    function search($key){
        return Rol::where("nombre_rol",$key)->get();
    }
       
    function delete($id){        
        $rol= Rol::find($id);
        $result=$rol->delete();
        if($result){
            return response()->json(["data"=>"Información eliminada con exito"]);
           }else{
            return response()->json(["error"=>"Error al eliminar la información"]);
        }     
    }
}
