@props([
    'type' => 'button',
    'variant' => 'solid',
    'size' => 'md',
])

@php
    $variants = [
        'solid' => 'bg-slate-100 text-slate-500 hover:text-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:text-slate-100',
        'outline' => 'border border-slate-200 bg-white text-slate-500 hover:text-slate-700 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-300 dark:hover:text-slate-100',
        'ghost' => 'bg-transparent text-slate-500 hover:text-slate-700 dark:text-slate-300 dark:hover:text-slate-100',
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
