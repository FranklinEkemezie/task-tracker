<x-app-layout active="dashboard" workspace="TaskTracker" plan="Workspace">
    <div>
        <h1 class="text-2xl font-semibold text-slate-900 dark:text-slate-100">Dashboard Overview</h1>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Track your daily progress and upcoming deadlines</p>
    </div>

    <div class="mt-6 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ([
            ['Total Tasks', '24', '+5% from last week', 'bg-brand-50 text-brand-500', 'text-emerald-600', 'clipboard'],
            ['Overdue', '3', '-2% from yesterday', 'bg-rose-100 text-rose-600', 'text-rose-500', 'alert'],
            ['This Week', '12', '+10% completion rate', 'bg-amber-100 text-amber-600', 'text-emerald-600', 'calendar'],
        ] as [$title, $value, $delta, $badge, $deltaColor, $icon])
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-950">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">{{ $title }}</p>
                        <p class="mt-3 text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ $value }}</p>
                        <p class="mt-2 text-xs font-semibold {{ $deltaColor }}">{{ $delta }}</p>
                    </div>
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl {{ $badge }}">
                        <x-dynamic-component :component="'icons.' . $icon" />
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6 grid gap-6 lg:grid-cols-2">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950">
            <h2 class="text-base font-semibold text-slate-900 dark:text-slate-100">Daily Goals Completion</h2>
            <div class="mt-6 flex flex-col items-center">
                <div class="h-52 w-52">
                    <canvas id="dailyGoalsChart"></canvas>
                </div>
                <p class="mt-4 text-sm text-slate-500 dark:text-slate-400">6 of 8 tasks completed today</p>
                <div class="mt-3 flex items-center gap-4 text-xs text-slate-500 dark:text-slate-400">
                    <span class="flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-brand-500"></span>
                        Done
                    </span>
                    <span class="flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-slate-200 dark:bg-slate-700"></span>
                        Remaining
                    </span>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950">
            <div class="flex items-center justify-between">
                <h2 class="text-base font-semibold text-slate-900 dark:text-slate-100">Weekly Performance</h2>
                <x-dropdown align="right" width="w-44">
                    <x-slot name="trigger">
                        <x-buttons.outline type="button" class="px-3 py-1 text-xs">
                            Last 7 days
                            <x-icons.chevron-down />
                        </x-buttons.outline>
                    </x-slot>
                    <x-slot name="content">
                        <button class="w-full rounded-xl px-3 py-2 text-left text-xs text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">Last 7 days</button>
                        <button class="w-full rounded-xl px-3 py-2 text-left text-xs text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">Last 14 days</button>
                        <button class="w-full rounded-xl px-3 py-2 text-left text-xs text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">Last 30 days</button>
                        <button class="w-full rounded-xl px-3 py-2 text-left text-xs text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">This Quarter</button>
                    </x-slot>
                </x-dropdown>
            </div>
            <div class="mt-6 h-52">
                <canvas id="weeklyPerformanceChart"></canvas>
            </div>
        </div>
    </div>

    <div class="mt-6 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950 md:col-span-2">
            <div class="flex items-center justify-between">
                <h2 class="text-base font-semibold text-slate-900 dark:text-slate-100">Upcoming Deadlines</h2>
                <a href="#" class="text-sm font-semibold text-brand-500">View All</a>
            </div>
            <div class="mt-6 space-y-4">
                @foreach ([
                    ['Homepage Redesign - V2', 'Design System Project', 'Today, 5 PM', 'bg-rose-100 text-rose-600'],
                    ['API Integration Sprint', 'Backend Team', 'Tomorrow, 10 AM', 'bg-amber-100 text-amber-600'],
                    ['Mobile App QA Review', 'Product Team', 'Friday, 2 PM', 'bg-emerald-100 text-emerald-600'],
                ] as [$title, $team, $due, $badge])
                    <div class="flex flex-wrap items-center justify-between gap-4 rounded-2xl border border-slate-200 bg-white p-4 dark:border-slate-800 dark:bg-slate-900">
                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl {{ $badge }}">
                                <x-icons.pencil />
                            </span>
                            <div>
                                <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">{{ $title }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">{{ $team }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 text-sm font-semibold text-slate-500 dark:text-slate-400">
                            <span class="text-rose-500">{{ $due }}</span>
                            <div class="flex -space-x-2">
                                <div class="h-7 w-7 rounded-full border-2 border-white bg-slate-300 dark:border-slate-950 dark:bg-slate-700"></div>
                                <div class="h-7 w-7 rounded-full border-2 border-white bg-slate-200 dark:border-slate-950 dark:bg-slate-600"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950">
            <h2 class="text-base font-semibold text-slate-900 dark:text-slate-100">Recent Activity</h2>
            <div class="mt-6 space-y-5 text-sm text-slate-600 dark:text-slate-300">
                @foreach ([
                    ['Completed', 'Project Proposal', '2 hours ago', 'bg-brand-500'],
                    ['Updated', 'Sprint Goals', '4 hours ago', 'bg-amber-500'],
                    ['Added', 'Marketing Assets', 'Yesterday', 'bg-emerald-500'],
                ] as [$action, $item, $time, $dot])
                    <div class="flex items-start gap-3">
                        <span class="mt-1 h-2.5 w-2.5 rounded-full {{ $dot }}"></span>
                        <div>
                            <p>{{ $action }} <span class="font-semibold text-slate-900 dark:text-slate-100">{{ $item }}</span></p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">{{ $time }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
