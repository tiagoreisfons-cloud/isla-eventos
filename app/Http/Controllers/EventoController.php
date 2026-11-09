<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class EventoController extends Controller
{
    public function index(Request $request): View
    {
        $eventos = config('eventos');
        $tipo = $request->query('tipo');

        if ($tipo) {
            $eventos = array_filter($eventos,
                fn ($evento) => $evento['tipo'] === $tipo);
        }

        return view('eventos.index', [
            'eventos' => $eventos,
            'tipo' => $tipo,
        ]);
    }

    public function show(int $id): View
    {
        $evento = $this->procurar($id);

        if ($evento === null) {
            abort(404);
        }

        return view('eventos.show', ['evento' => $evento]);
    }

    public function porTipo(string $tipo): View
    {
        $eventos = config('eventos');

        if (!in_array($tipo, array_column($eventos, 'tipo'))) {
            abort(404);
        }

        $eventos = array_filter($eventos,
            fn ($evento) => $evento['tipo'] === $tipo);

        return view('eventos.index', [
            'eventos' => $eventos,
            'tipo' => $tipo,
        ]);
    }

    private function procurar(int $id): ?array
    {
        foreach (config('eventos') as $evento) {
            if ($evento['id'] === $id) {
                return $evento;
            }
        }

        return null;
    }
}