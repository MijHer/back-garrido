<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cursogrado;
use Illuminate\Http\Request;

class CursogradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursogrado = Cursogrado::get();
        return response()->json($cursogrado, 200);
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
            'grado_id' => 'required',
            'curso_id' => 'required',
            'anioacademico' => 'required',
            'estado' => 'required'
        ]);

        $cursogrado = new Cursogrado();
        $cursogrado->grado_id = $request->grado_id;
        $cursogrado->curso_id = $request->curso_id;
        $cursogrado->anoacademico_id = $request->anoacademico_id;
        $cursogrado->estado = $request->estado;
        $cursogrado->save();
        return response()->json([$cursogrado, 
            "status" => 1,
            "mensaje" => "Curso y grado registrado",
            "error" => false
        , 201]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursogrado = Cursogrado::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $cursogrado,
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
        $cursogrado = Cursogrado::FindOrFail($id);
        $cursogrado->grado_id = $request->grado_id;
        $cursogrado->curso_id = $request->curso_id;
        $cursogrado->anoacademico_id = $request->anoacademico_id;
        $cursogrado->estado = $request->estado;
        $cursogrado->save();
        return response()->json([$cursogrado, 
            "status" => 1,
            "mensaje" => "Curso y grado Actualizado",
            "error" => false
        , 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cursogrado = Cursogrado::FindOrFail($id);
        $cursogrado->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Asginacion de curso eliminada",
            "error" => false,
        ], 200);
    }
}
