<x-layouts.auth-layout>
    <x-slot name="header">
        <span class="text-slate-500 dark:text-slate-400">Already have an account?</span>
        <a href="{{ route('login') }}" class="ml-1 font-semibold text-brand-500 hover:text-brand-600">Log In</a>
    </x-slot>

    <div class="w-full max-w-[420px] rounded-2xl border border-slate-200/80 bg-white p-8 shadow-[0_20px_60px_rgba(15,23,42,0.08)] dark:border-slate-800 dark:bg-slate-950 sm:p-10">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900 dark:text-slate-100">Create Account</h1>
            <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Start tracking your productivity today with our minimal workspace.</p>
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

            <label class="flex flex-wrap items-center gap-2 text-sm text-slate-600 dark:text-slate-300">
                <input type="checkbox" name="terms" class="h-4 w-4 rounded border-slate-300 text-brand-500 focus:ring-brand-500" required />
                I agree to the
                <a href="#" class="font-medium text-brand-500 hover:text-brand-600">Terms of Service</a>
                and
                <a href="#" class="font-medium text-brand-500 hover:text-brand-600">Privacy Policy</a>.
            </label>

            <x-buttons.primary type="submit" class="w-full">
                Create Account
                <x-icons.arrow-right />
            </x-buttons.primary>
        </form>

        <div class="mt-6 flex items-center gap-3 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300 dark:text-slate-600">
            <span class="h-px flex-1 bg-slate-200 dark:bg-slate-800"></span>
            Or continue with
            <span class="h-px flex-1 bg-slate-200 dark:bg-slate-800"></span>
        </div>

        <div class="mt-5 grid grid-cols-2 gap-3">
            <x-buttons.outline type="button" class="py-2.5">
                <x-icons.google />
                Google
            </x-buttons.outline>
            <x-buttons.outline type="button" class="py-2.5">
                <x-icons.github />
                GitHub
            </x-buttons.outline>
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
