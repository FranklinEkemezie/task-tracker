@props([
    'title' => 'Tasks',
    'subtitle' => null,
    'activeTab' => 'board',
    'workspace' => 'Project Hub',
    'plan' => 'Premium Plan',
    'showCreate' => true,
    'createLabel' => 'Create New Task',
])

@php
    $tabs = [
        ['key' => 'board', 'label' => 'Task Board', 'route' => 'tasks.board'],
        ['key' => 'in-progress', 'label' => 'In Progress', 'route' => 'tasks.in-progress'],
        ['key' => 'completed', 'label' => 'Completed', 'route' => 'tasks.completed'],
    ];
@endphp

<x-app-layout active="tasks" :workspace="$workspace" :plan="$plan">
    <div class="flex flex-wrap items-start justify-between gap-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ $title }}</h1>
            @if ($subtitle)
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">{{ $subtitle }}</p>
            @endif
        </div>
        <div class="flex flex-wrap items-center gap-3">
            @if ($showCreate)
                <x-buttons.primary class="px-4 py-2">
                    <x-icons.plus />
                    {{ $createLabel }}
                </x-buttons.primary>
            @endif
            @isset($actions)
                {{ $actions }}
            @endisset
        </div>
    </div>

    <div class="mt-6 flex flex-wrap items-center gap-6 border-b border-slate-200 text-sm font-medium dark:border-slate-800">
        @foreach ($tabs as $tab)
            @php
                $isActive = $activeTab === $tab['key'];
            @endphp
            <a
                href="{{ route($tab['route']) }}"
                class="pb-3 {{ $isActive ? 'border-b-2 border-brand-500 text-brand-500' : 'text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200' }}"
            >
                {{ $tab['label'] }}
            </a>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $slot }}
    </div>
</x-app-layout>
