@props(['status' => 'incomplete'])

@php
    $isCompleted = $status === 'completed';
    $classes = $isCompleted
        ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-200'
        : 'bg-slate-100 text-slate-600 dark:bg-slate-900 dark:text-slate-300';
@endphp

<span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] {{ $classes }}">
    {{ $isCompleted ? 'Completed' : 'Incomplete' }}
</span>
