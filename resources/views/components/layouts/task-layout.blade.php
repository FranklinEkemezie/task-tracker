@props([
    'title' => 'Tasks',
    'subtitle' => null,
    'activeTab' => 'all',
    'workspace' => 'Project Hub',
    'plan' => 'Premium Plan',
    'showCreate' => true,
    'createLabel' => 'Create New Task',
])

@php
    $tabs = [
        ['key' => 'all', 'label' => 'All Tasks', 'route' => 'tasks.all'],
        ['key' => 'todo', 'label' => 'To Do', 'route' => 'tasks.todo'],
        ['key' => 'in-progress', 'label' => 'In Progress', 'route' => 'tasks.in-progress'],
        ['key' => 'completed', 'label' => 'Completed', 'route' => 'tasks.completed'],
    ];
@endphp

<x-app-layout active="tasks" :workspace="$workspace" :plan="$plan">
    <div class="flex flex-wrap items-start justify-between gap-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ $title }}</h1>
            @if ($subtitle)
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">{{ $subtitle }}</p>
            @endif
        </div>
        <div class="flex flex-wrap items-center gap-3">
            @if ($showCreate)
                <x-buttons.primary class="px-4 py-2" data-task-modal-open>
                    <x-icons.plus />
                    {{ $createLabel }}
                </x-buttons.primary>
            @endif
            @isset($actions)
                {{ $actions }}
            @endisset
        </div>
    </div>

    <div class="mt-6 flex flex-wrap items-center gap-6 border-b border-slate-200 text-sm font-medium dark:border-slate-800">
        @foreach ($tabs as $tab)
            @php
                $isActive = $activeTab === $tab['key'];
            @endphp
            <a
                href="{{ route($tab['route']) }}"
                class="pb-3 {{ $isActive ? 'border-b-2 border-brand-500 text-brand-500' : 'text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200' }}"
            >
                {{ $tab['label'] }}
            </a>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $slot }}
    </div>

    <div class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 lg:p-8 flex" data-task-modal>
        <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-200" data-task-modal-overlay></div>
        <div class="relative z-10 w-full max-w-2xl rounded-2xl bg-white shadow-2xl opacity-0 transition-all duration-200 translate-y-4 scale-95 dark:bg-slate-950" data-task-modal-panel>
            <div class="flex items-start justify-between border-b border-slate-200 px-8 py-6 dark:border-slate-800">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-slate-100">Create New Task</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Add details to your kinetic workspace.</p>
                </div>
                <button type="button" class="rounded-full p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-600 dark:hover:bg-slate-900" data-task-modal-close>
                    <x-icons.x-mark />
                </button>
            </div>

            <div class="space-y-6 px-8 py-6">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Task Title</p>
                    <input
                        type="text"
                        placeholder="e.g., Define System Architecture"
                        class="mt-3 w-full border-b border-slate-200 bg-transparent pb-3 text-lg font-semibold text-slate-900 placeholder:text-slate-300 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:text-slate-100 dark:placeholder:text-slate-600"
                    />
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Category</p>
                        <div class="relative mt-3">
                            <select
                                class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                                data-task-category-select
                            >
                                <option value="__none__">No category</option>
                                <option value="Design" selected>Design</option>
                                <option value="Development">Development</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Operations">Operations</option>
                                <option value="__new__">+ Create new category</option>
                            </select>
                            <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-slate-400">
                                <x-icons.chevron-down />
                            </span>
                        </div>
                        <div class="mt-3 hidden" data-task-category-new>
                            <input
                                type="text"
                                placeholder="New category name"
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:placeholder:text-slate-500"
                            />
                        </div>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Due Date</p>
                        <div class="relative mt-3">
                            <input
                                type="date"
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:placeholder:text-slate-500"
                            />
                            <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-slate-400">
                                <x-icons.calendar />
                            </span>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Description</p>
                    <textarea
                        rows="4"
                        placeholder="Deep dive into the kinetic requirements..."
                        class="mt-3 w-full rounded-xl border border-slate-200 bg-white p-4 text-sm text-slate-600 placeholder:text-slate-400 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:placeholder:text-slate-500"
                    ></textarea>
                </div>

                <label class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-300">
                    <input type="checkbox" class="h-4 w-4 rounded border-slate-300 text-brand-500 focus:ring-brand-500" />
                    Recurring Task
                    <span class="flex h-5 w-5 items-center justify-center rounded-full bg-slate-100 text-[10px] font-semibold text-slate-500 dark:bg-slate-900 dark:text-slate-300">i</span>
                </label>
            </div>

            <div class="flex flex-wrap items-center justify-end gap-3 border-t border-slate-200 px-8 py-6 dark:border-slate-800">
                <x-buttons.text type="button" data-task-modal-close>Cancel</x-buttons.text>
                <x-buttons.primary type="button" class="px-5 py-2">Save Task</x-buttons.primary>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 lg:p-8 flex" data-task-edit-modal>
        <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-200" data-task-modal-overlay></div>
        <div class="relative z-10 w-full max-w-2xl rounded-2xl bg-white shadow-2xl opacity-0 transition-all duration-200 translate-y-4 scale-95 dark:bg-slate-950" data-task-modal-panel>
            <div class="flex items-start justify-between border-b border-slate-200 px-8 py-6 dark:border-slate-800">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-slate-100">Edit Task</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Update the details for this task.</p>
                </div>
                <button type="button" class="rounded-full p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-600 dark:hover:bg-slate-900" data-task-modal-close>
                    <x-icons.x-mark />
                </button>
            </div>

            <div class="space-y-6 px-8 py-6">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Task Title</p>
                    <input
                        type="text"
                        value="Update Design System"
                        class="mt-3 w-full border-b border-slate-200 bg-transparent pb-3 text-lg font-semibold text-slate-900 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:text-slate-100"
                    />
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Category</p>
                        <div class="relative mt-3">
                            <select
                                class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                                data-task-category-select
                            >
                                <option value="__none__">No category</option>
                                <option value="Design" selected>Design</option>
                                <option value="Development">Development</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Operations">Operations</option>
                                <option value="__new__">+ Create new category</option>
                            </select>
                            <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-slate-400">
                                <x-icons.chevron-down />
                            </span>
                        </div>
                        <div class="mt-3 hidden" data-task-category-new>
                            <input
                                type="text"
                                placeholder="New category name"
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:placeholder:text-slate-500"
                            />
                        </div>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Due Date</p>
                        <div class="relative mt-3">
                            <input
                                type="date"
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                            />
                            <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-slate-400">
                                <x-icons.calendar />
                            </span>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Description</p>
                    <textarea
                        rows="4"
                        class="mt-3 w-full rounded-xl border border-slate-200 bg-white p-4 text-sm text-slate-600 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                    >Refine the task requirements and update relevant assets.</textarea>
                </div>
            </div>

            <div class="flex flex-wrap items-center justify-end gap-3 border-t border-slate-200 px-8 py-6 dark:border-slate-800">
                <x-buttons.text type="button" data-task-modal-close>Cancel</x-buttons.text>
                <x-buttons.primary type="button" class="px-5 py-2">Save Changes</x-buttons.primary>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 lg:p-8 flex" data-task-delete-modal>
        <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-200" data-task-modal-overlay></div>
        <div class="relative z-10 w-full max-w-md rounded-2xl bg-white shadow-2xl opacity-0 transition-all duration-200 translate-y-4 scale-95 dark:bg-slate-950" data-task-modal-panel>
            <div class="flex items-start justify-between border-b border-slate-200 px-6 py-5 dark:border-slate-800">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Delete Task</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">This action cannot be undone.</p>
                </div>
                <button type="button" class="rounded-full p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-600 dark:hover:bg-slate-900" data-task-modal-close>
                    <x-icons.x-mark />
                </button>
            </div>
            <div class="px-6 py-5">
                <p class="text-sm text-slate-600 dark:text-slate-300">Are you sure you want to delete this task? This will remove it from your board permanently.</p>
            </div>
            <div class="flex flex-wrap items-center justify-end gap-3 border-t border-slate-200 px-6 py-5 dark:border-slate-800">
                <x-buttons.text type="button" data-task-modal-close>Cancel</x-buttons.text>
                <button type="button" class="inline-flex items-center justify-center rounded-xl bg-rose-500 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rose-600">Delete Task</button>
            </div>
        </div>
    </div>
</x-app-layout>
