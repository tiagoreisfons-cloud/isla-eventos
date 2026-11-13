@extends('layouts.app')

@section('titulo', 'Página não encontrada')

@section('conteudo')
    <h1>404 · Página não encontrada</h1>
    <p><a href="{{ route('eventos.index') }}">Ver eventos</a></p>
@endsection