<x-layouts.task-layout
    title="Completed Tasks"
    subtitle="Review the work that has been successfully finished."
    activeTab="completed"
    workspace="Alex Rivera"
    plan="Workspace Admin"
    :categories="$categories"
>
    {{-- Section: Task list --}}
    <div class="grid gap-6 lg:grid-cols-2">
        @forelse ($tasks as $task)
            <x-tasks.card :task="$task" />
        @empty
            <div class="rounded-2xl border border-dashed border-slate-200 bg-white p-6 text-center text-sm text-slate-500 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-400">
                No completed tasks yet.
            </div>
        @endforelse
    </div>

    {{-- Section: Pagination --}}
    <div class="mt-6">
        {{ $tasks->links() }}
    </div>
</x-layouts.task-layout>
