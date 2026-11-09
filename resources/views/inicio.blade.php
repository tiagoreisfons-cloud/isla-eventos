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
        <h1>{{ config('app.name') }}</h1>
        <p>Workshops, palestras e hackathons do ISLA Gaia.</p>
        <p><a href="{{ route('eventos.index') }}" role="button">Ver eventos</a></p>

        <h2>Próximos eventos</h2>
        <ul>
            @forelse ($proximos as $evento)
                <li>
                    <a href="{{ route('eventos.show', $evento['id']) }}">{{ $evento['titulo'] }}</a>
                    · {{ date('d/m/Y', strtotime($evento['data'])) }}
                </li>
            @empty
                <li>Não há eventos agendados.</li>
            @endforelse
        </ul>
    </main>
</body>
</html>