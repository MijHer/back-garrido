<?php

namespace App\Http\Controllers\Api;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveAlumnoRequest;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumno = Alumno::with('apoderado', 'profesores')->paginate();
        return response()->json($alumno, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveAlumnoRequest $request)
    {        
        Alumno::create( $request->validated() );        
        return response()->json([
            "status" => 1,
            "mensaje" =>"Alumno Registrado",            
            "error" => false,            
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
        $alumno = Alumno::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $alumno,
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
    public function update(SaveAlumnoRequest $request, $id)
    {
        $alumno = Alumno::FindOrFail($id);
        $alumno -> update($request->validated());
        return response()->json([
            "status" => 1,
            "mensaje" => "Datos Actualizados del Alumno",
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
        $alumno = Alumno::FindOrFail($id);
        $alumno->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Alumno elimindado",
            "error" => false
        ], 200);
        
    }

    /* FUNCION PARA BUSCAR EL ALUMNO */
    public function buscarAlumno(Request $request)
    {
        $buscar = $request->q;
        $alumno = Alumno::orWhere('alu_nmr_doc', 'like', '%'.$buscar.'%')->with('apoderado')->first();
        return response()->json($alumno, 200);
    }

    /* FUNCION PARA REGISTRAR LAS ASISTENCIA DE LOS ALUMNO */
    public function asistenciaAlumno(Request $request, $id)
    {
        $request->validate([
            'alumno_id' => 'required',
            'profesor_id' => 'required',
            'anioacademico' => 'required',
            'curso' => 'required',
            'hora' => 'required',
            'asistencia' => 'required',
            'falta' => 'required',
            'tardanza' => 'required',
            'permiso' => 'required'
        ]);
        /* $alumno = $asistencia */
        $alumno = Alumno::findOrFail($id);
        $alumno->profesores()->attach($request->alumno_id, ['anioacademico'=>$request, 'curso'=>$request, 'hora'=>$request, 'asistencia'=>1, 'falta'=>1, 'tardanza'=>1, 'permiso'=>1]);
    }
}
