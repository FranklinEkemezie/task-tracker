<x-layouts.auth-layout>
    <x-slot name="header">
        <x-buttons.icon size="sm" variant="outline" class="rounded-full">
            <span class="sr-only">Help</span>
            <x-icons.question-mark />
        </x-buttons.icon>
    </x-slot>

    <div class="w-full max-w-[460px] rounded-2xl border border-slate-200/80 bg-white p-8 text-center shadow-[0_20px_60px_rgba(15,23,42,0.08)] sm:p-10">
        <div class="mx-auto flex h-28 w-full items-center justify-center rounded-2xl border border-brand-100 bg-brand-50 text-brand-500">
            <x-icons.mail-check />
        </div>

        <h1 class="mt-8 text-2xl font-semibold text-slate-900">Verify your email</h1>
        <p class="mt-2 text-sm text-slate-500">
            We&#39;ve sent a verification link to your email address. Please check your email and click on the link to continue.
        </p>

        <form action="{{ route('verification.send') }}" method="post">
            @csrf

            <div class="mt-5 text-sm text-slate-500">
                Didn&#39;t receive the email?
                <x-buttons.text type="submit" class="mt-2 w-full justify-center">
                    <x-icons.refresh />
                    Resend Email
                </x-buttons.text>
            </div>
        </form>

        <div class="mt-8 flex w-full items-center justify-center text-sm text-slate-500">
            <a href="{{ route('login') }}" class="flex items-center gap-2 font-medium text-slate-500 transition hover:text-slate-700">
                <x-icons.arrow-left />
                Back to sign in
            </a>
        </div>
    </div>

    <x-slot name="footer">
        <p class="text-xs text-slate-500">&copy; {{ date('Y') }} Daily Task Tracker. Secure Verification System.</p>
    </x-slot>
</x-layouts.auth-layout>
