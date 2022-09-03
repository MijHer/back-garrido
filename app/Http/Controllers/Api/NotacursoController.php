<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notacurso;
use Illuminate\Http\Request;

class NotacursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notacurso = Notacurso::get();
        return response()->json($notacurso, 200);
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
            'obs' => 'required',            
        ]);
        $notacurso = new Notacurso();
        $notacurso->alumno_id = $request->alumno_id;
        $notacurso->curso_id = $request->curso_id;
        $notacurso->profesor_id = $request->profesor_id;
        $notacurso->anoacademico_id = $request->anoacademico_id;
        $notacurso->nota1 = $request->nota1;
        $notacurso->nota2 = $request->nota2;
        $notacurso->nota3 = $request->nota3;
        $notacurso->nota4 = $request->nota4;
        $notacurso->obs = $request->obs;
        $notacurso->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Curso registrado",
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
        $notacurso = Notacurso::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $notacurso,
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
        $notacurso = Notacurso::FindOrFail($id);
        $notacurso->alumno_id = $request->alumno_id;
        $notacurso->curso_id = $request->curso_id;
        $notacurso->profesor_id = $request->profesor_id;
        $notacurso->anoacademico_id = $request->anoacademico_id;
        $notacurso->nota1 = $request->nota1;
        $notacurso->nota2 = $request->nota2;
        $notacurso->nota3 = $request->nota3;
        $notacurso->nota4 = $request->nota4;
        $notacurso->obs = $request->obs;     
        $notacurso->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Curso Actualizado",
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
        $notacurso = Notacurso::FindOrFail($id);
        $notacurso->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Nota Elimindo",
            "error" => false
        ], 200);
    }
}
