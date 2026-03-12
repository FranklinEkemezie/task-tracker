@props([
    'active' => 'tasks',
    'workspace' => 'Project Management',
    'plan' => 'Standard Plan',
])

<x-layouts.base-layout>
    <div class="flex min-h-screen">
        <aside class="hidden w-72 flex-col border-r border-slate-200 bg-white px-6 py-6 lg:flex">
            <div class="flex items-center gap-3">
                    <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#eaf2ff] text-[#1a73e8]">
                        <svg aria-hidden="true" viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M5 13a7 7 0 0 1 7-7h7" />
                            <path d="M12 4v7h7" />
                            <path d="M5 13a7 7 0 0 0 7 7h7" />
                            <path d="M4 9 7 6" />
                        </svg>
                    </span>
                <div>
                    <p class="text-sm font-semibold text-slate-900">{{ $workspace }}</p>
                    <p class="text-xs text-slate-500">{{ $plan }}</p>
                </div>
            </div>

            <nav class="mt-10 space-y-2 text-sm font-medium">
                <a href="#" class="{{ $active === 'dashboard' ? 'bg-[#eaf2ff] text-[#1a73e8]' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                    <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M4 4h7v7H4z" />
                        <path d="M13 4h7v7h-7z" />
                        <path d="M4 13h7v7H4z" />
                        <path d="M13 13h7v7h-7z" />
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('tasks.completed') }}" class="{{ $active === 'tasks' ? 'bg-[#eaf2ff] text-[#1a73e8]' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                    <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="4" y="4" width="16" height="16" rx="3" />
                        <path d="m8 12 3 3 5-6" />
                    </svg>
                    Tasks
                </a>
                <a href="#" class="{{ $active === 'projects' ? 'bg-[#eaf2ff] text-[#1a73e8]' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                    <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M4 7h16" />
                        <path d="M4 7l2 12h12l2-12" />
                        <path d="M9 7V5a3 3 0 0 1 6 0v2" />
                    </svg>
                    Projects
                </a>
                <a href="#" class="{{ $active === 'team' ? 'bg-[#eaf2ff] text-[#1a73e8]' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                    <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M6 19c0-3 2.7-5 6-5s6 2 6 5" />
                        <circle cx="12" cy="8" r="3" />
                        <path d="M3 19c0-2 1.3-3.6 3.2-4.4" />
                    </svg>
                    Team
                </a>
            </nav>

            <div class="mt-auto space-y-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100">
                        <x-icons.arrow-right />
                        Log Out
                    </button>
                </form>

                <button class="flex w-full items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100">
                    <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M12 3a9 9 0 1 0 9 9" />
                        <path d="M12 7v5l3 3" />
                    </svg>
                    Settings
                </button>

                <div class="rounded-2xl bg-slate-100/70 p-4">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-slate-400">Storage</p>
                    <div class="mt-3 h-2 w-full rounded-full bg-slate-200">
                        <div class="h-2 w-2/3 rounded-full bg-[#1a73e8]"></div>
                    </div>
                    <p class="mt-2 text-xs text-slate-500">7.5 GB of 10 GB used</p>
                </div>
            </div>
        </aside>

        <div class="flex min-w-0 flex-1 flex-col">
            <header class="sticky top-0 z-10 border-b border-slate-200 bg-white/80 backdrop-blur">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center gap-3">
                        <button type="button" class="flex h-10 w-10 items-center justify-center rounded-2xl bg-[#eaf2ff] text-[#1a73e8] lg:hidden" data-sidebar-toggle>
                            <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M4 6h16" />
                                <path d="M4 12h16" />
                                <path d="M4 18h16" />
                            </svg>
                        </button>
                        <div>
                            <p class="text-sm font-semibold text-slate-900">Task Dashboard</p>
                            <p class="text-xs text-slate-500">Manage your team focus</p>
                        </div>
                    </div>
                    <div class="flex flex-1 items-center justify-center px-6">
                        <div class="hidden w-full max-w-2xl items-center gap-2 rounded-2xl bg-slate-100 px-4 py-2 text-sm text-slate-500 md:flex">
                            <svg aria-hidden="true" viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="11" cy="11" r="7" />
                                <path d="m20 20-3.5-3.5" />
                            </svg>
                            Search tasks, files, members...
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-500">
                            <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M15 17h5l-1.4-1.4a2 2 0 0 1-.6-1.4V11a6 6 0 1 0-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5" />
                                <path d="M10 21a2 2 0 0 0 4 0" />
                            </svg>
                        </button>
                        <button class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-500">
                            <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="9" />
                                <path d="M9.5 9.5a2.5 2.5 0 0 1 5 0c0 1.7-2.5 2-2.5 3.5" />
                                <path d="M12 17h.01" stroke-linecap="round" />
                            </svg>
                        </button>
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-200 text-xs font-semibold text-slate-600">
                            AR
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 px-6 py-8">
                {{ $slot }}
            </main>
        </div>
    </div>

    <div class="fixed inset-0 z-40 hidden bg-slate-900/40 lg:hidden" data-sidebar-overlay></div>
    <aside class="fixed inset-y-0 left-0 z-50 w-72 -translate-x-full flex-col border-r border-slate-200 bg-white px-6 py-6 transition-transform duration-200 lg:hidden" data-sidebar-panel>
        <div class="flex items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                    <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#eaf2ff] text-[#1a73e8]">
                        <svg aria-hidden="true" viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M5 13a7 7 0 0 1 7-7h7" />
                            <path d="M12 4v7h7" />
                            <path d="M5 13a7 7 0 0 0 7 7h7" />
                            <path d="M4 9 7 6" />
                        </svg>
                    </span>
                <div>
                    <p class="text-sm font-semibold text-slate-900">{{ $workspace }}</p>
                    <p class="text-xs text-slate-500">{{ $plan }}</p>
                </div>
            </div>
            <button type="button" class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100 text-slate-500" data-sidebar-close>
                <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M6 6l12 12" />
                    <path d="M18 6l-12 12" />
                </svg>
            </button>
        </div>

        <nav class="mt-10 space-y-2 text-sm font-medium">
            <a href="#" class="{{ $active === 'dashboard' ? 'bg-[#eaf2ff] text-[#1a73e8]' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M4 4h7v7H4z" />
                    <path d="M13 4h7v7h-7z" />
                    <path d="M4 13h7v7H4z" />
                    <path d="M13 13h7v7h-7z" />
                </svg>
                Dashboard
            </a>
            <a href="{{ route('tasks.completed') }}" class="{{ $active === 'tasks' ? 'bg-[#eaf2ff] text-[#1a73e8]' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="4" y="4" width="16" height="16" rx="3" />
                    <path d="m8 12 3 3 5-6" />
                </svg>
                Tasks
            </a>
            <a href="#" class="{{ $active === 'projects' ? 'bg-[#eaf2ff] text-[#1a73e8]' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M4 7h16" />
                    <path d="M4 7l2 12h12l2-12" />
                    <path d="M9 7V5a3 3 0 0 1 6 0v2" />
                </svg>
                Projects
            </a>
            <a href="#" class="{{ $active === 'team' ? 'bg-[#eaf2ff] text-[#1a73e8]' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M6 19c0-3 2.7-5 6-5s6 2 6 5" />
                    <circle cx="12" cy="8" r="3" />
                    <path d="M3 19c0-2 1.3-3.6 3.2-4.4" />
                </svg>
                Team
            </a>
        </nav>

        <div class="mt-auto space-y-4">
            <button class="flex w-full items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100">
                <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M12 3a9 9 0 1 0 9 9" />
                    <path d="M12 7v5l3 3" />
                </svg>
                Settings
            </button>
        </div>
    </aside>

    <script>
        const sidebarToggle = document.querySelector('[data-sidebar-toggle]');
        const sidebarPanel = document.querySelector('[data-sidebar-panel]');
        const sidebarOverlay = document.querySelector('[data-sidebar-overlay]');
        const sidebarClose = document.querySelector('[data-sidebar-close]');

        const closeSidebar = () => {
            if (!sidebarPanel || !sidebarOverlay) return;
            sidebarPanel.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        };

        const openSidebar = () => {
            if (!sidebarPanel || !sidebarOverlay) return;
            sidebarPanel.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        };

        sidebarToggle?.addEventListener('click', openSidebar);
        sidebarClose?.addEventListener('click', closeSidebar);
        sidebarOverlay?.addEventListener('click', closeSidebar);
    </script>
</x-layouts.base-layout>
