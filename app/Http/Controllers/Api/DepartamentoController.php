<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamento = Departamento::get();
        return response()->json($departamento, 200);
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
            'depa_nom' => 'required'
        ]);
        $departamento = new Departamento();
        $departamento->depa_nom = $request->depa_nom;
        $departamento->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Departamento registrado",
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
        $departamento = Departamento::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $departamento,
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
        $departamento = Departamento::FindOrFail($id);
        $departamento->depa_nom = $request->depa_nom;
        $departamento->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Departamento Actualizado",
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
        $departamento = Departamento::FindOrFail($id);
        $departamento->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Departamento Elimindo",
            "error" => false
        ], 200);
    }
}
