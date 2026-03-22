@props([
    'token',
    'email'
])

<x-layouts.auth-layout>
    <x-slot name="header">
        {{-- Header action --}}
        <x-buttons.icon size="sm" variant="outline" class="rounded-full">
            <span class="sr-only">Close</span>
            <x-icons.close />
        </x-buttons.icon>
    </x-slot>

    {{-- Card: Reset password --}}
    <div class="w-full max-w-[460px] rounded-2xl border border-slate-200/80 bg-white p-8 shadow-[0_20px_60px_rgba(15,23,42,0.08)] sm:p-10 dark:border-slate-800 dark:bg-slate-950">
        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-200">
            <x-icons.settings />
        </div>

        <h1 class="mt-6 text-2xl font-semibold text-slate-900 dark:text-slate-100">Update Your Password</h1>
        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
            Fill in the form to complete password reset.
        </p>

        {{-- Reset form --}}
        <form class="mt-8 space-y-6" method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}" />

            <x-forms.text-input
                label="Email Address"
                name="email"
                type="email"
                placeholder="name@company.com"
                icon="mail"
                value="{{ $email }}"
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

            <x-buttons.primary type="submit" class="w-full">
                <x-icons.arrow-right />
                Submit
            </x-buttons.primary>
        </form>

        {{-- Back link --}}
        <div class="mt-6 border-t border-slate-200 pt-6 text-center dark:border-slate-800">
            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm font-medium text-brand-500 hover:text-brand-600 dark:text-brand-200 dark:hover:text-brand-100">
                <x-icons.arrow-left />
                Back to Login
            </a>
        </div>
    </div>

    <x-slot name="footer">
        <p class="text-xs text-slate-500 dark:text-slate-400">© {{ date('Y') }} Daily Task Tracker. All rights reserved.</p>
    </x-slot>
</x-layouts.auth-layout>
