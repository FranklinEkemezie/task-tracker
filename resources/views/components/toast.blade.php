@props([
    'variant'   => 'info',
    'message'   => '',
    'title'     => null,
])

@php
    $classes = [
        'success'   => 'border-emerald-200 bg-emerald-50 text-emerald-700 dark:border-emerald-500/40 dark:bg-emerald-500/10 dark:text-emerald-200',
        'error'     => 'border-rose-200 bg-rose-50 text-rose-700 dark:border-rose-500/40 dark:bg-rose-500/10 dark:text-rose-200',
        'warning'   => 'border-amber-200 bg-amber-50 text-amber-700 dark:border-amber-500/40 dark:bg-amber-500/10 dark:text-amber-200',
        'info'      => 'border-brand-100 bg-brand-50 text-brand-700 dark:border-brand-500/40 dark:bg-brand-500/10 dark:text-brand-200',
    ];

    $icons = [
        'success'   => 'circle-check',
        'error'     => 'alert',
        'warning'   => 'alert',
        'info'      => 'question-mark',
    ];

    $variantClass   = $classes[$variant] ?? $classes['info'];
    $icon           = $icons[$variant] ?? $icons['info'];
@endphp

<div
    class="group flex items-start gap-3 rounded-2xl border px-4 py-3 text-sm shadow-lg {{ $variantClass }} transition-all duration-300 data-[state=closing]:translate-x-4 data-[state=closing]:opacity-0"
    data-toast>
    <span class="mt-0.5 text-inherit">
        <x-dynamic-component :component="'icons.' . $icon" />
    </span>
    <div class="flex-1">
        @if ($title)
            <p class="text-sm font-semibold text-inherit">{{ $title }}</p>
        @endif
        <p class="text-sm font-medium text-inherit/90">{{ $message }}</p>
    </div>
    <button type="button" class="text-inherit/70 transition hover:text-inherit" data-toast-close>
        <span class="sr-only">Close</span>
        <x-icons.close />
    </button>
</div>
