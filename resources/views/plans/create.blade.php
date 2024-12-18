<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Novo Plano') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">{{ __('Novo Plano de Homenagem') }}</h3>

                    <form method="POST" action="{{ route('plans.submit') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="ceremony_type" class="block text-gray-700">{{ __('Tipo de Cerimónia') }}</label>
                            <select name="ceremony_type" class="form-control" required>
                                <option value="religiosa">Religiosa</option>
                                <option value="laica">Laica</option>
                                <option value="intima">Íntima</option>
                                <option value="publica">Pública</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="location" class="block text-gray-700">{{ __('Local') }}</label>
                            <input type="text" name="location" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="final_observations" class="block text-gray-700">{{ __('Observações Finais') }}</label>
                            <textarea name="final_observations" rows="4" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Guardar Plano') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
