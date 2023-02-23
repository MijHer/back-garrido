<?php

namespace App\Http\Controllers\Api;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveAlumnoRequest;
use App\Models\Matricula;
use App\Models\Pago;
use Illuminate\Support\Facades\Auth;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumno = Alumno::with('apoderado', 'profesores', 'user', 'pagos')->paginate();
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
            "mensaje" => "Alumno eliminado",
            "error" => false
        ], 200);
        
    }

    /* FUNCION PARA BUSCAR EL ALUMNO */
    public function buscarAlumno(Request $request)
    {
        $buscar = $request->q;
        $alumno = Alumno::orWhere('alu_nmr_doc', 'like', '%'.$buscar.'%')->with('apoderado')->first();
        $matricula = Matricula::orWhere('alumno_id', $alumno->id)->first();
        return response()->json(['alumno'=>$alumno, 'matricula'=>$matricula], 200);
    }

    /* FUNCION PARA REGISTRAR LAS ASISTENCIA DE LOS ALUMNO NULO*/
    /* public function asistenciaAlumno(Request $request, $id)
    {
        $request->validate([
            'alumno_id' => 'required',
            'profesor_id' => 'required',
            'anioacademico_id' => 'required',
            'curso_id' => 'required',
            'hora' => 'required',
            'asistencia' => 'required',
            'falta' => 'required',
            'tardanza' => 'required',
            'permiso' => 'required'
        ]);        
        $alumno = Alumno::findOrFail($id);
        $alumno->profesores()->attach($request->alumno_id, ['anioacademico_id'=>$request, 'curso_id'=>$request, 'hora'=>$request, 'asistencia'=>1, 'falta'=>1, 'tardanza'=>1, 'permiso'=>1]);
    } */

    /* FUNCION PARA REGISTRAR LAS ASISTENCIA DE LOS ALUMNO FIRME*/
    public function registrarAsistencia(Request $request)
    {
        $request->validate([
            'curso_id' => 'required',
            'alumnos' => 'required'
        ]);
        $profesor = Auth::user()->profesor;        
        foreach ($request->alumnos as $alumno) {
            $alumno_id = $alumno['id'];
            $asistencia = $alumno['asistencia'];
            $falta = $alumno['falta'];
            $tardanza = $alumno['tardanza'];
            $permiso = $alumno['permiso'];
            $profesor->alumnos()->attach($alumno_id, ['anioacademico_id'=> 1, 'curso_id'=>$request->curso_id, 'grado_id'=>1, 'seccion'=>"Z", 'hora'=>"2022-11-08 22:44:39",'asistencia'=> $asistencia, 'falta'=>$falta, 'tardanza' => $tardanza, 'permiso' => $permiso]);
        }
        return response()->json([
            "mensaje" => 'aqui mensaje'
        ]);
    }
    public function contarAlumnos()
    {
        $contarAlumno = Alumno::count();
        return response()->json($contarAlumno, 200);
    }

    /* public function listaCursoGradoSeccion($curso_id, $grado_id, $seccion)
    {
        
    } */
        
}
