<x-app-layout active="categories" workspace="Daily Task Tracker" plan="Task Management">
    <div class="flex flex-wrap items-start justify-between gap-6">
        <div>
            <h1 class="text-3xl font-semibold text-slate-900 dark:text-slate-100">Categories</h1>
            <p class="mt-2 max-w-2xl text-sm text-slate-500 dark:text-slate-400">
                Organize your workflow by segmenting tasks into specialized buckets for maximum kinetic efficiency.
            </p>
        </div>
        <x-buttons.primary class="px-5 py-3">
            <x-icons.plus />
            Add New Category
        </x-buttons.primary>
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950">
            <div class="flex items-center justify-between text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">
                <span class="h-1.5 w-10 rounded-full bg-brand-500"></span>
                <span>ID: CAT-01</span>
            </div>
            <h2 class="mt-6 text-2xl font-semibold text-slate-900 dark:text-slate-100">Work</h2>
            <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Professional objectives and deadlines.</p>
            <div class="mt-6 flex items-end gap-3">
                <span class="text-4xl font-semibold text-brand-500">24</span>
                <span class="text-xs uppercase tracking-[0.25em] text-slate-400">Tasks Pending</span>
            </div>
            <div class="mt-6 flex items-center justify-between gap-3">
                <x-buttons.outline class="w-full justify-center py-2">Edit</x-buttons.outline>
                <button class="text-sm font-semibold text-rose-500 hover:text-rose-600">Delete</button>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950">
            <div class="flex items-center justify-between text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600 dark:bg-amber-500/10 dark:text-amber-300">
                    <x-icons.user />
                </span>
                <span>ID: CAT-02</span>
            </div>
            <h2 class="mt-6 text-2xl font-semibold text-slate-900 dark:text-slate-100">Personal</h2>
            <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Self-care, home, and hobbies.</p>
            <div class="mt-6 flex items-end gap-3">
                <span class="text-4xl font-semibold text-amber-500">12</span>
                <span class="text-xs uppercase tracking-[0.25em] text-slate-400">Tasks Pending</span>
            </div>
            <div class="mt-6 flex items-center justify-between gap-3">
                <x-buttons.outline class="w-full justify-center py-2">Edit</x-buttons.outline>
                <button class="text-sm font-semibold text-rose-500 hover:text-rose-600">Delete</button>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-900 bg-slate-900 p-6 text-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-center justify-between text-xs font-semibold uppercase tracking-[0.3em] text-slate-300">
                <span class="rounded-full bg-brand-500 px-3 py-1 text-[10px]">High Priority</span>
                <span>ID: CAT-03</span>
            </div>
            <h2 class="mt-6 text-2xl font-semibold">Fitness</h2>
            <p class="mt-2 text-sm text-slate-300">Health, gym, and nutrition logs.</p>
            <div class="mt-6 flex items-end gap-3">
                <span class="text-4xl font-semibold">08</span>
                <span class="text-xs uppercase tracking-[0.25em] text-slate-300">Tasks Pending</span>
            </div>
            <div class="mt-6 flex items-center justify-between gap-3">
                <button class="flex-1 rounded-xl bg-slate-700 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-600">Edit</button>
                <button class="text-sm font-semibold text-sky-300 hover:text-sky-200">Delete</button>
            </div>
        </div>
    </div>

    <div class="mt-8 flex flex-wrap items-center justify-between gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-950">
        <div class="flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-500 dark:bg-slate-900 dark:text-slate-300">
                <x-icons.cart />
            </div>
            <div>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Shopping</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">Groceries, hardware, and equipment.</p>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <div class="text-right">
                <p class="text-[11px] uppercase tracking-[0.3em] text-slate-400">Volume</p>
                <p class="text-2xl font-semibold text-slate-900 dark:text-slate-100">05</p>
            </div>
            <x-buttons.icon variant="outline">
                <x-icons.pencil />
            </x-buttons.icon>
            <x-buttons.icon variant="outline" class="text-rose-500 hover:text-rose-600">
                <x-icons.trash />
            </x-buttons.icon>
        </div>
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        <div class="rounded-2xl bg-brand-500 p-6 text-white shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-white/80">Global Insight</p>
            <h3 class="mt-4 text-3xl font-semibold leading-tight">Your categorization efficiency is up 14% this week.</h3>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Total Categories</p>
            <p class="mt-4 text-3xl font-semibold text-slate-900 dark:text-slate-100">04</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Active Tasks</p>
            <p class="mt-4 text-3xl font-semibold text-slate-900 dark:text-slate-100">49</p>
        </div>
    </div>
</x-app-layout>
