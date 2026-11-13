@props(['evento'])

<article {{ $attributes->merge(['class' => 'cartao']) }}>
    <span class="etiqueta etiqueta-{{ $evento['tipo'] }}">{{ ucfirst($evento['tipo']) }}</span>
    <h3>
        <a href="{{ route('eventos.show', $evento['id']) }}">{{ $evento['titulo'] }}</a>
    </h3>
    <p>{{ date('d/m/Y', strtotime($evento['data'])) }} · {{ $evento['local'] }}</p>
</article>