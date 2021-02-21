<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Platillo;

class PlatilloController extends Controller
{

    static function rules()
    {
        return [

            'id_categoria' => 'required|string',
            'id_local' => 'required|string',
            'nombre_platillo' => 'required|string',
            'ingredientes' => 'required|string',
            'costo' => 'required|string',
            'imagen' => 'required|string'
        ];
    }

    function get($id = null)
    {
        return $id ? Platillo::find($id) : Platillo::all();
    }

    function add(Request $request)
    {

        $validator = Validator::make($request->all(), PlatilloController::rules());
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $platillo = new Platillo([

                'id_categoria' => $request->id_categoria,
                'id_local' => $request->id_local,
                'nombre_platillo' => $request->nombre_platillo,
                'ingredientes' => $request->ingredientes,
                'costo' => $request->costo,
                'imagen' => $request->imagen
            ]);
            $result = $platillo->save();
            if ($result) {
                return response()->json(["data" => "Información agregada con exito"]);
            } else {
                return response()->json(["error" => "Error al agregar información"]);
            }
        }

        
    }

    function update(Request $request)
    {
      
        $validator = Validator::make($request->all(), PlatilloController::rules());
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $platillo = Platillo::find($request->id_platillo);
            $platillo->id_categoria = $request->id_categoria;
            $platillo->id_local = $request->id_local;
            $platillo->nombre_platillo = $request->nombre_platillo;
            $platillo->ingredientes = $request->ingredientes;
            $platillo->costo = $request->costo;
            $platillo->imagen = $request->imagen;
            $result = $platillo->save();
            if($result){
                return response()->json(["data"=>"Información actualizada con exito"]);
               }else{
                return response()->json(["error"=>"Error al actualizada la información"]);
            }
        }
    }

    function delete($id)
    {
        $platillo = Platillo::find($id);
        $result = $platillo->delete();
        if($result){
            return response()->json(["data"=>"Información eliminada con exito"]);
           }else{
            return response()->json(["error"=>"Error al eliminar la información"]);
        }  
    }

    function search($key)
    {
        return Platillo::where("nombre_platillo", $key)->get();
    }
}
