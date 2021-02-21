<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    
    static function rules()
    {
        return [
            'detalle_categoria' => 'required|string'
        ];
    }

    function get($id = null)
    {
        return $id ? Categoria::find($id) : Categoria::all();
    }

    function add(Request $request)
    {
        $validator = Validator::make($request->all(), CategoriaController::rules());           
        if ($validator->fails()) {
            return response()->json($validator->errors());      
        }else{
            $categoria = new Categoria([
                'detalle_categoria' => $request->detalle_categoria
            ]);   
            $result=$categoria->save();
            if($result){
                return response()->json(["data"=>"Información agregada con exito"]);
               }else{
                return response()->json(["error"=>"Error al agregar información"]);
            } 
        }
    }

    function update(Request $request)
    {
        $validator = Validator::make($request->all(), CategoriaController::rules());           
        if ($validator->fails()) {
            return response()->json($validator->errors());      
        }else{
            $categoria = Categoria::find($request->id_categoria);
            $categoria->detalle_categoria = $request->detalle_categoria;
            $result=$categoria->save();
            if($result){
                return response()->json(["data"=>"Información actualizada con exito"]);
               }else{
                return response()->json(["error"=>"Error al actualizar la información"]);
            } 
        } 
       
    }

    function delete($id)
    {
        $categoria = Categoria::find($id);
        $result = $categoria->delete();
        if($result){
            return response()->json(["data"=>"Información eliminada con exito"]);
           }else{
            return response()->json(["error"=>"Error al eliminar la información"]);
        }  
    }

    function search($key)
    {
        return Categoria::where("detalle_categoria", $key)->get();
    }
}
