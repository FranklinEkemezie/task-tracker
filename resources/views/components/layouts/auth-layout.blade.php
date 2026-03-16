<x-layouts.base-layout>
    <div class="flex min-h-screen flex-col bg-canvas dark:bg-slate-950">
        <header class="w-full border-b border-slate-200/70 bg-white/70 backdrop-blur dark:border-slate-800 dark:bg-slate-950/70">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4 sm:px-6">
                <div class="flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-500">
                            <x-icons.circle-check />
                        </span>
                    <span class="text-lg font-semibold text-slate-900 dark:text-slate-100">Daily Task Tracker</span>
                </div>
                <div class="text-sm text-slate-600 dark:text-slate-300">
                    {{ $header ?? '' }}
                </div>
            </div>
        </header>

        <main class="flex-1">
            <div class="mx-auto flex w-full max-w-6xl flex-1 items-center justify-center px-4 py-10 sm:px-6">
                {{ $slot }}
            </div>
        </main>

        <footer class="mt-auto">
            <div class="mx-auto w-full max-w-6xl px-4 pb-10 text-center text-xs text-slate-500 dark:text-slate-400 sm:px-6">
                @isset($footer)
                    {{ $footer }}
                @else
                    <div class="flex flex-wrap justify-center gap-6 uppercase tracking-[0.2em] text-[11px] text-slate-400">
                        <a href="#" class="transition hover:text-slate-600 dark:hover:text-slate-200">Privacy</a>
                        <a href="#" class="transition hover:text-slate-600 dark:hover:text-slate-200">Terms</a>
                        <a href="#" class="transition hover:text-slate-600 dark:hover:text-slate-200">Help</a>
                        <a href="#" class="transition hover:text-slate-600 dark:hover:text-slate-200">Contact</a>
                    </div>
                    <p class="mt-4">? {{ date('Y') }} Daily Task Tracker Inc. All rights reserved.</p>
                @endisset
            </div>
        </footer>
    </div>

</x-layouts.base-layout>
