@props(['tipo' => 'info'])

<div {{ $attributes->merge(['class' => 'alerta alerta-' . $tipo]) }} role="status">
    {{ $slot }}
</div>