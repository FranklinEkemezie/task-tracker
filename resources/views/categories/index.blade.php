<x-app-layout active="categories" workspace="Daily Task Tracker" plan="Task Management">
    <div class="flex flex-wrap items-start justify-between gap-6">
        <div>
            <h1 class="text-3xl font-semibold text-slate-900 dark:text-slate-100">Categories</h1>
            <p class="mt-2 max-w-2xl text-sm text-slate-500 dark:text-slate-400">
                Organize your workflow by segmenting tasks into specialized buckets for maximum kinetic efficiency.
            </p>
        </div>
        <x-buttons.primary class="px-5 py-3" data-category-create-open>
            <x-icons.plus />
            Add New Category
        </x-buttons.primary>
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

    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        <div class="flex flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950">
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
            <div class="mt-auto pt-6 flex items-center justify-between gap-3">
                <x-buttons.outline class="w-full justify-center py-2" data-category-modal-open data-category-name="Work" data-category-desc="Professional objectives and deadlines." data-category-color="bg-brand-500">Edit</x-buttons.outline>
                <button class="text-sm font-semibold text-rose-500 hover:text-rose-600" data-category-delete-open>Delete</button>
            </div>
        </div>

        <div class="flex flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950">
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
            <div class="mt-auto pt-6 flex items-center justify-between gap-3">
                <x-buttons.outline class="w-full justify-center py-2" data-category-modal-open data-category-name="Personal" data-category-desc="Self-care, home, and hobbies." data-category-color="bg-amber-500">Edit</x-buttons.outline>
                <button class="text-sm font-semibold text-rose-500 hover:text-rose-600" data-category-delete-open>Delete</button>
            </div>
        </div>

        <div class="flex flex-col rounded-2xl border border-slate-900 bg-slate-900 p-6 text-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
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
            <div class="mt-auto pt-6 flex items-center justify-between gap-3">
                <button class="flex-1 rounded-xl bg-slate-700 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-600" data-category-modal-open data-category-name="Fitness" data-category-desc="Health, gym, and nutrition logs." data-category-color="bg-slate-900">Edit</button>
                <button class="text-sm font-semibold text-sky-300 hover:text-sky-200" data-category-delete-open>Delete</button>
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
            <x-buttons.icon variant="outline" data-category-modal-open data-category-name="Shopping" data-category-desc="Groceries, hardware, and equipment." data-category-color="bg-slate-700">
                <x-icons.pencil />
            </x-buttons.icon>
            <x-buttons.icon variant="outline" class="text-rose-500 hover:text-rose-600" data-category-delete-open>
                <x-icons.trash />
            </x-buttons.icon>
        </div>
    </div>

    <div class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 lg:p-8 flex" data-category-modal>
        <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-200" data-category-modal-overlay></div>
        <div class="relative z-10 w-full max-w-2xl rounded-2xl bg-white shadow-2xl opacity-0 transition-all duration-200 translate-y-4 scale-95 dark:bg-slate-950 max-h-[calc(100vh-4rem)] overflow-y-auto" data-category-modal-panel>
            <div class="flex items-start justify-between border-b border-slate-200 px-8 py-6 dark:border-slate-800">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-slate-100">Edit Category</h2>
                    <p class="mt-1 text-xs uppercase tracking-[0.3em] text-slate-400">Category Configuration</p>
                </div>
                <button type="button" class="rounded-full p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-600 dark:hover:bg-slate-900" data-category-modal-close>
                    <x-icons.x-mark />
                </button>
            </div>

            <div class="grid gap-8 px-8 py-6 lg:grid-cols-[1.2fr_0.8fr]">
                <div class="space-y-6">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Category Name</p>
                        <input
                            type="text"
                            value="Personal Development"
                            class="mt-3 w-full border-b border-slate-200 bg-transparent pb-3 text-lg font-semibold text-slate-900 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:text-slate-100"
                            data-category-name-input
                        />
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Description</p>
                        <textarea
                            rows="4"
                            class="mt-3 w-full rounded-xl border border-slate-200 bg-slate-50 p-4 text-sm text-slate-600 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                            data-category-desc-input
                        >This category focuses on long-term growth, including morning routines, reading goals, and mental health maintenance.</textarea>
                    </div>
                </div>
                <div class="space-y-6">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Select Color</p>
                        <div class="mt-3 grid grid-cols-4 gap-3">
                            @foreach ([
                                'bg-brand-500',
                                'bg-amber-500',
                                'bg-slate-700',
                                'bg-blue-600',
                                'bg-violet-500',
                                'bg-emerald-500',
                                'bg-rose-500',
                                'bg-slate-900'
                            ] as $color)
                                <button type="button" class="flex h-12 w-12 items-center justify-center rounded-xl {{ $color }} ring-2 ring-transparent ring-offset-2 ring-offset-white focus:ring-brand-500 dark:ring-offset-slate-950" data-category-color="{{ $color }}"></button>
                            @endforeach
                        </div>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-900">
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-brand-500">Live Preview</p>
                        <div class="mt-3 flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-500 text-white" data-category-preview-color>
                                <x-icons.sparkles />
                            </div>
                            <p class="text-sm font-semibold text-slate-900 dark:text-slate-100" data-category-preview-title>Personal Dev...</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap items-center justify-end gap-3 border-t border-slate-200 px-8 py-6 dark:border-slate-800">
                <x-buttons.text type="button" data-category-modal-close>Cancel</x-buttons.text>
                <x-buttons.primary type="button" class="px-5 py-2">Save Changes</x-buttons.primary>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 lg:p-8 flex" data-category-create-modal>
        <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-200" data-category-modal-overlay></div>
        <div class="relative z-10 w-full max-w-2xl rounded-2xl bg-white shadow-2xl opacity-0 transition-all duration-200 translate-y-4 scale-95 dark:bg-slate-950 max-h-[calc(100vh-4rem)] overflow-y-auto" data-category-modal-panel>
            <div class="flex items-start justify-between border-b border-slate-200 px-8 py-6 dark:border-slate-800">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-slate-100">Create Category</h2>
                    <p class="mt-1 text-xs uppercase tracking-[0.3em] text-slate-400">Category Configuration</p>
                </div>
                <button type="button" class="rounded-full p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-600 dark:hover:bg-slate-900" data-category-modal-close>
                    <x-icons.x-mark />
                </button>
            </div>

            <div class="grid gap-8 px-8 py-6 lg:grid-cols-[1.2fr_0.8fr]">
                <div class="space-y-6">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Category Name</p>
                        <input
                            type="text"
                            placeholder="New category name"
                            class="mt-3 w-full border-b border-slate-200 bg-transparent pb-3 text-lg font-semibold text-slate-900 placeholder:text-slate-300 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:text-slate-100 dark:placeholder:text-slate-600"
                        />
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Description</p>
                        <textarea
                            rows="4"
                            placeholder="Describe what this category represents..."
                            class="mt-3 w-full rounded-xl border border-slate-200 bg-slate-50 p-4 text-sm text-slate-600 placeholder:text-slate-400 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:placeholder:text-slate-500"
                        ></textarea>
                    </div>
                </div>
                <div class="space-y-6">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Select Color</p>
                        <div class="mt-3 grid grid-cols-4 gap-3">
                            @foreach ([
                                'bg-brand-500',
                                'bg-amber-500',
                                'bg-slate-700',
                                'bg-blue-600',
                                'bg-violet-500',
                                'bg-emerald-500',
                                'bg-rose-500',
                                'bg-slate-900'
                            ] as $color)
                                <button type="button" class="flex h-12 w-12 items-center justify-center rounded-xl {{ $color }} ring-2 ring-transparent ring-offset-2 ring-offset-white focus:ring-brand-500 dark:ring-offset-slate-950" data-category-color="{{ $color }}"></button>
                            @endforeach
                        </div>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-900">
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-brand-500">Live Preview</p>
                        <div class="mt-3 flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-500 text-white" data-category-preview-color>
                                <x-icons.sparkles />
                            </div>
                            <p class="text-sm font-semibold text-slate-900 dark:text-slate-100" data-category-preview-title>New Category</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap items-center justify-end gap-3 border-t border-slate-200 px-8 py-6 dark:border-slate-800">
                <x-buttons.text type="button" data-category-modal-close>Cancel</x-buttons.text>
                <x-buttons.primary type="button" class="px-5 py-2">Save Category</x-buttons.primary>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 lg:p-8 flex" data-category-delete-modal>
        <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-200" data-category-modal-overlay></div>
        <div class="relative z-10 w-full max-w-md rounded-2xl bg-white shadow-2xl opacity-0 transition-all duration-200 translate-y-4 scale-95 dark:bg-slate-950" data-category-modal-panel>
            <div class="flex items-start justify-between border-b border-slate-200 px-6 py-5 dark:border-slate-800">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Delete Category</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">This action cannot be undone.</p>
                </div>
                <button type="button" class="rounded-full p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-600 dark:hover:bg-slate-900" data-category-modal-close>
                    <x-icons.x-mark />
                </button>
            </div>
            <div class="px-6 py-5">
                <p class="text-sm text-slate-600 dark:text-slate-300">Are you sure you want to delete this category? All tasks inside it will remain uncategorized.</p>
            </div>
            <div class="flex flex-wrap items-center justify-end gap-3 border-t border-slate-200 px-6 py-5 dark:border-slate-800">
                <x-buttons.text type="button" data-category-modal-close>Cancel</x-buttons.text>
                <button type="button" class="inline-flex items-center justify-center rounded-xl bg-rose-500 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rose-600">Delete Category</button>
            </div>
        </div>
    </div>
</x-app-layout>
