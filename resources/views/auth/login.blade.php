<x-layouts.auth-layout>
    <x-slot name="header">
        <a href="#" class="font-medium text-slate-600 transition hover:text-slate-900">Help</a>
    </x-slot>

    <div class="w-full max-w-[420px] rounded-2xl border border-slate-200/80 bg-white p-8 shadow-[0_20px_60px_rgba(15,23,42,0.08)] sm:p-10">
        <div class="text-center">
            <h1 class="text-2xl font-semibold text-slate-900">Welcome Back</h1>
            <p class="mt-2 text-sm text-slate-500">Please enter your details to sign in</p>
        </div>

        <form class="mt-8 space-y-5" method="POST" action="{{ route('login.post') }}">
            @csrf

            <x-forms.text-input
                label="Email Address"
                name="email"
                type="email"
                placeholder="name@company.com"
                icon="mail"
            />

            <x-forms.password-input name="password" />

            <div class="text-end">
                <a href="{{ route('password.request') }}" class="text-xs font-medium text-[#1a73e8] hover:text-[#1558c0]">Forgot password?</a>
            </div>

            <label class="flex items-center gap-2 text-sm text-slate-600">
                <input type="checkbox" name="remember" value="1" class="h-4 w-4 rounded border-slate-300 text-[#1a73e8] focus:ring-[#1a73e8]" />
                Remember me for 30 days
            </label>

            <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-xl bg-[#1a73e8] py-3 text-sm font-semibold text-white shadow-[0_10px_20px_rgba(26,115,232,0.25)] transition hover:bg-[#1558c0]">
                Sign In
                <x-icons.arrow-right />
            </button>
        </form>

        <div class="mt-6 flex items-center gap-3 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300">
            <span class="h-px flex-1 bg-slate-200"></span>
            Or continue with
            <span class="h-px flex-1 bg-slate-200"></span>
        </div>

        <div class="mt-5 grid grid-cols-2 gap-3">
            <button type="button" class="flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white py-2.5 text-sm font-medium text-slate-700 transition hover:border-slate-300 hover:bg-slate-50">
                <x-icons.google />
                Google
            </button>
            <button type="button" class="flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white py-2.5 text-sm font-medium text-slate-700 transition hover:border-slate-300 hover:bg-slate-50">
                <x-icons.github />
                GitHub
            </button>
        </div>

        <p class="mt-6 text-center text-sm text-slate-500">
            Don&#39;t have an account?
            <a href="{{ route('register') }}" class="font-semibold text-[#1a73e8] hover:text-[#1558c0]">Create an account</a>
        </p>
    </div>

    <x-slot name="footer">
        <div class="space-y-4">
            <div class="flex flex-wrap justify-center gap-6 text-[11px] uppercase tracking-[0.2em] text-slate-400">
                <a href="#" class="transition hover:text-slate-600">Privacy Policy</a>
                <a href="#" class="transition hover:text-slate-600">Terms of Service</a>
                <a href="#" class="transition hover:text-slate-600">Support</a>
            </div>
            <p class="text-xs text-slate-500">&copy; {{ date('Y') }} Daily Task Tracker Inc. All rights reserved.</p>
        </div>
    </x-slot>
</x-layouts.auth-layout>
