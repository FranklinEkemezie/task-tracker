<x-layouts.task-layout
    title="Task Board"
    subtitle="Manage and track your team's progress for the Q4 sprint."
    activeTab="board"
    workspace="Alex Rivera"
    plan="Workspace Admin"
>
    <div class="grid gap-6 lg:grid-cols-4">
        @foreach ([
            ['Update Design System', 'High Priority', 'Oct 24, 2023', 'bg-red-100 text-red-700', 'bg-[linear-gradient(135deg,#f7e4da,#edd0c4)]', '12'],
            ['API Integration', 'Medium Priority', 'Oct 26, 2023', 'bg-amber-100 text-amber-700', 'bg-[linear-gradient(135deg,#0f1f29,#263a4c)] text-white', '3'],
            ['User Research', 'Low Priority', 'Oct 30, 2023', 'bg-emerald-100 text-emerald-700', 'bg-[linear-gradient(135deg,#f0f2f5,#dfe7ef)]', '5/8'],
        ] as [$title, $priority, $due, $badge, $image, $meta])
            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-950">
                <div class="flex h-28 w-full items-center justify-center rounded-2xl {{ $image }}">
                    <span class="text-xs font-semibold text-white/80"></span>
                </div>
                <div class="mt-4 flex items-center justify-between text-xs">
                    <span class="rounded-full px-3 py-1 {{ $badge }} font-semibold uppercase tracking-[0.15em]">{{ $priority }}</span>
                    <button class="text-slate-300">...</button>
                </div>
                <h3 class="mt-3 text-lg font-semibold text-slate-900 dark:text-slate-100">{{ $title }}</h3>
                <div class="mt-2 flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
                    <x-icons.calendar />
                    Due: {{ $due }}
                </div>
                <div class="mt-4 flex items-center justify-between text-xs text-slate-500 dark:text-slate-400">
                    <div class="flex -space-x-2">
                        <div class="h-7 w-7 rounded-full border-2 border-white bg-slate-200 dark:border-slate-950 dark:bg-slate-700"></div>
                        <div class="h-7 w-7 rounded-full border-2 border-white bg-slate-300 dark:border-slate-950 dark:bg-slate-600"></div>
                    </div>
                    <span>{{ $meta }}</span>
                </div>
            </div>
        @endforeach

        <div class="flex h-full min-h-[260px] flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 bg-white p-6 text-center text-slate-500 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-400">
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-900 dark:text-slate-300">
                <x-icons.plus />
            </div>
            <p class="mt-4 text-sm font-medium">Add New Task</p>
        </div>
    </div>
</x-layouts.task-layout>
