@props([
    'align' => 'right',
    'width' => 'w-48',
])

@php
    $alignment = $align === 'left' ? 'left-0' : 'right-0';
@endphp

<div class="relative" data-dropdown>
    <div data-dropdown-trigger>
        {{ $trigger }}
    </div>
    <div class="absolute z-20 mt-2 {{ $width }} {{ $alignment }} hidden rounded-2xl border border-slate-200 bg-white p-2 shadow-lg dark:border-slate-800 dark:bg-slate-900" data-dropdown-menu>
        {{ $content }}
    </div>
</div>
