<x-layouts.task-layout
    title="All Tasks"
    subtitle="Manage and track your team's progress for the Q4 sprint."
    activeTab="all"
    workspace="Alex Rivera"
    plan="Workspace Admin"
    :categories="$categories"
>
    {{-- Section: Filters --}}
    <x-tasks.filters :categories="$categories" :filters="$filters" />

    {{-- Section: Task grid --}}
    <div class="mt-6 grid gap-6 lg:grid-cols-3">
        @forelse ($tasks as $task)
            <x-tasks.card :task="$task" />
        @empty
            <div class="rounded-2xl border border-dashed border-slate-200 bg-white p-6 text-center text-sm text-slate-500 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-400">
                No tasks found. Try adjusting your filters or create a new task.
            </div>
        @endforelse

        {{-- Create task panel --}}
        <button
            type="button"
            class="flex h-full min-h-[260px] flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 bg-white p-6 text-center text-slate-500 transition hover:border-brand-500/60 hover:text-brand-500 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-400"
            data-task-modal-open
        >
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-900 dark:text-slate-300">
                <x-icons.plus />
            </div>
            <p class="mt-4 text-sm font-medium">Create Task</p>
        </button>
    </div>

    {{-- Section: Pagination --}}
    <div class="mt-6">
        {{ $tasks->links() }}
    </div>
</x-layouts.task-layout>
