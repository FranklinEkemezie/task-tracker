@props([
    'label' => 'Theme',
])

<button
    type="button"
    class="flex w-full items-center justify-between rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-800"
    data-theme-toggle
    aria-pressed="false"
>
    <span>{{ $label }}</span>
    <span class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
        <span data-theme-label>Light</span>
        <span class="relative h-5 w-9 rounded-full bg-slate-200 dark:bg-slate-700">
            <span data-theme-dot class="absolute left-0.5 top-0.5 h-4 w-4 rounded-full bg-white shadow transition-transform translate-x-0"></span>
            <span class="hidden translate-x-4"></span>
        </span>
    </span>
</button>
