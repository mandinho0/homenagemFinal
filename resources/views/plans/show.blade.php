<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <a class="return" href="javascript:history.back()" style="cursor: pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center flex-grow text-center">
                {{ __('Detalhes do Plano') }}
            </h2>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ $plan->name }}</h3>

                    <!-- Detalhes principais -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-semibold text-gray-700">{{ __('Informações Básicas') }}</h4>
                            <ul class="mt-2 text-gray-600">
                                <li><strong>{{ __('Nome Completo:') }}</strong> {{ $plan->name }}</li>
                                <li><strong>{{ __('Data de Nascimento:') }}</strong> {{ $plan->birth_date->format('d/m/Y') }}</li>
                                <li><strong>{{ __('Email:') }}</strong> {{ $plan->email }}</li>
                                <li><strong>{{ __('Telefone:') }}</strong> {{ $plan->phone }}</li>
                            </ul>
                        </div>

                        <div class="border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-semibold text-gray-700">{{ __('Detalhes do Plano') }}</h4>
                            <ul class="mt-2 text-gray-600">
                                <li><strong>{{ __('Tipo de Cerimónia:') }}</strong> {{ $plan->ceremony_type }}</li>
                                <li><strong>{{ __('Local:') }}</strong> {{ $plan->location }}</li>
                                <li><strong>{{ __('Status:') }}</strong>
                                    <span class="px-2 py-1 rounded {{ $plan->status === 'cancelado' ? 'bg-red-100 text-red-600' : ($plan->status === 'concluído' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600') }}">
                                        {{ ucfirst($plan->status) }}
                                    </span>
                                </li>
                                <li><strong>{{ __('Pago:') }}</strong>
                                    <span class="{{ $plan->is_paid ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $plan->is_paid ? __('Sim') : __('Não') }}
                                    </span>
                                </li>
                                <li><strong>{{ __('Valor Final:') }}</strong>
                                    {{ $plan->final_value ? number_format($plan->final_value, 2, ',', '.') : __('N/A') }}
                                </li>
                                <li><strong>{{ __('Valor da Taxa Anual:') }}</strong> {{ number_format($plan->annual_fee, 2, ',', '.') }} €</li>
                                <li><strong>{{ __('Taxa Anual Paga:') }}</strong>
                                    <span class="{{ $plan->annual_fee_paid ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $plan->annual_fee_paid ? __('Sim') : __('Não') }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Serviços Adicionais e Extras -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        @if(!empty($plan->services))
                            <div class="border p-4 rounded-lg bg-gray-50">
                                <h4 class="font-semibold text-gray-700">{{ __('Serviços Adicionais') }}</h4>
                                <ul class="mt-2 text-gray-600 list-disc pl-5">
                                    @foreach(json_decode($plan->services ?? '') as $service)
                                        <li>{{ ucfirst(str_replace('_', ' ', $service)) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(!empty($plan->extras))
                            <div class="border p-4 rounded-lg bg-gray-50">
                                <h4 class="font-semibold text-gray-700">{{ __('Extras') }}</h4>
                                <ul class="mt-2 text-gray-600 list-disc pl-5">
                                    @foreach(json_decode($plan->extras ?? '') as $extra)
                                        <li>{{ ucfirst(str_replace('_', ' ', $extra)) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <!-- Observações finais -->
                    @if($plan->final_observations)
                        <div class="mt-6 border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-semibold text-gray-700">{{ __('Observações Finais') }}</h4>
                            <p class="text-gray-600 mt-2">{{ $plan->final_observations }}</p>
                        </div>
                    @endif

                    <!-- Caixa de mensagens -->
                    <div class="mt-8 border p-4 rounded-lg bg-gray-50 max-w-3xl mx-auto">
                        <h4 class="font-semibold text-gray-700 mb-4 text-center">{{ __('Trocar Mensagens com o Gestor da Conta') }}</h4>

                        <!-- Listagem de mensagens -->
                        <div class="mb-4 space-y-4 mt-12">
                            <!-- Mensagem do gestor (à direita) -->
                            <div class="flex justify-end">
                                <div class="bg-blue-500 text-white p-4 rounded-lg max-w-sm text-right shadow-lg">
                                    <p>Bem-vindo ao serviço! Como posso ajudar?</p>
                                    <span class="block text-sm text-gray-200 mt-1">01/01/2025 10:00</span>
                                </div>
                            </div>

                            <!-- Mensagem do cliente (à esquerda) -->
                            <div class="flex justify-start">
                                <div class="bg-gray-200 text-gray-800 p-4 rounded-lg max-w-sm text-left shadow-lg">
                                    <p>Gostaria de mais informações sobre o estado do meu plano.</p>
                                    <span class="block text-sm text-gray-500 mt-1">01/01/2025 10:05</span>
                                </div>
                            </div>

                            <!-- Mensagem do gestor (à direita) -->
                            <div class="flex justify-end">
                                <div class="bg-blue-500 text-white p-4 rounded-lg max-w-sm text-right shadow-lg">
                                    <p>Claro! O seu plano está em revisão. Receberá uma atualização em breve.</p>
                                    <span class="block text-sm text-gray-200 mt-1">01/01/2025 10:10</span>
                                </div>
                            </div>
                        </div>

                        <!-- Formulário de envio -->
                        <form class="mt-12">
                            <div class="flex flex gap-4">
                                <textarea rows="3"
                                          class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                                          placeholder="{{ __('Escreva a sua mensagem aqui...') }}"
                                          required>
                                </textarea>
                                <div class="flex justify-end">
                                    <button type="button"
                                            class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                                        {{ __('Enviar') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>


                    <!-- Botões de ação -->
                    <div class="mt-8 flex justify-end gap-4">
                        <a href="{{ route('plans.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                            {{ __('Voltar') }}
                        </a>
                        @if(Route::has('plans.edit'))
                            <a href="{{ route('plans.edit', $plan->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                {{ __('Editar') }}
                            </a>
                        @endif
                        <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" onsubmit="return confirm('{{ __('Tem a certeza que deseja eliminar este plano?') }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                {{ __('Eliminar') }}
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
