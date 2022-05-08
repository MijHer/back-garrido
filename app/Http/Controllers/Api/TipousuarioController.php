<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tipousuario;
use Illuminate\Http\Request;

class TipousuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipousuario = Tipousuario::get();
        return response()->json($tipousuario, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_nom' => 'required',            
            'estado' => 'required'
        ]);
        $tipousuario = new Tipousuario();
        $tipousuario->tipo_nom = $request->tipo_nom;
        $tipousuario->tipo_descripcion = $request->tipo_descripcion;
        $tipousuario->estado = $request->estado;        
        $tipousuario->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Rol de usuario registrado",
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
        $tipousuario = Tipousuario::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $tipousuario,
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
        $tipousuario = Tipousuario::FindOrFail($id);
        $tipousuario->tipo_nom = $request->tipo_nom;
        $tipousuario->tipo_descripcion = $request->tipo_descripcion;
        $tipousuario->estado = $request->estado;        
        $tipousuario->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Rol de usuario modificado",
            "error" => false
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipousuario = Tipousuario::FindOrFail($id);
        $tipousuario->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Rol de usuario Elimindo",
            "error" => false
        ], 200);
    }
}
