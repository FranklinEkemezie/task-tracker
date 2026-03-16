<x-layouts.task-layout
    title="All Tasks"
    subtitle="Manage and track your team's progress for the Q4 sprint."
    activeTab="all"
    workspace="Alex Rivera"
    plan="Workspace Admin"
>
    <div class="grid gap-6 lg:grid-cols-3">
        @foreach ([
            ['Update Design System', 'High Priority', 'Design', 'Oct 24, 2023', '12 comments', 'bg-red-100 text-red-700', 'bg-[linear-gradient(135deg,#f7e4da,#edd0c4)]'],
            ['API Integration', 'Medium Priority', 'Development', 'Oct 26, 2023', '3 files', 'bg-amber-100 text-amber-700', 'bg-[linear-gradient(135deg,#0f1f29,#263a4c)] text-white'],
            ['User Research', 'Low Priority', 'Research', 'Oct 30, 2023', '5/8 complete', 'bg-emerald-100 text-emerald-700', 'bg-[linear-gradient(135deg,#f0f2f5,#dfe7ef)]'],
            ['Marketing Assets', 'Normal', 'Marketing', 'Nov 2, 2023', '2 drafts', 'bg-blue-100 text-blue-700', 'bg-[linear-gradient(135deg,#e9eff6,#d9e3ef)]'],
            ['Homepage QA', 'Urgent', 'QA', 'Today', 'Blocking', 'bg-rose-100 text-rose-700', 'bg-[linear-gradient(135deg,#fdf1f0,#f5d9d5)]'],
        ] as [$title, $priority, $category, $due, $meta, $badge, $image])
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-950">
                <div class="flex h-28 w-full items-center justify-center rounded-2xl {{ $image }}">
                    <span class="text-xs font-semibold text-white/80"></span>
                </div>
                <div class="mt-4 flex items-center justify-between text-xs">
                    <span class="rounded-full px-3 py-1 {{ $badge }} font-semibold uppercase tracking-[0.15em]">{{ $priority }}</span>
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-500 dark:bg-slate-900 dark:text-slate-300">{{ $category }}</span>
                </div>
                <h3 class="mt-3 text-lg font-semibold text-slate-900 dark:text-slate-100">{{ $title }}</h3>
                <div class="mt-2 flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
                    <x-icons.calendar />
                    Due: {{ $due }}
                </div>
                <div class="mt-3 text-xs font-medium text-slate-500 dark:text-slate-400">{{ $meta }}</div>
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

        <button
            type="button"
            class="flex h-full min-h-[280px] flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 bg-white p-6 text-center text-slate-500 transition hover:border-brand-500/60 hover:text-brand-500 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-400"
            data-task-modal-open
        >
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-900 dark:text-slate-300">
                <x-icons.plus />
            </div>
            <p class="mt-4 text-sm font-medium">Create Task</p>
        </button>
    </div>
</x-layouts.task-layout>
