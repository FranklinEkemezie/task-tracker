@props(['categories'])
<x-app-layout active="categories" workspace="Daily Task Tracker" plan="Task Management">
    {{-- Section: Page header --}}
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

    {{-- Section: Summary stats --}}
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

    {{-- Section: Category cards --}}
    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        @if(! empty($categories))
            @foreach($categories as $category)
                <div class="flex flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950">
                    <h2 class="mt-6 text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ $category['name'] }}</h2>
                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Professional objectives and deadlines.</p>
                    <div class="mt-6 flex items-end gap-3">
                        <span class="text-4xl font-semibold text-brand-500">24</span>
                        <span class="text-xs uppercase tracking-[0.25em] text-slate-400">Tasks Pending</span>
                    </div>
                    <div class="grid grid-cols-2 mt-4">
                        <div>
                            <p class="text-xs flex gap-2 uppercase text-slate-400">
                                <x-icons.calendar />
                                Created At
                            </p>
                            <p class="text-sm text-slate-500 dark:text-slate-400">
                                {{ $category['created_at'] }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs flex gap-2 uppercase text-slate-400">
                                <x-icons.calendar />
                                Last Updated
                            </p>
                            <p class="text-sm text-slate-500 dark:text-slate-400">
                                {{ $category['updated_at'] }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-auto pt-6 flex items-center justify-between gap-3">
                        <x-buttons.outline
                            class="w-full justify-center py-2"
                            data-category-modal-open
                            data-category-id="{{ $category['id'] }}"
                            data-category-name="{{ $category['name'] }}"
                            data-category-desc="Professional objectives and deadlines."
                            data-category-color="bg-brand-500"
                        >
                            Edit
                        </x-buttons.outline>
                        <button
                            class="text-sm font-semibold text-rose-500 hover:text-rose-600"
                            data-category-delete-open
                            data-category-id="{{ $category['id'] }}"
                        >
                            Delete
                        </button>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

    {{-- Section: Pagination --}}
    <div class="mt-6">
        {{ $links() }}
    </div>

    {{-- Modals --}}
    <x-partials.categories.edit />
    <x-partials.categories.create />
    <x-partials.categories.destroy />
</x-app-layout>
