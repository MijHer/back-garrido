<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Anioacademico;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\Profesor;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignacion = with('anioacademico', 'grado', 'curso', 'profesor');
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
            'anioacademico' => 'required'
        ]);
        $asignacion = new asignacion;
        $asignacion->curso_id = $request->curso_id;
        $asignacion->profesor_id = $request->profesor_id;
        $asignacion->grado_id = $request->grado_id;
        $asignacion->anioacademico = $request->anioacademico;
        $asignacion->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Curso Asignado",
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
