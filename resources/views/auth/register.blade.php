<x-layouts.auth-layout>
    <x-slot name="header">
        <span class="text-slate-500">Already have an account?</span>
        <a href="{{ route('login') }}" class="ml-1 font-semibold text-[#1a73e8] hover:text-[#1558c0]">Log In</a>
    </x-slot>

    <div class="w-full max-w-[420px] rounded-2xl border border-slate-200/80 bg-white p-8 shadow-[0_20px_60px_rgba(15,23,42,0.08)] sm:p-10">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Create Account</h1>
            <p class="mt-2 text-sm text-slate-500">Start tracking your productivity today with our minimal workspace.</p>
        </div>

        <form class="mt-8 space-y-5" method="POST" action="{{ route('register.post') }}">
            @csrf

            <x-forms.text-input
                label="Full Name"
                name="name"
                autocomplete="name"
                placeholder="John Doe"
                icon="user"
            />

            <x-forms.text-input
                label="Email Address"
                name="email"
                autocomplete="email"
                placeholder="email@example.com"
                icon="mail"
            />

            <x-forms.password-input
                label="Password"
                name="password"
                autocomplete="new-password"
                placeholder="Create a strong password"
                icon="lock"
            />

            <x-forms.password-input
                label="Confirm Password"
                name="password_confirmation"
                autocomplete="new-password"
                icon="lock"
            />

            <label class="flex flex-wrap items-center gap-2 text-sm text-slate-600">
                <input type="checkbox" name="terms" class="h-4 w-4 rounded border-slate-300 text-[#1a73e8] focus:ring-[#1a73e8]" required />
                I agree to the
                <a href="#" class="font-medium text-[#1a73e8] hover:text-[#1558c0]">Terms of Service</a>
                and
                <a href="#" class="font-medium text-[#1a73e8] hover:text-[#1558c0]">Privacy Policy</a>.
            </label>

            <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-xl bg-[#1a73e8] py-3 text-sm font-semibold text-white shadow-[0_10px_20px_rgba(26,115,232,0.25)] transition hover:bg-[#1558c0]">
                Create Account
                <svg aria-hidden="true" viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14" />
                    <path d="m13 5 6 7-6 7" />
                </svg>
            </button>
        </form>

        <div class="mt-6 flex items-center gap-3 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300">
            <span class="h-px flex-1 bg-slate-200"></span>
            Or continue with
            <span class="h-px flex-1 bg-slate-200"></span>
        </div>

        <div class="mt-5 grid grid-cols-2 gap-3">
            <button type="button" class="flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white py-2.5 text-sm font-medium text-slate-700 transition hover:border-slate-300 hover:bg-slate-50">
                <svg aria-hidden="true" viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor">
                    <path d="M21.6 12.23c0-.67-.06-1.32-.18-1.95H12v3.7h5.4a4.62 4.62 0 0 1-2 3.03v2.5h3.24c1.9-1.75 2.96-4.34 2.96-7.28z" />
                    <path d="M12 22c2.7 0 4.96-.9 6.6-2.43l-3.24-2.5c-.9.6-2.05.95-3.36.95-2.58 0-4.77-1.74-5.55-4.08H3.1v2.57A9.98 9.98 0 0 0 12 22z" />
                    <path d="M6.45 13.94A6 6 0 0 1 6.1 12c0-.68.12-1.34.35-1.94V7.5H3.1a10 10 0 0 0 0 8.99l3.35-2.55z" />
                    <path d="M12 6.02c1.47 0 2.79.5 3.83 1.48l2.87-2.87C16.95 2.9 14.7 2 12 2a9.98 9.98 0 0 0-8.9 5.5l3.35 2.56C7.23 7.76 9.42 6.02 12 6.02z" />
                </svg>
                Google
            </button>
            <button type="button" class="flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white py-2.5 text-sm font-medium text-slate-700 transition hover:border-slate-300 hover:bg-slate-50">
                <svg aria-hidden="true" viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor">
                    <path d="M12 2c-5.5 0-10 4.5-10 10 0 4.4 2.9 8.1 6.9 9.4.5.1.7-.2.7-.5v-1.8c-2.8.6-3.4-1.2-3.4-1.2-.4-1-.9-1.2-.9-1.2-.8-.5.1-.5.1-.5.9.1 1.4.9 1.4.9.8 1.4 2.2 1 2.8.8.1-.6.3-1 .6-1.2-2.2-.2-4.5-1.1-4.5-4.9 0-1.1.4-2 1-2.7-.1-.2-.4-1.2.1-2.5 0 0 .8-.3 2.7 1a9.4 9.4 0 0 1 4.9 0c1.9-1.3 2.7-1 2.7-1 .5 1.3.2 2.3.1 2.5.6.7 1 1.6 1 2.7 0 3.8-2.3 4.7-4.5 4.9.3.3.6.8.6 1.6v2.3c0 .3.2.6.7.5a10 10 0 0 0 6.9-9.4c0-5.5-4.5-10-10-10z" />
                </svg>
                GitHub
            </button>
        </div>
    </div>

    <x-slot name="footer">
        <div class="space-y-4">
            <div class="flex flex-wrap justify-center gap-6 uppercase tracking-[0.2em] text-[11px] text-slate-400">
                <a href="#" class="transition hover:text-slate-600">Privacy</a>
                <a href="#" class="transition hover:text-slate-600">Terms</a>
                <a href="#" class="transition hover:text-slate-600">Help</a>
                <a href="#" class="transition hover:text-slate-600">Contact</a>
            </div>
            <p class="text-xs text-slate-500">© {{ date('Y') }} Daily Task Tracker Inc. All rights reserved.</p>
        </div>
    </x-slot>
</x-layouts.auth-layout>
