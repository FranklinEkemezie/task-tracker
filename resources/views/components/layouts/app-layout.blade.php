@props([
    'active' => 'tasks',
    'workspace' => 'Project Management',
    'plan' => 'Standard Plan',
])

<x-layouts.base-layout>
    <div class="flex min-h-screen">
        <aside class="hidden w-72 flex-col border-r border-slate-200 bg-white px-6 py-6 lg:flex">
            <div class="flex items-center gap-3">
                    <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-brand-50 text-brand-500">
                        <x-icons.logo-mark />
                    </span>
                <div>
                    <p class="text-sm font-semibold text-slate-900">{{ $workspace }}</p>
                    <p class="text-xs text-slate-500">{{ $plan }}</p>
                </div>
            </div>

            <nav class="mt-10 space-y-2 text-sm font-medium">
                <a href="#" class="{{ $active === 'dashboard' ? 'bg-brand-50 text-brand-500' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                    <x-icons.dashboard />
                    Dashboard
                </a>
                <a href="{{ route('tasks.completed') }}" class="{{ $active === 'tasks' ? 'bg-brand-50 text-brand-500' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                    <x-icons.tasks />
                    Tasks
                </a>
                <a href="#" class="{{ $active === 'projects' ? 'bg-brand-50 text-brand-500' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                    <x-icons.projects />
                    Projects
                </a>
                <a href="#" class="{{ $active === 'team' ? 'bg-brand-50 text-brand-500' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                    <x-icons.team />
                    Team
                </a>
            </nav>

            <div class="mt-auto space-y-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100">
                        <x-icons.logout />
                        Log Out
                    </button>
                </form>

                <button class="flex w-full items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100">
                    <x-icons.settings />
                    Settings
                </button>

                <div class="rounded-2xl bg-slate-100/70 p-4">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-slate-400">Storage</p>
                    <div class="mt-3 h-2 w-full rounded-full bg-slate-200">
                        <div class="h-2 w-2/3 rounded-full bg-brand-500"></div>
                    </div>
                    <p class="mt-2 text-xs text-slate-500">7.5 GB of 10 GB used</p>
                </div>
            </div>
        </aside>

        <div class="flex min-w-0 flex-1 flex-col">
            <header class="sticky top-0 z-10 border-b border-slate-200 bg-white/80 backdrop-blur">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center gap-3">
                        <button type="button" class="flex h-10 w-10 items-center justify-center rounded-2xl bg-brand-50 text-brand-500 lg:hidden" data-sidebar-toggle>
                            <x-icons.menu />
                        </button>
                        <div>
                            <p class="text-sm font-semibold text-slate-900">Task Dashboard</p>
                            <p class="text-xs text-slate-500">Manage your team focus</p>
                        </div>
                    </div>
                    <div class="flex flex-1 items-center justify-center px-6">
                        <div class="relative hidden w-full max-w-2xl md:flex">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                <x-icons.search />
                            </span>
                            <input
                                type="text"
                                placeholder="Search tasks, files, members..."
                                class="w-full rounded-2xl border border-transparent bg-slate-100 py-2 pl-11 pr-4 text-sm text-slate-600 placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-brand-500/10"
                            />
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <x-buttons.icon>
                            <x-icons.bell />
                        </x-buttons.icon>
                        <x-buttons.icon>
                            <x-icons.question-mark />
                        </x-buttons.icon>
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
                    <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-brand-50 text-brand-500">
                        <x-icons.logo-mark />
                    </span>
                <div>
                    <p class="text-sm font-semibold text-slate-900">{{ $workspace }}</p>
                    <p class="text-xs text-slate-500">{{ $plan }}</p>
                </div>
            </div>
            <x-buttons.icon size="sm" variant="outline" data-sidebar-close>
                <x-icons.close />
            </x-buttons.icon>
        </div>

        <nav class="mt-10 space-y-2 text-sm font-medium">
            <a href="#" class="{{ $active === 'dashboard' ? 'bg-brand-50 text-brand-500' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                <x-icons.dashboard />
                Dashboard
            </a>
            <a href="{{ route('tasks.completed') }}" class="{{ $active === 'tasks' ? 'bg-brand-50 text-brand-500' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                <x-icons.tasks />
                Tasks
            </a>
            <a href="#" class="{{ $active === 'projects' ? 'bg-brand-50 text-brand-500' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                <x-icons.projects />
                Projects
            </a>
            <a href="#" class="{{ $active === 'team' ? 'bg-brand-50 text-brand-500' : 'text-slate-600 hover:bg-slate-100' }} flex items-center gap-3 rounded-xl px-3 py-2">
                <x-icons.team />
                Team
            </a>
        </nav>

        <div class="mt-auto space-y-4">
            <button class="flex w-full items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100">
                <x-icons.settings />
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
