<x-app-layout active="dashboard" workspace="TaskTracker" plan="Workspace">
    <div>
        <h1 class="text-2xl font-semibold text-slate-900">Dashboard Overview</h1>
        <p class="mt-1 text-sm text-slate-500">Track your daily progress and upcoming deadlines</p>
    </div>

    <div class="mt-6 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ([
            ['Total Tasks', '24', '+5% from last week', 'bg-brand-50 text-brand-500', 'text-emerald-600', 'clipboard'],
            ['Overdue', '3', '-2% from yesterday', 'bg-rose-100 text-rose-600', 'text-rose-500', 'alert'],
            ['This Week', '12', '+10% completion rate', 'bg-amber-100 text-amber-600', 'text-emerald-600', 'calendar'],
        ] as [$title, $value, $delta, $badge, $deltaColor, $icon])
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">{{ $title }}</p>
                        <p class="mt-3 text-2xl font-semibold text-slate-900">{{ $value }}</p>
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
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-base font-semibold text-slate-900">Daily Goals Completion</h2>
            <div class="mt-6 flex flex-col items-center">
                <div class="h-52 w-52">
                    <canvas id="dailyGoalsChart"></canvas>
                </div>
                <p class="mt-4 text-sm text-slate-500">6 of 8 tasks completed today</p>
                <div class="mt-3 flex items-center gap-4 text-xs text-slate-500">
                    <span class="flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-brand-500"></span>
                        Done
                    </span>
                    <span class="flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-slate-200"></span>
                        Remaining
                    </span>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <h2 class="text-base font-semibold text-slate-900">Weekly Performance</h2>
                <x-dropdown align="right" width="w-44">
                    <x-slot name="trigger">
                        <x-buttons.outline type="button" class="px-3 py-1 text-xs">
                            Last 7 days
                            <x-icons.chevron-down />
                        </x-buttons.outline>
                    </x-slot>
                    <x-slot name="content">
                        <button class="w-full rounded-xl px-3 py-2 text-left text-xs text-slate-600 hover:bg-slate-100">Last 7 days</button>
                        <button class="w-full rounded-xl px-3 py-2 text-left text-xs text-slate-600 hover:bg-slate-100">Last 14 days</button>
                        <button class="w-full rounded-xl px-3 py-2 text-left text-xs text-slate-600 hover:bg-slate-100">Last 30 days</button>
                        <button class="w-full rounded-xl px-3 py-2 text-left text-xs text-slate-600 hover:bg-slate-100">This Quarter</button>
                    </x-slot>
                </x-dropdown>
            </div>
            <div class="mt-6 h-52">
                <canvas id="weeklyPerformanceChart"></canvas>
            </div>
        </div>
    </div>

    <div class="mt-6 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:col-span-2">
            <div class="flex items-center justify-between">
                <h2 class="text-base font-semibold text-slate-900">Upcoming Deadlines</h2>
                <a href="#" class="text-sm font-semibold text-brand-500">View All</a>
            </div>
            <div class="mt-6 space-y-4">
                @foreach ([
                    ['Homepage Redesign - V2', 'Design System Project', 'Today, 5 PM', 'bg-rose-100 text-rose-600'],
                    ['API Integration Sprint', 'Backend Team', 'Tomorrow, 10 AM', 'bg-amber-100 text-amber-600'],
                    ['Mobile App QA Review', 'Product Team', 'Friday, 2 PM', 'bg-emerald-100 text-emerald-600'],
                ] as [$title, $team, $due, $badge])
                    <div class="flex flex-wrap items-center justify-between gap-4 rounded-2xl border border-slate-100 bg-slate-50/60 p-4">
                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl {{ $badge }}">
                                <x-icons.pencil />
                            </span>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">{{ $title }}</p>
                                <p class="text-xs text-slate-500">{{ $team }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 text-sm font-semibold text-slate-500">
                            <span class="text-rose-500">{{ $due }}</span>
                            <div class="flex -space-x-2">
                                <div class="h-7 w-7 rounded-full border-2 border-white bg-slate-300"></div>
                                <div class="h-7 w-7 rounded-full border-2 border-white bg-slate-200"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-base font-semibold text-slate-900">Recent Activity</h2>
            <div class="mt-6 space-y-5 text-sm text-slate-600">
                @foreach ([
                    ['Completed', 'Project Proposal', '2 hours ago', 'bg-brand-500'],
                    ['Updated', 'Sprint Goals', '4 hours ago', 'bg-amber-500'],
                    ['Added', 'Marketing Assets', 'Yesterday', 'bg-emerald-500'],
                ] as [$action, $item, $time, $dot])
                    <div class="flex items-start gap-3">
                        <span class="mt-1 h-2.5 w-2.5 rounded-full {{ $dot }}"></span>
                        <div>
                            <p>{{ $action }} <span class="font-semibold text-slate-900">{{ $item }}</span></p>
                            <p class="text-xs text-slate-500">{{ $time }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script>
        const styles = getComputedStyle(document.documentElement);
        const brandColor = styles.getPropertyValue('--color-brand-500').trim() || '#1a73e8';
        const slate200 = styles.getPropertyValue('--color-slate-200').trim() || '#e2e8f0';
        const slate400 = styles.getPropertyValue('--color-slate-400').trim() || '#94a3b8';
        const dailyGoalsCtx = document.getElementById('dailyGoalsChart');
        if (dailyGoalsCtx) {
            new Chart(dailyGoalsCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Done', 'Remaining'],
                    datasets: [{
                        data: [75, 25],
                        backgroundColor: [brandColor, slate200],
                        borderWidth: 0,
                    }],
                },
                options: {
                    cutout: '70%',
                    plugins: {
                        legend: { display: false },
                        tooltip: { enabled: true },
                    },
                },
            });
        }

        const weeklyCtx = document.getElementById('weeklyPerformanceChart');
        if (weeklyCtx) {
            new Chart(weeklyCtx, {
                type: 'bar',
                data: {
                    labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
                    datasets: [{
                        data: [42, 58, 40, 75, 50, 32, 68],
                        backgroundColor: brandColor,
                        borderRadius: 12,
                        barThickness: 14,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { color: slate400, font: { size: 11 } },
                        },
                        y: {
                            display: false,
                            grid: { display: false },
                        },
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: { enabled: true },
                    },
                },
            });
        }
    </script>
</x-app-layout>
