<?php

namespace App\Http\Controllers\Api;

use App\Models\Pago;
use Carbon\Carbon;
use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SavePagoRequest;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pago = Pago::with('alumno')->get();        
        return response()->json($pago, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePagoRequest $request)
    {
        Pago::create( $request->validated());        
        return response()->json([
            "status" => 1,
            "mensaje" => "Pago realizado",
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
        $pago = Pago::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $pago,
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
    public function update(SavePagoRequest $request, $id)
    {
        $pago = Pago::FindOrFail($id);
        $pago->update( $request->validated() );
        return response()->json([
            "status" => 1,
            "mensaje" => "Pago Atualizado",
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
        $pago = Pago::FindOrFail($id);
        $pago->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Pago Eliminado",
            "error" => false
        ], 200);
    }
}
