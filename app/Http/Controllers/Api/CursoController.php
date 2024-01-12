<?php

namespace App\Http\Controllers\Api;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveCursoRequest;
use App\Models\Grado;
use App\Models\Profesor;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curso = Curso::with('profesores', 'grados')->get();
        return response()->json($curso, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveCursoRequest $request)
    {
        Curso::create( $request->validated() );
        return response()->json([
            "status" => 1,
            "mensaje" => "Curso creado",
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
        $curso = Curso::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $curso,
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
    public function update(SaveCursoRequest $request, $id)
    {
        $curso = Curso::FindOrFail($id);
        $curso -> update($request->validated());
        return response()->json([
            "status" => 1,
            "mensaje" => "Curso modificado",
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
        $curso = Curso::FindOrFail($id);
        $curso->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Curso eliminado",
            "error" => false
        ], 200);
    }
    /* FUNCION PARA ASIGNAR UN CURSO AL DOCENTE */
    public function asignarProfesor(Request $request, $id)
    {
        $request->validate([
            'profesor_id' => 'required',
            'grado_id' => 'required',
            'anioacademico_id' => 'required'
        ]);

        $curso = Curso::FindOrFail($id);
        $curso->profesores()->attach($request->profesor_id, ['grado_id'=>$request->grado_id, 'seccion'=>$request->seccion, 'anioacademico_id'=>$request->anioacademico_id, 'estado'=>1]);
        $profesor = $curso->profesores;
        return response()->json([
            "status" => 1,
            "data" => $profesor,
            "mensaje" => "Docente Asignado",
            "error" => false
        ], 200);
    }

    /* FUNCION PARA ELIMINAR LA ASIGNACION DE CURSO Y DOCENTE */
    public function quitarProfesor(Request $request, $id)
    {
        $request->validate([
            'profesor_id' => 'required'
        ]);

        $curso = Curso::FindOrFail($id);
        $curso->profesores()->detach($request->profesor_id);
    }

    /* FUNCION PARA MOSTRAR LOS CURSOS Y ASIGNAR NOTAS POR DOCENTES */
    public function cursoParaNota()
    {
        $profesor = Profesor::find(Auth::user()->profesor->id);
        $profesor->cursos;
        foreach ($profesor->cursos as $curso) {
            $curso->pivot->grado = Grado::find($curso->pivot->grado_id);
        }
        return $profesor;
    }
}
