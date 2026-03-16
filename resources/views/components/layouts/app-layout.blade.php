@props([
    'active' => 'tasks',
    'workspace' => 'Project Management',
    'plan' => 'Standard Plan',
])

@php
    $name = auth()->user()->name ?? 'Account';
    $initials = str($name)->explode(' ')->map(fn (string $word) => $word[0] ?? '')->join('');
    $avatar = auth()->user()->avatar_url ?? null;
@endphp

<x-layouts.base-layout>
    <div class="flex min-h-screen bg-canvas">
        <aside class="hidden w-72 flex-col border-r border-slate-200 bg-white px-6 py-6 dark:border-slate-800 dark:bg-slate-950 lg:flex">
            <div class="flex items-center gap-3">
                    <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-brand-50 text-brand-500">
                        <x-icons.logo-mark />
                    </span>
                <div>
                    <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">{{ $workspace }}</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400">{{ $plan }}</p>
                </div>
            </div>

            <nav class="mt-10 space-y-2 text-sm font-medium">
                <a href="{{ route('dashboard') }}" class="{{ $active === 'dashboard' ? 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-200' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-900' }} flex items-center gap-3 rounded-xl px-3 py-2">
                    <x-icons.dashboard />
                    Dashboard
                </a>
                <a href="{{ route('tasks.completed') }}" class="{{ $active === 'tasks' ? 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-200' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-900' }} flex items-center gap-3 rounded-xl px-3 py-2">
                    <x-icons.tasks />
                    Tasks
                </a>
                <a href="{{ route('categories.index') }}" class="{{ $active === 'categories' ? 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-200' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-900' }} flex items-center gap-3 rounded-xl px-3 py-2">
                    <x-icons.categories />
                    Categories
                </a>
                <a href="#" class="{{ $active === 'projects' ? 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-200' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-900' }} flex items-center gap-3 rounded-xl px-3 py-2">
                    <x-icons.projects />
                    Projects
                </a>
                <a href="#" class="{{ $active === 'team' ? 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-200' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-900' }} flex items-center gap-3 rounded-xl px-3 py-2">
                    <x-icons.team />
                    Team
                </a>
            </nav>

            <div class="mt-auto space-y-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-900">
                        <x-icons.logout />
                        Log Out
                    </button>
                </form>

                <a href="{{ route('settings') }}" class="{{ $active === 'settings' ? 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-200' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-900' }} flex w-full items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium">
                    <x-icons.settings />
                    Settings
                </a>

                <div class="rounded-2xl border border-slate-200 bg-white p-4 dark:border-slate-800 dark:bg-slate-900">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-slate-400">Storage</p>
                    <div class="mt-3 h-2 w-full rounded-full bg-slate-200 dark:bg-slate-800">
                        <div class="h-2 w-2/3 rounded-full bg-brand-500"></div>
                    </div>
                    <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">7.5 GB of 10 GB used</p>
                </div>
            </div>
        </aside>

        <div class="flex min-w-0 flex-1 flex-col">
            <header class="sticky top-0 z-10 border-b border-slate-200 bg-white/80 backdrop-blur dark:border-slate-800 dark:bg-slate-950/80">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center gap-3">
                        <button type="button" class="flex h-10 w-10 items-center justify-center rounded-2xl bg-brand-50 text-brand-500 lg:hidden" data-sidebar-toggle>
                            <x-icons.menu />
                        </button>
                        <div>
                            <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">Task Dashboard</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Manage your team focus</p>
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
                                class="w-full rounded-2xl border border-transparent bg-slate-100 py-2 pl-11 pr-4 text-sm text-slate-600 placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-brand-500/10 dark:bg-slate-900 dark:text-slate-200 dark:placeholder:text-slate-500 dark:focus:border-brand-500 dark:focus:bg-slate-950"
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

                        <x-dropdown align="right" width="w-64">
                            <x-slot name="trigger">
                                <button type="button" class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-slate-200 text-xs font-semibold text-slate-700 transition hover:bg-slate-300 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-700">
                                    @if ($avatar)
                                        <img src="{{ $avatar }}" alt="{{ $name }}" class="h-full w-full object-cover" />
                                    @else
                                        {{ $initials }}
                                    @endif
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <div class="flex items-center gap-3 px-3 py-2">
                                    <div class="h-10 w-10 overflow-hidden rounded-full bg-slate-200 dark:bg-slate-800">
                                        @if ($avatar)
                                            <img src="{{ $avatar }}" alt="{{ $name }}" class="h-full w-full object-cover" />
                                        @else
                                            <div class="flex h-full w-full items-center justify-center text-xs font-semibold text-slate-700 dark:text-slate-200">
                                                {{ $initials }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-xs text-slate-500 dark:text-slate-400">
                                        Signed in as
                                        <div class="mt-1 text-sm font-semibold text-slate-900 dark:text-slate-100">{{ $name }}</div>
                                    </div>
                                </div>
                                <div class="my-2 h-px bg-slate-100 dark:bg-slate-800"></div>
                                <a href="#" class="flex items-center gap-2 rounded-xl px-3 py-2 text-sm text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">Profile</a>
                                <a href="#" class="flex items-center gap-2 rounded-xl px-3 py-2 text-sm text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">Settings</a>
                                <a href="#" class="flex items-center gap-2 rounded-xl px-3 py-2 text-sm text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">Support</a>
                                <div class="my-2 h-px bg-slate-100 dark:bg-slate-800"></div>
                                <x-buttons.theme-toggle />
                                <div class="my-2 h-px bg-slate-100 dark:bg-slate-800"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">
                                        <x-icons.logout />
                                        Log Out
                                    </button>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </header>

            <main class="flex-1 px-6 py-8">
                {{ $slot }}
            </main>
        </div>
    </div>

    <div class="fixed inset-0 z-40 hidden bg-slate-900/40 dark:bg-black/60 lg:hidden" data-sidebar-overlay></div>
    <aside class="fixed inset-y-0 left-0 z-50 w-72 -translate-x-full flex-col border-r border-slate-200 bg-white px-6 py-6 transition-transform duration-200 dark:border-slate-800 dark:bg-slate-950 lg:hidden" data-sidebar-panel>
        <div class="flex items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                    <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-brand-50 text-brand-500">
                        <x-icons.logo-mark />
                    </span>
                <div>
                    <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">{{ $workspace }}</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400">{{ $plan }}</p>
                </div>
            </div>
            <x-buttons.icon size="sm" variant="outline" data-sidebar-close>
                <x-icons.close />
            </x-buttons.icon>
        </div>

        <nav class="mt-10 space-y-2 text-sm font-medium">
            <a href="#" class="{{ $active === 'dashboard' ? 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-200' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-900' }} flex items-center gap-3 rounded-xl px-3 py-2">
                <x-icons.dashboard />
                Dashboard
            </a>
            <a href="{{ route('tasks.completed') }}" class="{{ $active === 'tasks' ? 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-200' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-900' }} flex items-center gap-3 rounded-xl px-3 py-2">
                <x-icons.tasks />
                Tasks
            </a>
            <a href="{{ route('categories.index') }}" class="{{ $active === 'categories' ? 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-200' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-900' }} flex items-center gap-3 rounded-xl px-3 py-2">
                <x-icons.categories />
                Categories
            </a>
            <a href="#" class="{{ $active === 'projects' ? 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-200' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-900' }} flex items-center gap-3 rounded-xl px-3 py-2">
                <x-icons.projects />
                Projects
            </a>
            <a href="#" class="{{ $active === 'team' ? 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-200' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-900' }} flex items-center gap-3 rounded-xl px-3 py-2">
                <x-icons.team />
                Team
            </a>
        </nav>

        <div class="mt-auto space-y-4">
            <a href="{{ route('settings') }}" class="{{ $active === 'settings' ? 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-200' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-900' }} flex w-full items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium">
                <x-icons.settings />
                Settings
            </a>
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
