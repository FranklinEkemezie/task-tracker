<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->

@props([
    'name',
    'type'  => 'text',
    'label',
    'placeholder' => '',
    'icon',
    'value'
])

<x-forms.input-field :name="$name" :label="$label">
    @isset($icon)
        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
            <x-dynamic-component :component="'icons.' . $icon"  />
        </span>
    @endisset
    <input
        id="{{ $name }}"
        name="{{ $name  }}"
        type="{{ $type }}"
        value="{{ $value ?? old($name) }}"
        autocomplete="email"
        placeholder="{{ $placeholder }}"
        class="{{ (isset($icon) ? "px-10" : "px-3" ) . " py-3 w-full rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-700 placeholder:text-slate-400 focus:border-brand-500 focus:outline-none focus:ring-4 focus:ring-brand-500/10 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-200 dark:placeholder:text-slate-500" }}"
        required
    />
</x-forms.input-field>
