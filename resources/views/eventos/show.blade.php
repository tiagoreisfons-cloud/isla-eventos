<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $evento['titulo'] }}</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
    <main class="container">
        <h1>{{ $evento['titulo'] }}</h1>
        <p>Tipo: {{ $evento['tipo'] }}</p>
        <p>Data: {{ date('d/m/Y', strtotime($evento['data'])) }}</p>
        <p>Local: {{ $evento['local'] }}</p>
        <p>Inscritos: {{ $evento['inscritos'] }} de {{ $evento['vagas'] }}</p>
        <p><a href="{{ route('eventos.index') }}">Voltar aos eventos</a></p>
    </main>
</body>
</html>