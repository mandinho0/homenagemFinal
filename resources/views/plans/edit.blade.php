<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Plano') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('plans.update', $plan->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Campos do formulário com valores preenchidos -->
                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Nome Completo') }}</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $plan->name) }}" required class="form-input w-full">
                        </div>

                        <!-- Adicione os demais campos da mesma forma -->
                        <!-- ... -->

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                {{ __('Guardar Alterações') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
