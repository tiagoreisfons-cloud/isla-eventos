<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" rel="stylesheet">
</head>
<body>
    <main class="container">
        <p><a href="/eventos" role="button" class="primary">Voltar aos eventos</a></p>

        <h1>{{ $evento['titulo'] }}</h1>
        <p><strong>Tipo:</strong> {{ $evento['tipo'] }}</p>
        <p><strong>Data:</strong> {{ date('d/m/Y', strtotime($evento['data'])) }}</p>
        <p><strong>Local:</strong> {{ $evento['local'] }}</p>
        <p><strong>Inscritos:</strong> {{ $evento['inscritos'] }} de {{ $evento['vagas'] }}</p>

        
    </main>
</body>
</html>
