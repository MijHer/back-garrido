<?php

namespace App\Http\Controllers\Api;

use App\Models\Matricula;
use App\Models\Alumno;
use App\Models\Distrito;
use App\Models\Grado;
use App\Models\Anioacademico;
use App\Models\Apoderado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveMatriculaRequest;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       /*  $buscar=$request->get('buscar'); */
        $matricula = Matricula::with('alumno', 'distrito', 'grado', 'anioacademico', 'apoderado')->paginate();
        return response()->json($matricula, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveMatriculaRequest $request)
    {
        Matricula::create( $request->validated() );
        return response()->json([
            "status" => 1,
            "mensaje" => "Matricula Registrada",
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
        $matricula = Matricula::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $matricula,
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
    public function update(SaveMatriculaRequest $request, $id)
    {
        $matricula = Matricula::FindOrFail($id);
        $matricula->update( $request->validated() );
        return response()->json([
            "status" => 1,
            "mensaje" => "Matricula Actualizada",
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
        $matricula = Matricula::FindOrFail($id);
        $matricula->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Matricula Eliminda",
            "error" => false
        ], 200);
    }

    public function contarMatriculas()
    {
        $contarMatricula = Matricula::count();
        return response()->json($contarMatricula, 200);
    }
}
