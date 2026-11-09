<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class InicioController extends Controller
{
    public function index(): View
    {
        $hoje = date('Y-m-d');

        $proximos = array_filter(
            config('eventos'),
            fn ($evento) => $evento['data'] >= $hoje
        );

        usort($proximos, fn ($a, $b) => strcmp($a['data'], $b['data']));

        return view('inicio', [
            'proximos' => array_slice($proximos, 0, 3),
        ]);
    }
}