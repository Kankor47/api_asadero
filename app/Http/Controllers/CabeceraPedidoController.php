<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CabeceraPedido;
use App\Models\DetallePedido;


class CabeceraPedidoController extends Controller
{
   
    function getAll()
    {

        return CabeceraPedido::all();
    }


    function listID($id)
    {
        $cabecera = CabeceraPedido::find($id);
        $detalle = DetallePedido::where("id_cabecera", $cabecera->id_cabecera)->get();
        return response()->json(["cabecera" => $cabecera, "detalle:" => $detalle]);
    }




    function add(Request $request)
    {
        $pedido = $request->json()->all();
        $cabecera = new CabeceraPedido;
        $cabecera->id_user = $pedido['cabecera']['id_user'];
        $cabecera->id_local = $pedido['cabecera']['id_local'];
        $cabecera->id_tipo_pedido = $pedido['cabecera']['id_tipo_pedido'];
        $cabecera->lugar_entrega = $pedido['cabecera']['lugar_entrega'];
        $cabecera->estado = $pedido['cabecera']['estado'];
        $cabecera->fecha = $pedido['cabecera']['fecha'];
        $cabecera->total = $pedido['cabecera']['total'];
        $cabecera->save();

        foreach ($pedido['detalle'] as $array) {
            $detalle = new DetallePedido;
            $detalle->id_cabecera = $array['id_cabecera'];
            $detalle->id_platillo = $array['id_platillo'];
            $detalle->nota = $array['nota'];
            $detalle->cantidad = $array['cantidad'];
            $detalle->sub_total = $array['sub_total'];
            $detalle->save();
        }
    }

}
