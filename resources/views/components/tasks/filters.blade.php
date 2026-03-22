@props([
    'categories' => [],
    'filters' => [],
    'action' => null,
])

@php
    $action = $action ?? route('tasks.all');
    $status = $filters['status'] ?? '';
    $category = $filters['category'] ?? '';
    $from = $filters['from'] ?? '';
    $to = $filters['to'] ?? '';
@endphp

<form action="{{ $action }}" method="GET" class="grid gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-950 lg:grid-cols-[1.2fr_1fr_1fr_1fr_auto]">
    {{-- Status filter --}}
    <div>
        <label class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400" for="filter-status">Status</label>
        <select
            id="filter-status"
            name="status"
            class="mt-2 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm text-slate-700 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
        >
            <option value="">All</option>
            <option value="completed" @selected($status === 'completed')>Completed</option>
            <option value="incomplete" @selected($status === 'incomplete')>Incomplete</option>
        </select>
    </div>

    {{-- Category filter --}}
    <div>
        <label class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400" for="filter-category">Category</label>
        <select
            id="filter-category"
            name="category"
            class="mt-2 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm text-slate-700 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
        >
            <option value="">All categories</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" @selected((string) $category === (string) $cat->id)>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Date range --}}
    <div>
        <label class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400" for="filter-from">From</label>
        <input
            id="filter-from"
            name="from"
            type="date"
            value="{{ $from }}"
            class="mt-2 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm text-slate-700 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
        />
    </div>
    <div>
        <label class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400" for="filter-to">To</label>
        <input
            id="filter-to"
            name="to"
            type="date"
            value="{{ $to }}"
            class="mt-2 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm text-slate-700 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
        />
    </div>

    {{-- Filter actions --}}
    <div class="flex items-end gap-2">
        <x-buttons.primary type="submit" class="px-4 text-sm">Apply</x-buttons.primary>
        <a href="{{ $action }}" class="inline-flex items-center justify-center rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:border-brand-500 hover:text-brand-500 dark:border-slate-700 dark:text-slate-300">Reset</a>
    </div>
</form>
