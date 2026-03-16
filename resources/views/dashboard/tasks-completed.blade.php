<x-layouts.task-layout
    title="Tasks"
    subtitle="Manage and track your team's progress."
    activeTab="completed"
    workspace="Project Management"
    plan="Standard Plan"
>
    <x-slot name="actions">
        <div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm shadow-sm dark:border-slate-800 dark:bg-slate-950">
            <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Completed</p>
            <p class="mt-1 text-2xl font-semibold text-brand-500">24</p>
        </div>
    </x-slot>

    <div class="space-y-4">
        @foreach ([
            ['Finalize marketing assets for Q3', 'Completed 2 days ago', 'Marketing'],
            ['Update client documentation', 'Completed yesterday', 'Ops'],
            ['Submit quarterly budget report', 'Completed 4 hours ago', 'Finance'],
            ['Review team performance metrics', 'Completed 1 hour ago', 'HR'],
        ] as [$title, $meta, $tag])
            <div class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-950">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-500 text-white">
                    <x-icons.check />
                </div>
                <div class="flex-1">
                    <p class="font-medium text-slate-900 line-through decoration-slate-300 dark:text-slate-100 dark:decoration-slate-600">{{ $title }}</p>
                    <div class="mt-1 flex items-center gap-3 text-xs text-slate-500 dark:text-slate-400">
                        <span class="flex items-center gap-1">
                            <x-icons.calendar />
                            {{ $meta }}
                        </span>
                        <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-500 dark:bg-slate-900 dark:text-slate-300">{{ $tag }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8 flex flex-wrap items-center justify-between gap-4 text-sm text-slate-500 dark:text-slate-400">
        <span>Showing 4 of 24 completed tasks</span>
        <div class="flex items-center gap-2">
            <x-buttons.outline type="button">Previous</x-buttons.outline>
            <x-buttons.outline type="button">Next</x-buttons.outline>
        </div>
    </div>
</x-layouts.task-layout>
