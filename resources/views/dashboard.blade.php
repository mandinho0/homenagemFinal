<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Os meus planos de homenagem') }}
        </h2>
    </x-slot>

    @include('plans.index')
</x-app-layout>
