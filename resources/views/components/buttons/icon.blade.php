@props([
    'type' => 'button',
    'variant' => 'solid',
    'size' => 'md',
])

@php
    $variants = [
        'solid' => 'bg-slate-100 text-slate-500 hover:text-slate-700',
        'outline' => 'border border-slate-200 bg-white text-slate-500 hover:text-slate-700',
        'ghost' => 'bg-transparent text-slate-500 hover:text-slate-700',
    ];

    $sizes = [
        'sm' => 'h-9 w-9',
        'md' => 'h-10 w-10',
    ];
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-xl transition ' . ($sizes[$size] ?? $sizes['md']) . ' ' . ($variants[$variant] ?? $variants['solid'])]) }}
>
    {{ $slot }}
</button>
