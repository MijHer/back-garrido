<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProfesorRequest;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesor = Profesor::paginate();
        return response()->json($profesor, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProfesorRequest $request)
    {
        Profesor::create( $request->validated() );
        return response()->json([
            "status" => 1,
            "mensaje" =>"Profesor Registrado",            
            "error" => false,            
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
        $profesor = Profesor::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $profesor,
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
    public function update(SaveProfesorRequest $request, $id)
    {
        $profesor = Profesor::FindOrFail($id);
        $profesor->update( $request->validated() );
        return response()->json([
            "status" => 1,
            "mensaje" => "Datos Actualizados del Profesor",
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
        $profesor = Profesor::FindOrFail($id);
        $profesor->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Profesor elimindado",
            "error" => false
        ], 200);
    }
}
