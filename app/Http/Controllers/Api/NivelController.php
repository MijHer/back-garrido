<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nivel = Nivel::get();
        return response()->json($nivel, 200);
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
            'niv_nom' => 'required'
        ]);
        $nivel = new Nivel();
        $nivel->niv_nom = $request->niv_nom;        
        $nivel->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Nivel registrado",
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
        $nivel = Nivel::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $nivel,
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
        $nivel = Nivel::FindOrFail($id);       
        $nivel->niv_nom = $request->niv_nom;        
        $nivel->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Nivel Actualizado",
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
        $nivel = Nivel::FindOrFail($id);
        $nivel->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Nivel Elimindo",
            "error" => false
        ], 200);
    }
}
