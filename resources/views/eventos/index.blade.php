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
        <p><a href="/" role="button" class="primary">Voltar ao início</a></p>
        <h1>Evento @if ($tipo) - {{ ucfirst($tipo) }} @endif</h1>
        
        <hr>

        <div class="grid">
            <div>
                <p><a href="/eventos">Todos os eventos</a></p>
                <p><a href="/eventos?disponibilidade=Disponíveis">Disponíveis</a></p>
            </div>

            <div>
                <p><a href="/eventos?tipo=workshop">Workshops</a></p>
                <p><a href="/eventos?disponibilidade=Esgotados">Esgotados</a></p>
            </div>

            <div>
                <p><a href="/eventos?tipo=palestra">Palestras</a></p>
                <p><a href="/eventos/proximos">Próximos eventos</a></p>
            </div>

            <div>
                <p><a href="/eventos?tipo=hackathon">Hackathons</a></p>
            </div>

        </div>


        <!-- <nav>
            <a href="/eventos">Todos os eventos</a>
            <a href="/eventos?tipo=workshop">Workshops</a>
            <a href="/eventos?tipo=palestra">Palestras</a>
            <a href="/eventos?tipo=hackathon">Hackathons</a>
        </nav>
        <hr>

         <nav>
            <a href="/eventos?disponibilidade=Disponíveis">Disponíveis</a>
            <a href="/eventos?disponibilidade=Esgotados">Esgotados</a>
        </nav> -->
        <hr>

        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Evento</th>
                    <th scope="col">Data</th>
                    <th scope="col">Vagas disponíveis</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($eventos as $evento)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="/eventos/{{ $evento['id'] }}">{{ $evento['titulo'] }}</a></td>
                        <!-- <td>{{ $evento['data'] }}</td> -->
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
                    <tr>
                        <td colspan="4">Não há eventos para mostrar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
</body>
</html>
