<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Distrito;
use App\Models\Provincia;
use App\Models\Departamento;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distrito = Distrito::with('provincia')->get();
        return response()->json($distrito, 200);
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
            'dist_nom' => 'required',
            'provincia_id' => 'required'
        ]);
        $distrito = new Distrito();
        $distrito->dist_nom = $request->dist_nom;
        $distrito->dist_rgst = $date->format('Y-m-d' ,$request->dist_rgst);
        $distrito->provincia_id = $request->provincia_id;        
        $distrito->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Distrito registrado",
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
        $distrito = Distrito::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $distrito,
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
        $distrito = Distrito::FindOrFail($id);
        $distrito->dist_nom = $request->dist_nom;
        $distrito->dist_rgst = $request->dist_rgst;
        $distrito->provincia_id = $request->provincia_id;
        $distrito->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Distrito Actualizado",
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
        $distrito = Distrito::FindOrFail($id);
        $distrito->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Distrito Elimindo",
            "error" => false
        ], 200);
    }
}
