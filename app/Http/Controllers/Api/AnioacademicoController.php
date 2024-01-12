<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Anioacademico;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnioacademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anioacademico = Anioacademico::get();
        return response()->json($anioacademico, 200);
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
            'anio_nom' => 'required',
            'anio_inicio' => 'required',
            'anio_fin' => 'required',
            'anio_estado' => 'required'  
        ]);
        $date = Carbon::now();
        $anioacademico = new Anioacademico();
        $anioacademico->anio_nom = $request->anio_nom;
        $anioacademico->anio_detalle = $request->anio_detalle;
        $anioacademico->anio_inicio = $date->format('Y-m-d', $request->anio_inicio);
        $anioacademico->anio_fin = $date->format('Y-m-d', $request->anio_fin);
        $anioacademico->anio_estado = $request->anio_estado;
        $anioacademico->anio_pension_inicial = $request->anio_pension_inicial;
        $anioacademico->anio_pension_primaria = $request->anio_pension_primaria;
        $anioacademico->anio_pension_secundaria = $request->anio_pension_secundaria;
        $anioacademico->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Anio Academico Registrado",
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
        $anioacademico = Anioacademico::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $anioacademico,
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
        $anioacademico = Anioacademico::FindOrFail($id);
        $anioacademico->anio_nom = $request->anio_nom;
        $anioacademico->anio_detalle = $request->anio_detalle;
        $anioacademico->anio_inicio = $request->anio_inicio;
        $anioacademico->anio_fin = $request->anio_fin;
        $anioacademico->anio_estado = $request->anio_estado;
        $anioacademico->anio_pension_inicial = $request->anio_pension_inicial;
        $anioacademico->anio_pension_primaria = $request->anio_pension_primaria;
        $anioacademico->anio_pension_secundaria = $request->anio_pension_secundaria;
        $anioacademico->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Anio Academico Modificado",
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
        $anioacademico = Anioacademico::FindOrFail($id);
        $anioacademico->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Anio Academico Eliminado",
            "error" => false
        ], 200);
    }

    public function cabiarAnioacademico(Request $request)
    {
        $anioacademico = Anioacademico::get();
        foreach ($anioacademico as $acad) {
            if ($acad->id == $request->id) {
                $acad->anio_estado = 1;
            } else {
                $acad->anio_estado = 0;
            }
            $acad->update();
        }
        return response()->json([
            "status" => 1,
            "mensaje" => "Anio Academico actualizado"
        ]);
    }
}
