<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Apoderado;
use App\Models\Alumno;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveApoderadoRequest;

class ApoderadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apoderado = Apoderado::with('alumno')->paginate();
        return response()->json($apoderado, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveApoderadoRequest $request)
    {
        Apoderado::create($request->validated());
        return response()->json([
            "status" => 1,
            "mendaje" => "Apoderado REgistrado",
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
        $apoderado = FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $apoderado,
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
    public function update(SaveApoderadoRequest $request, $id)
    {
        $apoderado = Apoderado::FindOrFail($id);
        $apoderado -> update($request->validated());
        return response()->json([
            "status" => 1,
            "mensaje" => "Apoderado Actualizado",
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
        $apoderado = Apoderado::FindOrFail($id);
        $apoderado->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Apoderado Eliminado",
            "error" => false
        ], 200);
    }
}
