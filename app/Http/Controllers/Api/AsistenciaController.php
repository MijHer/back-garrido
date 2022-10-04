<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Asistencia;
use Illuminate\Http\Request;
class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencia = Asistencia::get();
        return response()->json([$asistencia, 
            "status" => 1,
            "mensaje" => "Asistencia registrada",
            "error" => false
        , 200]);
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
            'alumno_id' => 'required',
            'curso_id' => 'required',
            'anioacademico_id' => 'required',
            'hora' => 'required'
        ]);

        $asistencia = new Asistencia();
        $asistencia->alumno_id = $request->alumno_id;
        $asistencia->curso_id = $request->curso_id;
        $asistencia->anioacademico_id = $request->anioacademico_id;
        $asistencia->hora = $request->hora;
        $asistencia->asistencia = $request->asistencia;
        $asistencia->falta = $request->falta;
        $asistencia->tardanza = $request->tardanza;
        $asistencia->permiso = $request->permiso;
        $asistencia->save();

        return response()->json([
            "status" => 1,
            "mensaje" => "Asistencia registrada",
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
        $asistencia = Asistencia::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $asistencia,
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
        $asistencia = Asistencia::FindOrFail($id);
        $asistencia->alumno_id = $request->alumno_id;
        $asistencia->curso_id = $request->curso_id;
        $asistencia->anioacademico_id = $request->anioacademico_id;
        $asistencia->hora = $request->hora;
        $asistencia->asistencia = $request->asistencia;
        $asistencia->falta = $request->falta;
        $asistencia->tardanza = $request->tardanza;
        $asistencia->permiso = $request->permiso;
        $asistencia->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Asistencia Actualizada",
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
        $asistencia = Asistencia::FindOrFail($id);
        $asistencia->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Asistencia eliminda",
            "error" => false
        ], 200);
    }
}
