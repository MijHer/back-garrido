<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Anioacademico;
use Illuminate\Http\Request;

class AnioacademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anioacademico = Anioacademico::get();
        return response()->json($anioacademico, 200);
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
            'anio_nom' => 'required'            
        ]);
        $anioacademico = new Anioacademico();
        $anioacademico->anio_nom = $request->anio_nom;
        $anioacademico->anio_detalle = $request->anio_detalle;
        $anioacademico->estado = $request->estado;
        $anioacademico->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Anio Academico Registrado",
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
        $anioacademico = Anioacademico::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $anioacademico,
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
        $anioacademico = Anioacademico::FindOrFail($id);
        $anioacademico->anio_nom = $request->anio_nom;
        $anioacademico->anio_detalle = $request->anio_detalle;
        $anioacademico->estado = $request->estado;
        $anioacademico->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Anio Academico Modificado",
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
        $anioacademico = Anioacademico::FindOrFail($id);
        $anioacademico->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Anio Academico Eliminado",
            "error" => false
        ], 200);
    }
}
