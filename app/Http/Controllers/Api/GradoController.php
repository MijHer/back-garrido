<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Grado;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grado = Grado::with('cursos')->get();
        return response()->json($grado, 200);
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
            'gra_nom' => 'required',
            'gra_seccion' => 'required',
            'gra_nivel' => 'required',
            'gra_registro' => 'required',
            'gra_estado' => 'required'
        ]);
        $grado = new Grado();
        $grado->gra_nom = $request->gra_nom;
        $grado->gra_seccion = $request->gra_seccion;
        $grado->gra_nivel = $request->gra_nivel;
        $grado->gra_registro = $request->gra_registro;
        $grado->gra_estado = $request->gra_estado;      
        $grado->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Grado registrado",
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
        $grado = Grado::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $grado,
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
        $grado = Grado::FindOrFail($id);
        $grado->gra_nom = $request->gra_nom;
        $grado->gra_seccion = $request->gra_seccion;
        $grado->gra_nivel = $request->gra_nivel;
        $grado->gra_registro = $request->gra_registro;
        $grado->gra_estado = $request->gra_estado; 
        $grado->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Grado actualizado",
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
        $grado = Grado::FindOrFail($id);
        $grado->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Grado Elimindo",
            "error" => false
        ], 200);
    }
    /* FUNCION PARA AGREGAR LOS CURSOS A GRADOS */
    public function asignarCurso(Request $request, $id)
    {
        $request->validate([
            'grado_id' => 'required',
            'curso_id' => 'required',
            'seccion' => 'required',
            'nivel' => 'required',
            'anioacademico' => 'required',
            'estado' => 'required'
        ]);

        $grado = Grado::FindOrFail($id);
        $grado->cursos()->attach($request->curso_id, ['seccion'=>$request->seccion, 'nivel'=>$request->nivel, 'anioacademico'=>$request->anioacademico, 'estado'=>1]);
        $curso = $grado->cursos;
        return response()->json([
            "status" => 1,
            "data" => $curso,
            "mensaje" => "Curso asignado",
            "error" => false
        ],200);
    }

    /* FUNCION PARA ELMINAR LA ASIGNACIONDE CURSOS Y GRADOS */
    public function quitarCurso(Request $request, $id)
    {
        $request->validate([
            'curso_id' =>  'required'
        ]);
        
        $grado = Grado::FindOrFail($id);
        $grado->cursos()->detach($request->curso_id);
    }
}
