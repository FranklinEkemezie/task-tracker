<x-app-layout active="tasks" workspace="Project Management" plan="Standard Plan">
    <div class="flex flex-wrap items-start justify-between gap-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Tasks</h1>
            <p class="mt-1 text-sm text-slate-500">Manage and track your team&#39;s progress.</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm shadow-sm">
            <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Completed</p>
            <p class="mt-1 text-2xl font-semibold text-[#1a73e8]">24</p>
        </div>
    </div>

    <div class="mt-6 flex flex-wrap items-center gap-6 border-b border-slate-200 text-sm font-medium text-slate-500">
        <button class="pb-3">All Tasks</button>
        <button class="pb-3">In Progress</button>
        <button class="pb-3 border-b-2 border-[#1a73e8] text-[#1a73e8]">Completed</button>
    </div>

    <div class="mt-6 space-y-4">
        @foreach ([
            ['Finalize marketing assets for Q3', 'Completed 2 days ago', 'Marketing'],
            ['Update client documentation', 'Completed yesterday', 'Ops'],
            ['Submit quarterly budget report', 'Completed 4 hours ago', 'Finance'],
            ['Review team performance metrics', 'Completed 1 hour ago', 'HR'],
        ] as [$title, $meta, $tag])
            <div class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#1a73e8] text-white">
                    <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m5 12 4 4 10-10" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-slate-900 line-through decoration-slate-300">{{ $title }}</p>
                    <div class="mt-1 flex items-center gap-3 text-xs text-slate-500">
                        <span class="flex items-center gap-1">
                            <svg aria-hidden="true" viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.6">
                                <rect x="4" y="5" width="16" height="15" rx="2" />
                                <path d="M8 3v4" />
                                <path d="M16 3v4" />
                            </svg>
                            {{ $meta }}
                        </span>
                        <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-500">{{ $tag }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8 flex flex-wrap items-center justify-between gap-4 text-sm text-slate-500">
        <span>Showing 4 of 24 completed tasks</span>
        <div class="flex items-center gap-2">
            <button class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-slate-600">Previous</button>
            <button class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-slate-600">Next</button>
        </div>
    </div>
</x-app-layout>
