<?php

namespace App\Http\Controllers\Api;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveCursoRequest;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curso = Curso::get();
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
}
