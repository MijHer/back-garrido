<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
USE App\Models\Calificacion;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calificacion = Calificacion::get();
        return response()->json($calificacion, 200);
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
            'profesor_id' => 'required',
            'anioacademico_id' => 'required',
            'nota1' => 'required',
            'nota2' => 'required',
            'nota3' => 'required',
            'nota4' => 'required',
            'fecha' => 'required'
        ]);

        $calificacion = new Calificacion();
        $calificacion->alumno_id = $request->alumno_id;
        $calificacion->curso_id = $request->curso_id;
        $calificacion->profesor_id = $request->profesor_id;
        $calificacion->anioacademico_id = $request->anioacademico_id;
        $calificacion->nota1 = $request->nota1;
        $calificacion->nota2 = $request->nota2;
        $calificacion->nota3 = $request->nota3;
        $calificacion->nota4 = $request->nota4;
        $calificacion->fecha = $request->fecha;
        $calificacion->obs = $request->obs;
        $calificacion->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Calificacion registrada",
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
        $calificacion = Calificacion::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $calificacion,
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
        $calificacion = Calificacion::FindOrFail($id);
        $calificacion->alumno_id = $request->alumno_id;
        $calificacion->curso_id = $request->curso_id;
        $calificacion->profesor_id = $request->profesor_id;
        $calificacion->anioacademico_id = $request->anioacademico_id;
        $calificacion->nota1 = $request->nota1;
        $calificacion->nota2 = $request->nota2;
        $calificacion->nota3 = $request->nota3;
        $calificacion->nota4 = $request->nota4;
        $calificacion->fecha = $request->fecha;
        $calificacion->obs = $request->obs;
        $calificacion->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Calificacion actualizada",
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
        $calificacion = Calificacion::FindOrFail($id);
        $calificacion->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Calificacion eliminada",
            "error" => false
        ], 200);
    }
}
