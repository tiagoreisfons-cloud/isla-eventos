<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $eventos = config('eventos');
        $tipo = request('tipo');
        $disponibilidade = request('disponibilidade');

        if ($tipo) {
            $eventos = array_filter($eventos,
                fn ($evento) => $evento['tipo'] === $tipo
            );
        }

        if ($disponibilidade === 'Esgotados') {
            $eventos = array_filter(
                $eventos,
                fn ($evento) => $evento['inscritos'] >= $evento['vagas']
            );
        } elseif ($disponibilidade === 'Disponíveis') {
            $eventos = array_filter(
                $eventos,
                fn ($evento) => $evento['inscritos'] < $evento['vagas']
            );
        }

        return view('eventos.index', [
            'eventos' => $eventos,
            'tipo' => $tipo,
            'disponibilidade' => $disponibilidade,
        ]);
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
    public function show(int $id)
    {
        $eventos = config('eventos');
        // Filtrar o evento pelo ID
        $evento = null;

        foreach ($eventos as $item) {
            if ($item['id'] === $id) {
                $evento = $item;
            } 
        }

        if ($evento === null) {
            abort(404);
        }

        return view('eventos.show', [
            'evento' => $evento,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
