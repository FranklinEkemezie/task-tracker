<x-layouts.task-layout
    title="To Do Tasks"
    subtitle="Plan and prioritize tasks that are next in line."
    activeTab="todo"
    workspace="Alex Rivera"
    plan="Workspace Admin"
>
    <div class="grid gap-6 lg:grid-cols-2">
        @foreach ([
            ['Finalize onboarding checklist', 'Operations', 'Due tomorrow', 'High Priority'],
            ['Draft Q4 roadmap', 'Strategy', 'Due in 3 days', 'Medium Priority'],
            ['Prepare research summary', 'Research', 'Due in 5 days', 'Low Priority'],
            ['Set up analytics dashboard', 'Product', 'Due next week', 'Normal'],
        ] as [$title, $category, $due, $priority])
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-950">
                <div class="flex items-center justify-between text-xs">
                    <span class="rounded-full bg-slate-100 px-3 py-1 font-semibold uppercase tracking-[0.2em] text-slate-500 dark:bg-slate-900 dark:text-slate-300">{{ $category }}</span>
                    <span class="text-slate-400">{{ $priority }}</span>
                </div>
                <h3 class="mt-4 text-lg font-semibold text-slate-900 dark:text-slate-100">{{ $title }}</h3>
                <div class="mt-2 flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
                    <x-icons.calendar />
                    {{ $due }}
                </div>
                <div class="mt-5 flex items-center justify-between">
                    <div class="flex -space-x-2">
                        <div class="h-7 w-7 rounded-full border-2 border-white bg-slate-200 dark:border-slate-950 dark:bg-slate-700"></div>
                        <div class="h-7 w-7 rounded-full border-2 border-white bg-slate-300 dark:border-slate-950 dark:bg-slate-600"></div>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-buttons.icon variant="outline" data-task-edit-open>
                            <x-icons.pencil />
                        </x-buttons.icon>
                        <x-buttons.icon variant="outline" class="text-rose-500 hover:text-rose-600" data-task-delete-open>
                            <x-icons.trash />
                        </x-buttons.icon>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layouts.task-layout>
