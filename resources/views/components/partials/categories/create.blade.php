{{-- Modal: Create category --}}
<div class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 lg:p-8" data-category-create-modal>
    <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-200" data-category-modal-overlay></div>

    <form
        method="post"
        action="{{ route('categories.store') }}"
        class="relative z-10 w-full max-w-2xl rounded-2xl bg-white shadow-2xl opacity-0 transition-all duration-200 translate-y-4 scale-95 dark:bg-slate-950 max-h-[calc(100vh-4rem)] overflow-y-auto"
        data-category-modal-panel
    >
        @csrf

        <div class="flex items-start justify-between border-b border-slate-200 px-8 py-6 dark:border-slate-800">
            <div>
                <h2 class="text-xl font-semibold text-slate-900 dark:text-slate-100">Create Category</h2>
                <p class="mt-1 text-xs uppercase tracking-[0.3em] text-slate-400">Category Configuration</p>
            </div>
            <button type="button" class="rounded-full p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-600 dark:hover:bg-slate-900" data-category-modal-close>
                <x-icons.x-mark />
            </button>
        </div>

        {{-- Modal body --}}
        <div class="grid gap-8 px-8 py-6 lg:grid-cols-[1.2fr_0.8fr]">
            <div class="space-y-6">
                <div>
                    <label class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400" for="create-category-name">Category Name</label>
                    <input
                        id="create-category-name"
                        name="name"
                        type="text"
                        placeholder="New category name"
                        class="mt-3 w-full border-b border-slate-200 bg-transparent pb-3 text-lg font-semibold text-slate-900 placeholder:text-slate-300 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:text-slate-100 dark:placeholder:text-slate-600"
                        data-category-name-input
                    />
                </div>
                <div>
                    <label class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400" for="create-category-description">Description</label>
                    <textarea
                        id="create-category-description"
                        rows="4"
                        name="description"
                        placeholder="Describe what this category represents..."
                        class="mt-3 w-full rounded-xl border border-slate-200 bg-slate-50 p-4 text-sm text-slate-600 placeholder:text-slate-400 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:placeholder:text-slate-500"
                        data-category-desc-input
                    ></textarea>
                </div>
            </div>
            <div class="space-y-6">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Select Color</p>
                    <input type="hidden" name="color" value="bg-brand-500" data-category-color-input />
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

        {{-- Modal footer --}}
        <div class="flex flex-wrap items-center justify-end gap-3 border-t border-slate-200 px-8 py-6 dark:border-slate-800">
            <x-buttons.text type="button" data-category-modal-close>Cancel</x-buttons.text>
            <x-buttons.primary type="submit" class="px-5 py-2">Save Category</x-buttons.primary>
        </div>
    </form>
</div>
