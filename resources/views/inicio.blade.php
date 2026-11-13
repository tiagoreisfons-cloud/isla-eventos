@extends('layouts.app')

@section('titulo', 'Início')

@push('estilos')
<style>
    .etiqueta-workshop  { color: #1d6fa5; }
    .etiqueta-palestra  { color: #2e7d32; }
    .etiqueta-hackathon { color: #b26a00; }
</style>
@endpush

@section('conteudo')
    <h1>{{ config('app.name') }}</h1>
    <p>Workshops, palestras e hackathons do ISLA Gaia.</p>
    <p><a class="botao" href="{{ route('eventos.index') }}">Ver eventos</a></p>

    <h2>Próximos eventos</h2>
    <div class="grelha">
        @forelse ($proximos as $evento)
            <x-cartao-evento :evento="$evento" />
        @empty
            <x-alerta>Ainda não há eventos marcados.</x-alerta>
        @endforelse
    </div>
@endsection