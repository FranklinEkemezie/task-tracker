{{-- Modal: Delete task --}}
<div class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 lg:p-8" data-task-delete-modal>
    <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-200" data-task-modal-overlay></div>

    <form
        method="post"
        class="relative z-10 w-full max-w-md rounded-2xl bg-white shadow-2xl opacity-0 transition-all duration-200 translate-y-4 scale-95 dark:bg-slate-950 max-h-[calc(100vh-4rem)] overflow-y-auto"
        data-task-modal-panel
        data-task-delete-form
        data-task-delete-action="{{ route('tasks.destroy', '[id]') }}"
    >
        @csrf
        @method('DELETE')

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
            <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-rose-500 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rose-600">Delete Task</button>
        </div>
    </form>
</div>
