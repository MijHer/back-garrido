<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Grado;
use App\Models\Nivel;
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
        $grado = Grado::with('nivel')->get();
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
            'nivel_id' => 'required'
        ]);
        $grado = new Grado();
        $grado->gra_nom = $request->gra_nom;
        $grado->gra_detalle = $request->gra_detalle;
        $grado->nivel_id = $request->nivel_id;
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
        $grado->gra_detalle = $request->gra_detalle;
        $grado->nivel_id = $request->nivel_id;
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
}
