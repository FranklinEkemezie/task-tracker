<x-layouts.task-layout
    title="In Progress Tasks"
    subtitle="You have 4 tasks currently active across 2 projects."
    activeTab="in-progress"
    workspace="Project Hub"
    plan="Premium Plan"
>
    <div class="grid gap-6 lg:grid-cols-2">
        @foreach ([
            ['Mobile App Redesign', 'Designing the new component library and high-fidelity...', '65%', 'High Priority', 'Due in 2 days', 'bg-amber-100 text-amber-700', 'bg-[radial-gradient(circle_at_30%_30%,#d6efe7,#9ab7ad)]'],
            ['API Documentation', 'Updating the public API documentation with the new v...', '30%', 'Medium', 'Due in 5 days', 'bg-blue-100 text-blue-700', 'bg-[linear-gradient(135deg,#2b7a7f,#185a6d)] text-white'],
            ['User Onboarding Fix', 'Fixing the bottleneck in the step 3 of the user onboarding...', '90%', 'Urgent', 'Today', 'bg-red-100 text-red-700', 'bg-[radial-gradient(circle_at_30%_30%,#f8efe5,#f0dac5)]'],
            ['Marketing Assets', 'Preparation of social media banners and email templates...', '15%', 'Low', 'Due in 12 days', 'bg-emerald-100 text-emerald-700', 'bg-[linear-gradient(135deg,#f0f2f5,#dfe7ef)]'],
        ] as [$title, $desc, $progress, $priority, $due, $badge, $bg])
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-950">
                <div class="flex gap-4">
                    <div class="flex h-24 w-32 items-center justify-center rounded-2xl {{ $bg }}">
                        <span class="text-sm font-semibold text-white/80"></span>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between text-xs">
                            <span class="rounded-full px-3 py-1 {{ $badge }} font-semibold uppercase tracking-[0.15em]">{{ $priority }}</span>
                            <span class="text-slate-400">{{ $due }}</span>
                        </div>
                        <h3 class="mt-3 text-lg font-semibold text-slate-900 dark:text-slate-100">{{ $title }}</h3>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">{{ $desc }}</p>
                        <div class="mt-4 flex items-center justify-between text-xs font-medium text-slate-500 dark:text-slate-400">
                            <span>Progress</span>
                            <span class="text-brand-500">{{ $progress }}</span>
                        </div>
                        <div class="mt-2 h-2 w-full rounded-full bg-slate-100 dark:bg-slate-900">
                            <div class="h-2 rounded-full bg-brand-500" style="width: {{ $progress }}"></div>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="flex -space-x-2">
                                <div class="h-8 w-8 rounded-full border-2 border-white bg-slate-200 dark:border-slate-950 dark:bg-slate-700"></div>
                                <div class="h-8 w-8 rounded-full border-2 border-white bg-slate-300 dark:border-slate-950 dark:bg-slate-600"></div>
                                <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-brand-500 text-xs font-semibold text-white">+2</div>
                            </div>
                            <x-buttons.outline type="button" class="px-4 py-1.5 text-xs">Details</x-buttons.outline>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layouts.task-layout>
