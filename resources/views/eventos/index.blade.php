@extends('layouts.app')

@section('titulo', 'Eventos')

@section('conteudo')
    <h1>Eventos @if ($tipo) ({{ $tipo }}) @endif</h1>

    <p>
        <a href="{{ route('eventos.index') }}">todos</a> ·
        <a href="{{ route('eventos.index', ['tipo' => 'workshop']) }}">workshops</a> ·
        <a href="{{ route('eventos.index', ['tipo' => 'palestra']) }}">palestras</a> ·
        <a href="{{ route('eventos.index', ['tipo' => 'hackathon']) }}">hackathons</a>
    </p>

    <table>
        <thead>
            <tr><th>#</th><th>Evento</th><th>Data</th><th>Vagas livres</th></tr>
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
                <tr>
                    <td colspan="4">
                        <x-alerta tipo="aviso">Não há eventos para mostrar.</x-alerta>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection