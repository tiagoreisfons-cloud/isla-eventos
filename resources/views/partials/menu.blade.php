<header class="topo">
    <nav class="contentor">
        <a class="marca" href="{{ route('inicio') }}">{{ config('app.name') }}</a>
        <ul>
            <li>
                <a href="{{ route('inicio') }}"
                   @if (request()->routeIs('inicio')) aria-current="page" @endif>Início</a>
            </li>
            <li>
                <a href="{{ route('eventos.index') }}"
                   @if (request()->routeIs('eventos.*')) aria-current="page" @endif>Eventos</a>
            </li>
        </ul>
    </nav>
</header>