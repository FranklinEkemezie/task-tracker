
<!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->

@props([
    'label'         => 'Password',
    'name'          => 'password',
    'icon'          => 'lock',
    'placeholder'   => '••••••••',
    'autocomplete'  => 'current-password'
])

<x-forms.input-field label="{{ $label }}" name="{{ $name }}">
    @isset($icon)
        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
            <x-dynamic-component :component="'icons.' . $icon"  />
        </span>
    @endisset
    <input
        id="{{ $name }}"
        name="{{ $name  }}"
        type="password"
        value="{{ old($name) }}"
        autocomplete="{{ $autocomplete }}"
        placeholder="{{ $placeholder }}"
        class="{{ (isset($icon) ? "px-10" : "px-3" ) . " py-3 w-full rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-700 placeholder:text-slate-400 focus:border-brand-500 focus:outline-none focus:ring-4 focus:ring-brand-500/10" }}"
        required
    />
    <button
        type="button"
        class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400"
        aria-label="Toggle password visibility"
        aria-pressed="false"
        data-password-toggle="password"
    >
        <span data-icon="show">
            <x-icons.eye-open />
        </span>
        <span class="hidden" data-icon="show">
            <x-icons.eye-closed />
        </span>
    </button>
</x-forms.input-field>

