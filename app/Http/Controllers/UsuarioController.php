<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{

    static function rules()
    {
        return [
            'cedula' => 'required|string',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'telefono' => 'required|string',
            'direccion' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'estado' => 'required|string',
            'id_rol' => 'required',
            'id_local' => 'required'
        ];
    }

    function get($id = null)
    {
        return $id ? User::find($id) : User::all();
    }

    function add(Request $request)
    {
       
        $rules=UsuarioController::rules();
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $user = new User([
                'cedula' => $request->cedula,
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'estado' => $request->estado,
                'remember_token' => $request->remember_token,
                'id_rol' => $request->id_rol,
                'id_local' => $request->id_local
            ]);
            $result = $user->save();
            if ($result) {
                return response()->json(["data" => "Información agregada con exito"]);
            } else {
                return response()->json(["error" => "Error al agregar información"]);
            }
       }
    }



    function update(Request $request)
    {

        $usuario = User::find($request->id_usuario);
        $usuario->cedula = $request->cedula;
        $usuario->nombres = $request->nombres;
        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;
        $usuario->id_tipo = $request->id_tipo;
        $usuario->id_local = $request->id_local;
        $usuario->user = $request->user;
        $usuario->pass = $request->pass;
        $usuario->estado = $request->estado;
        $result = $usuario->save();
        if ($result) {
            return response()->json(["data" => "Información agregada con exito"]);
        } else {
            return response()->json(["error" => "Error al agregar información"]);
        }
    }

    function search($key)
    {
        return User::where("cedula", $key)->get();
    }
}
