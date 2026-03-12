<x-layouts.auth-layout>
    <x-slot name="header">
        <button type="button" class="flex items-center justify-center h-9 w-9 rounded-full border border-slate-200 text-slate-500 transition hover:text-slate-700">
            <span class="sr-only">Help</span>
            <x-icons.question-mark />
        </button>
    </x-slot>

    <div class="w-full max-w-[460px] rounded-2xl border border-slate-200/80 bg-white p-8 text-center shadow-[0_20px_60px_rgba(15,23,42,0.08)] sm:p-10">
        <div class="mx-auto flex h-28 w-full items-center justify-center rounded-2xl border border-[#b9d6ff] bg-[#eaf2ff]">
            <svg aria-hidden="true" viewBox="0 0 64 64" class="h-12 w-12 text-[#1a73e8]" fill="none" stroke="currentColor" stroke-width="3">
                <path d="M8 20h48v24H8z" />
                <path d="m8 20 24 16 24-16" />
                <path d="M36 44l8 8 12-12" />
            </svg>
        </div>

        <h1 class="mt-8 text-2xl font-semibold text-slate-900">Verify your email</h1>
        <p class="mt-2 text-sm text-slate-500">
            We&#39;ve sent a verification link to your email address. Please check your email and click on the link to continue.
        </p>

        <form action="{{ route('verification.send') }}" method="post">
            @csrf

            <div class="mt-5 text-sm text-slate-500">
                Didn&#39;t receive the email?
                <button type="submit" class="mt-2 flex w-full items-center justify-center gap-2 text-sm font-semibold text-[#1a73e8] hover:text-[#1558c0]">
                    <svg aria-hidden="true" viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 12a8 8 0 0 1 13.66-5.66" />
                        <path d="M20 12a8 8 0 0 1-13.66 5.66" />
                        <path d="m20 4-4 4" />
                    </svg>
                    Resend Email
                </button>
            </div>
        </form>

        <div class="mt-8 flex w-full items-center justify-center text-sm text-slate-500">
            <a href="{{ route('login') }}" class="flex items-center gap-2 font-medium text-slate-500 transition hover:text-slate-700">
                <svg aria-hidden="true" viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M15 18l-6-6 6-6" />
                </svg>
                Back to sign in
            </a>
        </div>
    </div>

    <x-slot name="footer">
        <p class="text-xs text-slate-500">&copy; {{ date('Y') }} Daily Task Tracker. Secure Verification System.</p>
    </x-slot>
</x-layouts.auth-layout>
