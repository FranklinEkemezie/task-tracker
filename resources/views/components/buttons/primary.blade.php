@props([
    'type' => 'button',
])

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'inline-flex items-center justify-center gap-2 rounded-xl bg-brand-500 px-4 py-3 text-sm font-semibold text-white shadow-[0_10px_20px_rgb(26_115_232_/_0.25)] transition hover:bg-brand-600 dark:bg-brand-600 dark:hover:bg-brand-500 dark:ring-1 dark:ring-brand-400/40 dark:shadow-[0_10px_20px_rgb(15_23_42_/_0.45)]']) }}
>
    {{ $slot }}
</button>
