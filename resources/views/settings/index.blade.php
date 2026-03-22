<x-app-layout active="settings" workspace="TaskMaster" plan="Premium Plan">
    <div class="w-full max-w-5xl">
        {{-- Section: Page header --}}
        <div class="mb-10">
            <h1 class="text-3xl font-semibold text-slate-900 dark:text-slate-100">Settings</h1>
            <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Manage your account preferences and system behavior.</p>
        </div>

        <div class="space-y-12">
            {{-- Section: Profile --}}
            <section>
                <div class="flex items-center gap-3 text-xs font-semibold uppercase tracking-[0.3em] text-brand-500">
                    <span>01. Profile</span>
                    <span class="h-px flex-1 bg-slate-200 dark:bg-slate-800"></span>
                </div>
                <div class="mt-6 grid gap-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950 lg:grid-cols-[140px_1fr]">
                    {{-- Profile photo --}}
                    <div class="relative h-28 w-28">
                        <img src="https://placehold.co/160x160" alt="Profile" class="h-full w-full rounded-2xl object-cover" />
                        <button class="absolute -bottom-3 -right-3 flex h-10 w-10 items-center justify-center rounded-xl bg-brand-500 text-white shadow-lg" data-settings-photo-open>
                            <x-icons.pencil />
                        </button>
                    </div>

                    {{-- Profile form fields --}}
                    <div class="grid gap-4 lg:grid-cols-2">
                        <div>
                            <label class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400" for="settings-name">Full Name</label>
                            <input
                                id="settings-name"
                                type="text"
                                value="Alex Architect"
                                class="mt-2 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                            />
                        </div>
                        <div>
                            <label class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400" for="settings-email">Email Address</label>
                            <input
                                id="settings-email"
                                type="email"
                                value="alex.design@work.com"
                                class="mt-2 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                            />
                        </div>
                        <div class="lg:col-span-2">
                            <label class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400" for="settings-bio">Bio</label>
                            <textarea
                                id="settings-bio"
                                rows="3"
                                class="mt-2 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-4 text-sm text-slate-600 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300"
                            >Product Designer focusing on high-velocity task management systems. Based in New York.</textarea>
                        </div>

                        {{-- Profile actions --}}
                        <div class="flex flex-wrap items-center justify-end gap-3 lg:col-span-2">
                            <x-buttons.text type="button">Discard changes</x-buttons.text>
                            <x-buttons.primary type="button" class="px-5 py-2">Save Preferences</x-buttons.primary>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Section: Account security --}}
            <section>
                <div class="flex items-center gap-3 text-xs font-semibold uppercase tracking-[0.3em] text-brand-500">
                    <span>02. Account Security</span>
                    <span class="h-px flex-1 bg-slate-200 dark:bg-slate-800"></span>
                </div>
                <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950">
                    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 pb-4 dark:border-slate-800">
                        <div>
                            <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">Password</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Last changed 4 months ago</p>
                        </div>
                        <x-buttons.outline class="px-5 py-2">Change</x-buttons.outline>
                    </div>
                    <div class="mt-5 flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">Two-Factor Authentication</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Secure your account with an extra layer of security</p>
                        </div>
                        <label class="relative inline-flex cursor-pointer items-center">
                            <input type="checkbox" class="peer sr-only" checked />
                            <div class="h-6 w-11 rounded-full bg-slate-200 transition peer-checked:bg-brand-500 dark:bg-slate-800"></div>
                            <div class="absolute left-1 top-1 h-4 w-4 rounded-full bg-white transition peer-checked:translate-x-5"></div>
                        </label>
                    </div>
                </div>
            </section>

            {{-- Section: Notifications --}}
            <section>
                <div class="flex items-center gap-3 text-xs font-semibold uppercase tracking-[0.3em] text-brand-500">
                    <span>03. Notifications</span>
                    <span class="h-px flex-1 bg-slate-200 dark:bg-slate-800"></span>
                </div>
                <div class="mt-6 space-y-5">
                    <div class="flex flex-wrap items-center justify-between gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-950">
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-500 dark:bg-brand-500/10 dark:text-brand-200">
                                <x-icons.mail />
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">Email Alerts</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Daily digest and critical project updates</p>
                            </div>
                        </div>
                        <label class="relative inline-flex cursor-pointer items-center">
                            <input type="checkbox" class="peer sr-only" checked />
                            <div class="h-6 w-11 rounded-full bg-slate-200 transition peer-checked:bg-brand-500 dark:bg-slate-800"></div>
                            <div class="absolute left-1 top-1 h-4 w-4 rounded-full bg-white transition peer-checked:translate-x-5"></div>
                        </label>
                    </div>
                    <div class="flex flex-wrap items-center justify-between gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-950">
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-slate-500 dark:bg-slate-900 dark:text-slate-300">
                                <x-icons.bell />
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">Push Notifications</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Real-time desktop and mobile alerts</p>
                            </div>
                        </div>
                        <label class="relative inline-flex cursor-pointer items-center">
                            <input type="checkbox" class="peer sr-only" />
                            <div class="h-6 w-11 rounded-full bg-slate-200 transition peer-checked:bg-brand-500 dark:bg-slate-800"></div>
                            <div class="absolute left-1 top-1 h-4 w-4 rounded-full bg-white transition peer-checked:translate-x-5"></div>
                        </label>
                    </div>
                    <div class="flex flex-wrap items-center justify-between gap-4 rounded-2xl border border-amber-100 bg-amber-50 p-5 shadow-sm dark:border-amber-500/30 dark:bg-amber-500/10">
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-amber-600 dark:bg-amber-500/20 dark:text-amber-300">
                                <x-icons.alert />
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">Quiet Hours</p>
                                <p class="text-xs text-slate-600 dark:text-slate-300">Scheduled focus time: 22:00 - 07:00</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="rounded-full bg-amber-100 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-amber-600 dark:bg-amber-500/20 dark:text-amber-200">Active Now</span>
                            <label class="relative inline-flex cursor-pointer items-center">
                                <input type="checkbox" class="peer sr-only" checked />
                                <div class="h-6 w-11 rounded-full bg-slate-200 transition peer-checked:bg-brand-500 dark:bg-slate-800"></div>
                                <div class="absolute left-1 top-1 h-4 w-4 rounded-full bg-white transition peer-checked:translate-x-5"></div>
                            </label>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Section: Personalization --}}
            <section>
                <div class="flex items-center gap-3 text-xs font-semibold uppercase tracking-[0.3em] text-brand-500">
                    <span>04. Personalization</span>
                    <span class="h-px flex-1 bg-slate-200 dark:bg-slate-800"></span>
                </div>
                <div class="mt-6 grid gap-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950 lg:grid-cols-2">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">System Language</p>
                        <div class="relative mt-3">
                            <select class="w-full appearance-none rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 focus:border-brand-500 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200">
                                <option>English (US)</option>
                                <option>English (UK)</option>
                                <option>French</option>
                                <option>German</option>
                            </select>
                            <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-slate-400">
                                <x-icons.chevron-down />
                            </span>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Appearance</p>
                        <div class="mt-3 flex flex-wrap gap-3">
                            <button class="flex items-center gap-2 rounded-xl border border-brand-500 bg-brand-50 px-4 py-2 text-sm font-semibold text-brand-500 dark:border-brand-400/50 dark:bg-brand-500/10 dark:text-brand-200">
                                <x-icons.sun />
                                Light
                            </button>
                            <button class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-600 hover:border-brand-500 hover:text-brand-500 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300">
                                <x-icons.moon />
                                Dark
                            </button>
                            <button class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-600 hover:border-brand-500 hover:text-brand-500 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300">
                                <x-icons.monitor />
                                System
                            </button>
                        </div>
                    </div>
                    <div class="lg:col-span-2">
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Theme Accent Color</p>
                        <div class="mt-4 flex flex-wrap gap-3">
                            @foreach (['bg-brand-500', 'bg-indigo-500', 'bg-pink-500', 'bg-emerald-500', 'bg-amber-500', 'bg-slate-900'] as $color)
                                <button class="h-11 w-11 rounded-xl {{ $color }} ring-2 ring-transparent ring-offset-2 ring-offset-white focus:ring-brand-500 dark:ring-offset-slate-950"></button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    {{-- Modal: Update profile photo --}}
    <div class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 lg:p-8" data-settings-photo-modal>
        <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-200" data-settings-photo-overlay></div>
        <div class="relative z-10 w-full max-w-md rounded-2xl bg-white shadow-2xl opacity-0 transition-all duration-200 translate-y-4 scale-95 dark:bg-slate-950 max-h-[calc(100vh-4rem)] overflow-y-auto" data-settings-photo-panel>
            <div class="flex items-start justify-between border-b border-slate-200 px-6 py-5 dark:border-slate-800">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Update Profile Photo</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Choose how you want to update your photo.</p>
                </div>
                <button type="button" class="rounded-full p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-600 dark:hover:bg-slate-900" data-settings-photo-close>
                    <x-icons.x-mark />
                </button>
            </div>
            <div class="space-y-3 px-6 py-6">
                <button class="flex w-full items-center gap-3 rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 hover:border-brand-500 hover:text-brand-500 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-500 dark:bg-brand-500/10 dark:text-brand-200">
                        <x-icons.camera />
                    </span>
                    Use Camera
                </button>
                <button class="flex w-full items-center gap-3 rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 hover:border-brand-500 hover:text-brand-500 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-500 dark:bg-slate-900 dark:text-slate-300">
                        <x-icons.image />
                    </span>
                    Choose from Gallery
                </button>
            </div>
            <div class="flex flex-wrap items-center justify-end gap-3 border-t border-slate-200 px-6 py-5 dark:border-slate-800">
                <x-buttons.text type="button" data-settings-photo-close>Cancel</x-buttons.text>
                <x-buttons.primary type="button" class="px-5 py-2">Save Photo</x-buttons.primary>
            </div>
        </div>
    </div>
</x-app-layout>
