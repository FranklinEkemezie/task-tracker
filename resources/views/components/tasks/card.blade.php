@props(['task'])

@php
    $categoryName = $task['category'] ?? 'Uncategorized';
    $dueDate = $task['task_date'] ?? 'No due date';
    $dueValue = $task['task_date'] ?? '';
    $status = $task['completed_at'] ? 'completed' : 'incomplete';
@endphp

<div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-950">
    {{-- Task header --}}
    <div class="flex flex-wrap items-center justify-between gap-3 text-xs">
        <span class="rounded-full bg-slate-100 px-3 py-1 font-semibold uppercase tracking-[0.2em] text-slate-500 dark:bg-slate-900 dark:text-slate-300">{{ $categoryName }}</span>
        <x-tasks.status-badge :status="$status" />
    </div>

    <h3 class="mt-4 text-lg font-semibold text-slate-900 dark:text-slate-100">{{ $task['title'] }}</h3>
    <div class="mt-2 flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
        <x-icons.calendar />
        {{ $dueDate }}
    </div>
    @if ($task['description'])
        <p class="mt-3 text-sm text-slate-500 dark:text-slate-400">{{ $task['description'] }}</p>
    @endif

    {{-- Task actions --}}
    <div class="mt-5 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <form method="post" action="{{ route('tasks.toggle', $task['id']) }}">
                @csrf
                @method('PATCH')
                <x-buttons.icon variant="outline" type="submit">
                    <x-icons.check />
                </x-buttons.icon>
            </form>
        </div>
        <div class="flex items-center gap-2">
            <x-buttons.icon
                variant="outline"
                data-task-edit-open
                data-task-id="{{ $task['id'] }}"
                data-task-title="{{ $task['title'] }}"
                data-task-category="{{ $task['category_id'] ?? '__none__' }}"
                data-task-due="{{ $dueValue }}"
                data-task-desc="{{ $task['description'] }}"
                data-task-recurring="{{ $task['is_recurring'] ? '1' : '0' }}"
            >
                <x-icons.pencil />
            </x-buttons.icon>
            <x-buttons.icon
                variant="outline"
                class="text-rose-500 hover:text-rose-600"
                data-task-delete-open
                data-task-id="{{ $task['id'] }}"
            >
                <x-icons.trash />
            </x-buttons.icon>
        </div>
    </div>
</div>
