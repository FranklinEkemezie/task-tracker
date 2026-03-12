<x-layouts.auth-layout>
    <x-slot name="header">
        <button type="button" class="flex h-9 w-9 items-center justify-center rounded-full border border-slate-200 text-slate-500 transition hover:text-slate-700">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M6 6l12 12" />
                <path d="M18 6l-12 12" />
            </svg>
        </button>
    </x-slot>

    <div class="w-full max-w-[460px] rounded-2xl border border-slate-200/80 bg-white p-8 shadow-[0_20px_60px_rgba(15,23,42,0.08)] sm:p-10">
        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#eaf2ff] text-[#1a73e8]">
            <svg aria-hidden="true" viewBox="0  0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M4 11a8 8 0 1 0 8-8" />
                <path d="M4 4v7h7" />
                <path d="M12 8v5l3 2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>


        <h1 class="mt-6 text-2xl font-semibold text-slate-900">Reset Password</h1>
        <p class="mt-2 text-sm text-slate-500">
            No worries! Enter your registered email address and we&#39;ll send you a secure link to reset your password.
        </p>

        @session('status')
            <p class="mt-4 text-sm text-[#1a73e8] font-medium">
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

            <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-xl bg-[#1a73e8] py-3 text-sm font-semibold text-white shadow-[0_10px_20px_rgba(26,115,232,0.25)] transition hover:bg-[#1558c0]">
                <x-icons.paper-plane />
                Send Reset Link
            </button>
        </form>

        <div class="mt-6 border-t border-slate-200 pt-6 text-center">
            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm font-medium text-[#1a73e8] hover:text-[#1558c0]">
                <x-icons.arrow-left />
                Back to Login
            </a>
        </div>
    </div>

    <x-slot name="footer">
        <p class="text-xs text-slate-500">© {{ date('Y') }} Daily Task Tracker. All rights reserved.</p>
    </x-slot>
</x-layouts.auth-layout>
