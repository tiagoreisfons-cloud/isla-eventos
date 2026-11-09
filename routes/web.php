<?php

use Illuminate\Support\Facades\Route;

$eventos = [
    ['id' => 1, 'titulo' => 'Workshop de Laravel', 'tipo' => 'workshop',
     'data' => '2026-10-14', 'local' => 'Laboratório 2.05', 'vagas' => 20, 'inscritos' => 12],
    ['id' => 2, 'titulo' => 'Palestra: Carreiras em Cibersegurança', 'tipo' => 'palestra',
     'data' => '2026-10-21', 'local' => 'Auditório', 'vagas' => 120, 'inscritos' => 120],
    ['id' => 3, 'titulo' => 'Hackathon ISLA 24h', 'tipo' => 'hackathon',
     'data' => '2026-11-06', 'local' => 'Átrio principal', 'vagas' => 60, 'inscritos' => 41],
    ['id' => 4, 'titulo' => 'Git e GitHub para iniciantes', 'tipo' => 'workshop',
     'data' => '2026-09-30', 'local' => 'Laboratório 1.02', 'vagas' => 25, 'inscritos' => 25],
    ['id' => 5, 'titulo' => 'Conversa com antigos alunos DWDM', 'tipo' => 'palestra',
     'data' => '2026-12-02', 'local' => 'Sala 3.10', 'vagas' => 40, 'inscritos' => 9],
    ['id' => 6, 'titulo' => 'Workshop de HTML e CSS', 'tipo' => 'workshop',
     'data' => '2026-12-10', 'local' => 'Laboratório 2.05', 'vagas' => 20, 'inscritos' => 5],
];

$interesses = ['Laravel', 'MySQL', 'Git'];

Route::get('/', function () {
    return view('inicio');
});

Route::get('/ola', function () {
    return 'Olá, DWDM!';
});

Route::get('/sobre', function () {
    return view('sobre');
});

Route::get('/ola/{nome}', function (string $nome) {
    return 'Olá, ' . e($nome) . '!';
});

Route::get('/aluno/{nome}/{curso}', function (string $nome, string $curso) {
    return e($nome) . ' está no curso ' . e($curso) . '.';
});

Route::get('/saudacao/{nome?}', function (?string $nome = null) {
    return 'Bem-vindo, ' . e($nome ?? 'visitante') . '!';
});

Route::get('/dobro/{numero}', function (int $numero) {
    return 'O dobro de ' . $numero . ' é ' . ($numero * 2) . '.';
})->whereNumber('numero');

Route::get('/perfil', function () use ($interesses) {
    return view('perfil', [
        'nome' => 'Ana Costa',
        'curso' => 'DWDM',
        'ano' => 2,
        'interesses' => $interesses,
    ]);
});

Route::get('/perfil/{interesse}', function (string $interesse) use ($interesses) {
    if (in_array($interesse, $interesses)) {
        return e($interesse) . ' está na minha lista de interesses.';
    }
    return e($interesse) . ' não está na minha lista de interesses.';
});

Route::get('/eventos', function () use ($eventos) {
    $tipo = request('tipo');

    if ($tipo) {
        $eventos = array_filter($eventos,
            fn ($evento) => $evento['tipo'] === $tipo);
    }

    return view('eventos.index', [
        'eventos' => $eventos,
        'tipo' => $tipo,
    ]);
});

Route::get('/eventos/proximos', function () use ($eventos) {
    $hoje = date('Y-m-d');

    $proximos = array_filter($eventos, fn ($e) => $e['data'] >= $hoje);
    usort($proximos, fn ($a, $b) => strcmp($a['data'], $b['data']));

    return view('eventos.index', [
        'eventos' => $proximos,
        'tipo' => null,
    ]);
});

Route::get('/eventos/{id}', function (int $id) use ($eventos) {
    $evento = null;

    foreach ($eventos as $item) {
        if ($item['id'] === $id) {
            $evento = $item;
        }
    }

    if ($evento === null) {
        abort(404);
    }

    return view('eventos.show', ['evento' => $evento]);
})->whereNumber('id');