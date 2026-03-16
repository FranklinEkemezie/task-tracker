<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->

@props([
    'name',
    'label',
])

<div>
    <label for="{{ $name }}" class="text-sm font-medium text-slate-700 dark:text-slate-200">{{ $label }}</label>
    <div class="relative mt-2">
        {{ $slot }}
    </div>
    <x-forms.input-error name="{{ $name }}" />
</div>
