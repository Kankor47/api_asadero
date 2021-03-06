<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Local;

class LocalController extends Controller
{

    static function rules()
    {
        return [
            'nombre_local' => 'required|string',
            'direccion_local' => 'required|string',
        ];
    }

    function get($id = null)
    {
        return $id ? Local::find($id) : Local::all();
    }

    function add(Request $request)
    {
        $validator = Validator::make($request->all(), LocalController::rules());           
        if ($validator->fails()) {
            return response()->json($validator->errors() );      
        }else{
            $local = new Local([
                'nombre_local' => $request->nombre_local,
                'direccion_local'=>$request->direccion_local
            ]);   
            $result=$local->save();
            if($result){
                return response()->json(["data"=>"Información agregada con exito"]);
               }else{
                return response()->json(["error"=>"Error al agregar información"]);
            } 
        }
    }

    function update(Request $request)
    {
        $validator = Validator::make($request->all(), LocalController::rules());           
        if ($validator->fails()) {
            return response()->json($validator->errors());      
        }else{
            $local = Local::find($request->id_local);
            $local->nombre_local = $request->nombre_local;
            $local->direccion_local = $request->direccion_local;
            $result=$local->save();
            if($result){
                return response()->json(["data"=>"Información actualizada con exito"]);
               }else{
                return response()->json(["error"=>"Error al actualizar la información"]);
            } 
        } 
       
    }

    function delete($id)
    {
        $local = Local::find($id);
        $result = $local->delete();
        if($result){
            return response()->json(["data"=>"Información eliminada con exito"]);
           }else{
            return response()->json(["error"=>"Error al eliminar la información"]);
        }  
    }

    function search($key)
    {
        return Local::where("nombre_local", $key)->get();
    }
}
