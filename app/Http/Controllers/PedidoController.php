<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    //enlistar
    function listID($id_pedido=null){
        return $id_pedido?Pedido::find($id_pedido):Pedido::all();
    }

    //agregar
    function add(Request $req){
        $pedido=new Pedido;
        $pedido->deta_pedido=$req->deta_pedido;
        $result=$pedido->save();
        if($result){
            return ["Result"=>"Ok"];
        }
        else{
            return ["Result"=>"Error al agregar"];
        }
    }

    //actualizar
    function update(Request $req){
            $pedido= Pedido::find($req->id_pedido);
            $pedido ->deta_pedido=$req->deta_pedido;
            $result=$pedido->save();
            if($result){
                return ["Result"=>"ok"];
            }
            else{
                return ["Result"=>"Error de envio"];
            }
    }

    function delete($id_pedido){
        $pedido=Pedido::find($id_pedido);
        $result=$pedido->delete();
        if($result){
            return ["Result"=>"Valor eliminado"];
        }
        else{
            return ["Result"=>"No se pudo borrar"];
        }
    }

    function search($deta_pedido){
        return Pedido::where("deta_pedido",$deta_pedido)->get();
    }

    function testData(Request $req){
        $rules=array(
            "deta_pedido"=>"required"
        );
        $validator=Validator::make($req->all(),$rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),401);
        }
        else{
            $pedido=new Pedido;
            $pedido->deta_pedido=$req->deta_pedido;
            $result=$pedido->save();
            if($result){
                return ["Result"=>"Información agregada con exito"];
            }
            else{
                return ["Result"=>"Error al agregar"];
            }
        }
    }
}
