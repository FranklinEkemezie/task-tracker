<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->

@props(['name'])

<div>
    <input type="hidden" name="{{ $name }}" id="{{ $name }}" value="" data-pin-hidden />

    <div class="flex justify-center gap-3">
        <input class="pin-input h-12 w-12 rounded-xl border border-slate-200 bg-slate-50 text-center text-lg font-semibold text-slate-800 shadow-sm focus:border-[#1a73e8] focus:outline-none focus:ring-4 focus:ring-[#1a73e8]/10" inputmode="numeric" pattern="\d*" maxlength="1" type="text" aria-label="Digit 1" autocomplete="one-time-code" data-pin-input />
        <input class="pin-input h-12 w-12 rounded-xl border border-slate-200 bg-slate-50 text-center text-lg font-semibold text-slate-800 shadow-sm focus:border-[#1a73e8] focus:outline-none focus:ring-4 focus:ring-[#1a73e8]/10" inputmode="numeric" pattern="\d*" maxlength="1" type="text" aria-label="Digit 2" data-pin-input />
        <input class="pin-input h-12 w-12 rounded-xl border border-slate-200 bg-slate-50 text-center text-lg font-semibold text-slate-800 shadow-sm focus:border-[#1a73e8] focus:outline-none focus:ring-4 focus:ring-[#1a73e8]/10" inputmode="numeric" pattern="\d*" maxlength="1" type="text" aria-label="Digit 3" data-pin-input />
        <input class="pin-input h-12 w-12 rounded-xl border border-slate-200 bg-slate-50 text-center text-lg font-semibold text-slate-800 shadow-sm focus:border-[#1a73e8] focus:outline-none focus:ring-4 focus:ring-[#1a73e8]/10" inputmode="numeric" pattern="\d*" maxlength="1" type="text" aria-label="Digit 4" data-pin-input />
        <input class="pin-input h-12 w-12 rounded-xl border border-slate-200 bg-slate-50 text-center text-lg font-semibold text-slate-800 shadow-sm focus:border-[#1a73e8] focus:outline-none focus:ring-4 focus:ring-[#1a73e8]/10" inputmode="numeric" pattern="\d*" maxlength="1" type="text" aria-label="Digit 5" data-pin-input />
        <input class="pin-input h-12 w-12 rounded-xl border border-slate-200 bg-slate-50 text-center text-lg font-semibold text-slate-800 shadow-sm focus:border-[#1a73e8] focus:outline-none focus:ring-4 focus:ring-[#1a73e8]/10" inputmode="numeric" pattern="\d*" maxlength="1" type="text" aria-label="Digit 6" data-pin-input />
    </div>
</div>
