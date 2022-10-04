<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asignacion;
use App\Models\Curso;
use App\Models\Profesor;
use App\Models\Grado;
use App\Models\Anioacademico;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignacion = Asignacion::with('curso', 'profesor', 'grado', 'anioacademico')->paginate();
        return response()->json($asignacion, 200);
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
            'curso_id' => 'required',
            'profesor_id' => 'required',
            'grado_id' => 'required',
            'anioacademico_id' => 'required',
            'estado' => 'required'
        ]);

        $asignacion = new Asignacion();
        $asignacion->curso_id = $request->curso_id;
        $asignacion->profesor_id = $request->profesor_id;
        $asignacion->grado_id = $request->grado_id;
        $asignacion->anioacademico_id = $request->anioacademico_id;
        $asignacion->estado = $request->estado;
        $asignacion->save();

        return response()->json([
            "status" => 1,
            "mensaje" => "Asignacion de curso realizado",
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
        $asignacion = Asignacion::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $asignacion,
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
        $asignacion = Asignacion::FindOrFail($id);
        $asignacion->curso_id = $request->curso_id;
        $asignacion->profesor_id = $request->profesor_id;
        $asignacion->grado_id = $request->grado_id;
        $asignacion->anioacademico_id = $request->anioacademico_id;
        $asignacion->estado_id = $request->estado_id;
        $asignacion->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Asignacion Actualizada",
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
        $asignacion = Asignacion::FindOrFail($id);
        $asignacion->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Asignacion eliminada",
            "error" => false
        ], 200);
    }
}
