<?php

namespace App\Http\Controllers;

use App\Models\Asistencias;
use App\Models\Invitados;
use Illuminate\Http\Request;
use PDF;

class AsistenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function certificate(Invitados $invitado)
    {
        $pdf = PDF::loadview('certificate', compact('invitado'), [], [
            'orientation' => 'landscape',
            'author' => 'Hermandad de Veteranos Pensionados de las FF.AA. y P.N.',
        ]);
        return $pdf->stream('certificate-invitado' . $invitado->id . '.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Asistencias $asistencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistencias $asistencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asistencias $asistencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asistencias $asistencias)
    {
        //
    }
}
