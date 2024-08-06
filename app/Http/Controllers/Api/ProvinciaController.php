<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Provincia;
use App\Models\Departamento;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provincia = Provincia::with('departamento')->paginate();
        return response()->json($provincia, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now();
        $request->validate([
            'prov_nom' => 'required',
            'prov_rgst' => 'required',
            'departamento_id' => 'required'
        ]);
        $provincia = new Provincia();
        $provincia->prov_nom = $request->prov_nom;
        $provincia->prov_rgst = $date->format('Y-m-d',$request->prov_rgst);
        $provincia->departamento_id = $request->departamento_id;
        $provincia->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Provincia registrado",
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
        $provincia = Provincia::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $provincia,
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
        $provincia = Provincia::FindOrFail($id);
        $provincia->prov_nom = $request->prov_nom;
        $provincia->prov_rgst = $request->prov_rgst;
        $provincia->departamento_id = $request->departamento_id;
        $provincia->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Provincia Modificada",
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
        $provincia = Provincia::FindOrFail($id);
        $provincia->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Provincia Elimindo",
            "error" => false
        ], 200);
    }
}
