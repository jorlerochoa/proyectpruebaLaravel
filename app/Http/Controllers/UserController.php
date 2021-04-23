<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
Use App\User;

class UserController extends Controller
{
  public function index()
  {
      return User::all();

  }

  public function store(Request $request)
  {
        $user= new User();
        $user->nombre=$request->POST('nombre');
        $user->email=$request->POST('email');
        $user->password= Hash::make($request->POST('password'));
        $user->direccion=$request->POST('direccion');
        $user->ciudad=$request->POST('ciudad');
        $user->fecha_nacimiento=$request->POST('fecha_nacimiento');
        $user->save();

        return response()->json([
            'message' => 'usuario creado exitosamente!'
        ], 201);


  }
  public function update(Request $request)
  {

      $user=User::whereId($request->id)->first();

      $array=array('nombre'=>$request->POST('nombre'),
                   'direccion'=>$request->POST('direccion'),
                   'ciudad'=>$request->POST('ciudad')
                 );

      User::where('id', '=', $request->POST('id'))->update($array);

      return response()->json([
          'message' => 'El usuario se actualizo corectamente'
      ], 201);

    }

    public function login(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

         if (!is_null($user) && Hash::check($request->password, Hash::make($user->password))) {

            $token = $user->createToken('login')->accessToken;
            return response()->json(['token' => $token, 'id'=> $user->id,
                                     'nombre'=> $user->nombre,'direccion'=> $user->direccion,
                                      'ciudad'=> $user->ciudad, 'message' => "Bienvenido al sistema"]);
         }
         else
            return response()->json([ 'message' => "Cuenta a password incorrectos"],401);
    }
}
