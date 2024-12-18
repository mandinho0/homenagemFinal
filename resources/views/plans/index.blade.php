<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Os meus planos de homenagem') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">{{ __('Lista de Planos') }}</h3>

                    <!-- Botão para criar novo plano -->
                    <a href="{{ route('plans.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Criar Novo Plano') }}
                    </a>

                    <!-- Verificar se existem planos -->
                    @if($plans->isEmpty())
                        <p class="mt-4 text-gray-500">{{ __('Ainda não tem nenhum plano criado.') }}</p>
                    @else
                        <!-- Listar planos -->
                        <table class="table-auto w-full mt-4">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">{{ __('Tipo de Cerimónia') }}</th>
                                <th class="px-4 py-2">{{ __('Local') }}</th>
                                <th class="px-4 py-2">{{ __('Data do 7º Dia') }}</th>
                                <th class="px-4 py-2">{{ __('Ações') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plans as $plan)
                                <tr class="border-b">
                                    <td class="px-4 py-2">{{ $plan->ceremony_type }}</td>
                                    <td class="px-4 py-2">{{ $plan->location }}</td>
                                    <td class="px-4 py-2">{{ $plan->seventh_day ?? 'N/A' }}</td>
                                    <td class="px-4 py-2">
                                        <a href="#" class="text-blue-600 hover:underline">{{ __('Ver') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
