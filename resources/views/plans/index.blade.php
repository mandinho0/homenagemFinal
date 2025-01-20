<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md sm:rounded-lg overflow-hidden">
            <div class="p-6 text-gray-900">
                <h3 class="text-lg font-bold mb-6">{{ __('Lista de Planos') }}</h3>

                <!-- Botão para criar novo plano -->
                <div class="flex justify-end mb-4">
                    <a href="{{ route('plans.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center gap-2">
                        <i class="fas fa-plus"></i>
                        {{ __('Criar Novo Plano') }}
                    </a>
                </div>

                <div class="advice w-3/4 flex flex-col items-center text-center mx-auto">
                    <span class="text-orange-600 font-bold">{{ __('Lembrete') }}</span>
                    <p class="text-gray-500">{{ __('Todos os planos têm uma taxa de anuidade obrigatória a ser paga pelo cliente.') }}</p>
                    <p class="text-gray-500 mb-6">{{ __('Essa taxa varia de acordo com a inflação anual.') }}</p>
                </div>

                <!-- Verificar se existem planos -->
                @if($plans->isEmpty())
                    <p class="text-gray-500 text-center">{{ __('Ainda não tem nenhum plano criado.') }}</p>
                @else
                    <!-- Listar planos -->
                    <table class="table-auto w-full border-collapse bg-gray-50 shadow-sm rounded-lg overflow-hidden">
                        <thead class="bg-gray-100 text-left text-gray-700">
                        <tr>
                            <th class="px-6 py-3">{{ __('Nome') }}</th>
                            <th class="px-6 py-3">{{ __('Tipo de Cerimónia') }}</th>
                            <th class="px-6 py-3">{{ __('Status') }}</th>
                            <th class="px-6 py-3">{{ __('Pago') }}</th>
                            <th class="px-6 py-3">{{ __('Taxa Anual Liquidada') }}</th>
                            <th class="px-6 py-3">{{ __('Valor Final (€)') }}</th>
                            <th class="px-6 py-3">{{ __('Ações') }}</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($plans as $plan)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $plan->name }}</td>
                                <td class="px-6 py-4">{{ $plan->getCeremonyTypeLabel() }}</td>
                                <td class="px-6 py-4 capitalize">{{ __($plan->status) }}</td>
                                <td class="px-6 py-4">
                                    @if($plan->is_paid)
                                        <span class="text-green-500 font-bold">{{ __('Sim') }}</span>
                                    @else
                                        <span class="text-red-500 font-bold">{{ __('Não') }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($plan->annual_fee_paid)
                                        <span class="text-green-500 font-bold">{{ __('Sim') }}</span>
                                    @else
                                        <span class="text-red-500 font-bold">{{ __('Não') }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $plan->final_value ? number_format($plan->final_value, 2, ',', '.') : 'N/A' }}</td>
                                <td class="px-6 py-4 flex items-center gap-4">
                                    <!-- Botões de ação -->
                                    <a href="{{ route('plans.show', $plan->id) }}" class="text-blue-500 hover:text-blue-600" title="{{ __('Ver') }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if(!$plan->is_paid)
                                    <a href="{{ route('plans.edit', $plan->id) }}" class="text-yellow-500 hover:text-yellow-600" title="{{ __('Editar') }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" onsubmit="return confirm('{{ __('Tem a certeza que deseja eliminar este plano?') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600" title="{{ __('Eliminar') }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @endif
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
