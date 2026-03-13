@props([
    'type' => 'button',
])

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 text-sm font-semibold text-brand-500 transition hover:text-brand-600']) }}
>
    {{ $slot }}
</button>
