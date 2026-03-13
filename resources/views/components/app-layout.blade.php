@props([
    'active' => 'tasks',
    'workspace' => 'Project Management',
    'plan' => 'Standard Plan',
])

<x-layouts.app-layout :active="$active" :workspace="$workspace" :plan="$plan">
    {{ $slot }}
</x-layouts.app-layout>
