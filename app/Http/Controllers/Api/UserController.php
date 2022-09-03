<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Profesor;
use App\Models\Tipousuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", "=", $request->email)->first();
        if(isset($user->id)){
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    "status" => 1,
                    "mensaje" => "Usuario logueado",
                    "user" => $user,
                    "error" => false,
                    "access_token" => $token
                ], 200);
            }else{
                return response()->json([
                    "status" => 0,
                    "mensaje" => "La contraseña es incorrecta",
                    "error" => true
                ], 404);
            }
        }else{
            return response()->json([
                "status" => 0,
                "mensaje" => "Credenciales incorrectas",
                "error" => true
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('tipousuario')->get();
        return response()->json($user, 200);
    }
    
    public function registro(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'usu_dni' => 'required|max:8|unique:users',
            'email' => 'required|email|unique:users',
            'usu_user' => 'required',
            'password' => 'required|min:4',
            'usu_dir' => 'required',
            'usu_telf' => 'required|max:9',
            'usu_rgst' => 'required',
            'tipousuario_id' => 'required'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->usu_dni = $request->usu_dni;
        $user->email  = $request->email;
        $user->usu_user = $request->usu_user;
        $user->password = Hash::make($request->password);
        $user->usu_dir = $request->usu_dir;
        $user->usu_telf = $request->usu_telf;
        $user->usu_rgst = $request->usu_rgst;
        $user->tipousuario_id = $request->tipousuario_id;
        $user->save();
        
        return response()->json([
            "status" => 1,
            "mensaje" => "Usuario registrado",
            "error" => false
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $user,
            "error" => false
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::FindOrFail($id);
        $user->name = $request->name;
        $user->usu_dni = $request->usu_dni;
        $user->email  = $request->email;
        $user->usu_user = $request->usu_user;
        $user->password = Hash::make($request->password);
        $user->usu_dir = $request->usu_dir;
        $user->usu_telf = $request->usu_telf;
        $user->usu_rgst = $request->usu_rgst;
        $user->tipousuario_id = $request->tipousuario_id;
        $user->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Usuario actualizado",
            "error" => false
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::FindOrFail($id);
        $user->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Usuarioa Eliminado",
            "error" => false
        ], 200);
    }
}
