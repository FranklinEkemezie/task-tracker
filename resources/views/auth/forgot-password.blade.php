<x-layouts.auth-layout>
    <x-slot name="header">
        <x-buttons.icon size="sm" variant="outline" class="rounded-full">
            <span class="sr-only">Close</span>
            <x-icons.close />
        </x-buttons.icon>
    </x-slot>

    <div class="w-full max-w-[460px] rounded-2xl border border-slate-200/80 bg-white p-8 shadow-[0_20px_60px_rgba(15,23,42,0.08)] sm:p-10">
        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-brand-50 text-brand-500">
            <x-icons.settings />
        </div>


        <h1 class="mt-6 text-2xl font-semibold text-slate-900">Reset Password</h1>
        <p class="mt-2 text-sm text-slate-500">
            No worries! Enter your registered email address and we&#39;ll send you a secure link to reset your password.
        </p>

        @session('status')
            <p class="mt-4 text-sm text-brand-500 font-medium">
                {{ $value }}
            </p>
        @endsession

        <form class="mt-8 space-y-6" method="POST" action="{{ route('password.email') }}">
            @csrf

            <x-forms.text-input
                label="Email Address"
                name="email"
                type="email"
                placeholder="name@company.com"
                icon="mail"
            />

            <x-buttons.primary type="submit" class="w-full">
                <x-icons.paper-plane class="h-4 w-4" />
                Send Reset Link
            </x-buttons.primary>
        </form>

        <div class="mt-6 border-t border-slate-200 pt-6 text-center">
            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm font-medium text-brand-500 hover:text-brand-600">
                <x-icons.arrow-left />
                Back to Login
            </a>
        </div>
    </div>

    <x-slot name="footer">
        <p class="text-xs text-slate-500">© {{ date('Y') }} Daily Task Tracker. All rights reserved.</p>
    </x-slot>
</x-layouts.auth-layout>
