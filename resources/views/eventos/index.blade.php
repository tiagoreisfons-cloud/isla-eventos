<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
    <main class="container">
        <h1>Eventos @if ($tipo) ({{ $tipo }}) @endif</h1>

        <p>
            <a href="{{ route('eventos.index') }}">todos</a> ·
            <a href="{{ route('eventos.index', ['tipo' => 'workshop']) }}">workshops</a> ·
            <a href="{{ route('eventos.index', ['tipo' => 'palestra']) }}">palestras</a> ·
            <a href="{{ route('eventos.index', ['tipo' => 'hackathon']) }}">hackathons</a>
        </p>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Evento</th>
                    <th>Data</th>
                    <th>Vagas livres</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($eventos as $evento)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('eventos.show', $evento['id']) }}">{{ $evento['titulo'] }}</a></td>
                        <td>{{ date('d/m/Y', strtotime($evento['data'])) }}</td>
                        <td>
                            @if ($evento['inscritos'] >= $evento['vagas'])
                                <strong>Esgotado</strong>
                            @else
                                {{ $evento['vagas'] - $evento['inscritos'] }}
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">Não há eventos para mostrar.</td></tr>
                @endforelse
            </tbody>
        </table>

        <p><a href="{{ route('inicio') }}">Voltar ao início</a></p>
    </main>
</body>
</html>