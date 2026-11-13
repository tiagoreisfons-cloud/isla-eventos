@extends('layouts.app')

@section('titulo', $evento['titulo'])

@section('conteudo')
    @if ($evento['inscritos'] >= $evento['vagas'])
        <x-alerta tipo="aviso">Este evento está esgotado.</x-alerta>
    @endif

    <h1>{{ $evento['titulo'] }}</h1>
    <p>Tipo: {{ ucfirst($evento['tipo']) }}</p>
    <p>Data: {{ date('d/m/Y', strtotime($evento['data'])) }}</p>
    <p>Local: {{ $evento['local'] }}</p>
    <p>Inscritos: {{ $evento['inscritos'] }} de {{ $evento['vagas'] }}</p>
    <p><a href="{{ route('eventos.index') }}">Voltar aos eventos</a></p>
@endsection