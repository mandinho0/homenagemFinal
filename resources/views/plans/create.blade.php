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
                {{ __('Novo Plano') }}
            </h2>
        </div>
    </x-slot>

    <h3 class="items-center justify-center flex mt-8">
                <span class="block text-lg font-semibold">{{ __('Preço Total desde: ') }}
                    <span id="total-price" data-base-price="2500" class="text-green-600">€2500.00</span>
                </span>
    </h3>

    <div class="py-4 bg-gray-100 flex items-center justify-center">
        <div class="w-full max-w-4xl px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-8 text-gray-900">
                    <form id="multiStepForm" method="POST" action="{{ route('plans.submit') }}">
                        @csrf

                        <!-- Steps Container -->
                        <div id="steps">

                            <!-- Step: Dados pessoais -->
                            <div class="step" id="step-1">
                                <h4 class="text-2xl font-bold text-center mb-6 text-gray-800">{{ __('Dados da Pessoa do Plano') }}</h4>
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label for="name"
                                               class="block text-gray-700 font-semibold">{{ __('Nome Completo') }}<span
                                                class="required-asterisk ml-1 text-red-600">*</span></label>
                                        <input type="text" name="name" id="name"
                                               class="w-full mt-2 border-gray-300 rounded-lg shadow-sm" required>
                                    </div>
                                    <div>
                                        <label for="birth_date"
                                               class="block text-gray-700 font-semibold">{{ __('Data de Nascimento') }}
                                            <span class="required-asterisk ml-1 text-red-600">*</span></label>
                                        <input type="date" name="birth_date" id="birth_date"
                                               class="w-full mt-2 border-gray-300 rounded-lg shadow-sm" required>
                                    </div>
                                    <div>
                                        <label for="email"
                                               class="block text-gray-700 font-semibold">{{ __('Email de Contato') }}
                                            <span class="required-asterisk ml-1 text-red-600">*</span></label>
                                        <input type="email" name="email" id="email"
                                               class="w-full mt-2 border-gray-300 rounded-lg shadow-sm" required>
                                    </div>
                                    <div>
                                        <label for="phone"
                                               class="block text-gray-700 font-semibold">{{ __('Telefone de Contato') }}
                                            <span class="required-asterisk ml-1 text-red-600">*</span></label>
                                        <input type="tel" name="phone" id="phone"
                                               class="w-full mt-2 border-gray-300 rounded-lg shadow-sm" required>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-center">
                                    <button type="button"
                                            class="btn-next bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Próximo') }}
                                    </button>
                                </div>
                            </div>

                            <!-- Step: Tipo de Cerimónia -->
                            <div class="step hidden" id="step-2">
                                <h4 class="text-2xl font-bold text-center mb-6 text-gray-800">{{ __('Tipo de Cerimónia') }}</h4>
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label for="ceremony_type"
                                               class="block text-gray-700 font-semibold">{{ __('Escolha o Tipo de Cerimónia') }}
                                            <span class="required-asterisk ml-1 text-red-600">*</span></label>
                                        <select name="ceremony_type" id="ceremony_type"
                                                class="w-full mt-2 border-gray-300 rounded-lg shadow-sm" required>
                                            <option value="">{{ __('Selecione...') }}</option>
                                            <option value="0">{{ __('Enterro') }}</option>
                                            <option value="1">{{ __('Cremação') }}</option>
                                            <option value="2">{{ __('Outro') }}</option>
                                        </select>
                                    </div>
                                    <div class="hidden mt-3" id="other-cerimony-type">
                                        <label for="other-type"
                                               class="block text-gray-700 font-semibold">{{ __('Especifique outro tipo de cerimónia') }}
                                            <span class="required-asterisk ml-1 text-red-600">*</span></label>
                                        <input type="text" name="other-type" id="other-type"
                                               class="w-full mt-2 border-gray-300 rounded-lg shadow-sm">
                                    </div>
                                    <div class="hidden mt-3" id="measures">
                                        <h4 class="text-lg font-semibold text-gray-800">{{ __('Configurações da urna') }}</h4>
                                        <div class="grid grid-cols-1 gap-4">
                                            <div>
                                                <label for="height"
                                                       class="block text-gray-700 font-semibold">{{ __('Altura (cm)') }}
                                                    <span class="required-asterisk ml-1 text-red-600">*</span></label>
                                                <input type="number" name="height" id="height"
                                                       class="w-full mt-2 border-gray-300 rounded-lg shadow-sm">
                                            </div>
                                            <div>
                                                <label for="weight"
                                                       class="block text-gray-700 font-semibold">{{ __('Peso atual (kg)') }}
                                                    <span class="required-asterisk ml-1 text-red-600">*</span></label>
                                                <input type="number" name="weight" id="weight"
                                                       class="w-full mt-2 border-gray-300 rounded-lg shadow-sm">
                                            </div>
                                        </div>

                                        <div class="mt-3" id="coffin-description">
                                            <label for="coffin_description"
                                                   class="block text-gray-700 font-semibold">{{ __('Descreva como pretende que seja a urna:') }}
                                                <span class="required-asterisk ml-1 text-red-600">*</span></label>
                                            <textarea name="coffin_description" id="coffin_description"
                                                      class="w-full mt-2 border-gray-300 rounded-lg shadow-sm"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-between">
                                    <button type="button"
                                            class="btn-prev bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Anterior') }}
                                    </button>
                                    <button type="button"
                                            class="btn-next bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Próximo') }}
                                    </button>
                                </div>
                            </div>

                            <!-- Step: Local -->
                            <div class="step hidden" id="step-3">
                                <h4 class="text-2xl font-bold text-center mb-6 text-gray-800">{{ __('Escolha do Local') }}</h4>
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label for="location"
                                               class="block text-gray-700 font-semibold">{{ __('Local da Cerimónia') }}
                                            <span class="required-asterisk ml-1 text-red-600">*</span></label>
                                        <input type="text" name="location" id="location"
                                               class="w-full mt-2 border-gray-300 rounded-lg shadow-sm" required>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-between">
                                    <button type="button"
                                            class="btn-prev bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Anterior') }}
                                    </button>
                                    <button type="button"
                                            class="btn-next bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Próximo') }}
                                    </button>
                                </div>
                            </div>

                            <!-- Step: Religião -->
                            <div class="step hidden" id="step-4">
                                <h4 class="text-2xl font-bold text-center mb-6 text-gray-800">{{ __('Escolha da Religião') }}</h4>
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label for="religion"
                                               class="block text-gray-700 font-semibold">{{ __('Religião') }}<span
                                                class="required-asterisk ml-1 text-red-600">*</span></label>
                                        <select name="religion" id="religion"
                                                class="w-full mt-2 border-gray-300 rounded-lg shadow-sm" required>
                                            <option value="">{{ __('Selecione...') }}</option>
                                            <option value="catolica">{{ __('Católica') }}</option>
                                            <option value="protestante">{{ __('Protestante') }}</option>
                                            <option value="judaica">{{ __('Judaica') }}</option>
                                            <option value="islamica">{{ __('Islâmica') }}</option>
                                            <option value="outra">{{ __('Outra') }}</option>
                                        </select>
                                    </div>
                                    <div class="hidden" id="other-religion-container">
                                        <label for="other_religion"
                                               class="block text-gray-700 font-semibold">{{ __('Especifique') }}<span
                                                class="required-asterisk ml-1 text-red-600">*</span></label>
                                        <input type="text" name="other_religion" id="other_religion"
                                               class="w-full mt-2 border-gray-300 rounded-lg shadow-sm">
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-between">
                                    <button type="button"
                                            class="btn-prev bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Anterior') }}
                                    </button>
                                    <button type="button"
                                            class="btn-next bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Próximo') }}
                                    </button>
                                </div>
                            </div>

                            <!-- Step: Serviços Adicionais -->
                            <div class="step hidden" id="step-5">
                                <h4 class="text-2xl font-bold text-center mb-6 text-gray-800">{{ __('Serviços Adicionais') }}</h4>
                                <div class="grid grid-cols-1 gap-6">
                                    @foreach($additionalServices as $code => $label)
                                        <div class="form-check">
                                            <input type="checkbox" name="services[]" value="{{ $code }}" class="form-check-input" data-price="{{ $servicePrices[$code] }}">
                                            <label class="ml-3 text-gray-700 font-semibold">{{ $label }} - desde €{{ $servicePrices[$code] }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mt-6 flex justify-between">
                                    <button type="button"
                                            class="btn-prev bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Anterior') }}
                                    </button>
                                    <button type="button"
                                            class="btn-next bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Próximo') }}
                                    </button>
                                </div>
                            </div>

                            <!-- Step: Escolha de Extras -->
                            <div class="step hidden" id="step-6">
                                <h4 class="text-2xl font-bold text-center mb-6 text-gray-800">{{ __('Escolha de Extras') }}</h4>
                                <div class="grid grid-cols-1 gap-6">
                                    @foreach($extras as $code => $label)
                                        <div class="form-check">
                                            <input type="checkbox" name="extras[]" value="{{ $code }}" class="form-check-input"  data-price="{{ $extraPrices[$code] }}">
                                            <label class="ml-3 text-gray-700">{{ $label }} - €{{ $extraPrices[$code] }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-6 flex justify-between">
                                    <button type="button"
                                            class="btn-prev bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Anterior') }}
                                    </button>
                                    <button type="button"
                                            class="btn-next bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Próximo') }}
                                    </button>
                                </div>
                            </div>

                            <!-- Step: Lista de Pessoas para Notificação -->
                            <div class="step hidden" id="step-7">
                                <h4 class="text-2xl font-bold text-center mb-6 text-gray-800">{{ __('Lista de Pessoas para Notificação') }}</h4>
                                <div id="contact-list" class="grid grid-cols-1 gap-6">
                                    <div class="contact-item flex items-center gap-4">
                                        <div class="flex-grow">
                                            <label for="contacts[]" class="block text-gray-700 font-semibold">
                                                {{ __('Email da Pessoa') }}
                                            </label>
                                            <input type="email" name="contacts[]"
                                                   class="w-full mt-2 border-gray-300 rounded-lg shadow-sm not-required">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 flex justify-center">
                                    <button type="button" id="add-contact"
                                            class="bg-gray-300 hover:bg-gray-400 text-black px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Adicionar Contato') }}
                                    </button>
                                </div>
                                <div class="mt-6 flex justify-between">
                                    <button type="button"
                                            class="btn-prev bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Anterior') }}
                                    </button>
                                    <button type="button"
                                            class="btn-next bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Próximo') }}
                                    </button>
                                </div>
                            </div>

                            <!-- Step: Observações Finais -->
                            <div class="step hidden" id="step-8">
                                <h4 class="text-2xl font-bold text-center mb-6 text-gray-800">{{ __('Observações Finais') }}</h4>
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label for="final_observations"
                                               class="block text-gray-700 font-semibold">{{ __('Descreva como deseja que tudo aconteça com algum pormenor:') }}
                                            <span class="required-asterisk ml-1 text-red-600">*</span>
                                        </label>
                                        <textarea name="final_observations" id="final_observations" rows="4"
                                                  class="w-full mt-2 border-gray-300 rounded-lg shadow-sm"></textarea>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-between">
                                    <button type="button"
                                            class="btn-prev bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Anterior') }}
                                    </button>
                                    <button type="submit"
                                            class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg shadow-lg">
                                        {{ __('Guardar Plano') }}
                                    </button>
                                </div>
                            </div>
                            <!-- input hidden estimated value -->
                            <input type="hidden" id="estimated_value" name="estimated_value" value="2500">
                        </div>
                    </form>
                    <div class="mt-5">
                        <span class="text-xs font-bold italic text-left mb-6 text-gray-800">
                            <span class="required-asterisk mr-1 text-red-600">*</span>
                            {{ __('Campos Obrigatórios') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            const $steps = $('.step');
            const $btnNext = $('.btn-next');
            const $btnPrev = $('.btn-prev');
            const $ceremonyType = $('#ceremony_type');
            const $otherCeremonyType = $('#other-cerimony-type');
            const $otherCeremonyInput = $('#other-type');
            const $religion = $('#religion');
            const $otherReligionContainer = $('#other-religion-container');
            const $otherReligionInput = $('#other_religion');
            const $measures = $('#measures');
            const $contactList = $('#contact-list');
            const $addContactButton = $('#add-contact');
            let currentStep = 0;

            function showStep(index) {
                $steps.addClass('hidden');
                $steps.eq(index).removeClass('hidden');

                $steps.find('input, select, textarea').prop('required', false);
                $steps.eq(index).find('input, select, textarea').prop('required', true);
            }

            $ceremonyType.on('change', function () {
                const value = $(this).val();
                $measures.toggleClass('hidden', value !== '0');
                $otherCeremonyType.toggleClass('hidden', value !== '2');

                if (value === '0') {
                    $measures.find('input, textarea').prop('required', true);
                } else {
                    $measures.find('input, textarea').prop('required', false);
                }

                $otherCeremonyInput.prop('required', value === '2');
            });

            $religion.on('change', function () {
                const value = $(this).val();
                $otherReligionContainer.toggleClass('hidden', value !== 'outra');
                $otherReligionInput.prop('required', value === 'outra');
            });

            $btnNext.on('click', function () {
                /*if (!validateCurrentStep()) {
                    return;
                }*/

                currentStep++;
                showStep(currentStep);
            });

            $btnPrev.on('click', function () {
                currentStep--;
                showStep(currentStep);
            });

            function validateCurrentStep() {
                const $currentForm = $steps.eq(currentStep);
                let isValid = true;

                $currentForm.find('input, select, textarea').each(function (index, el) {
                    if (!this.checkValidity()) {
                        isValid = false;
                        this.reportValidity();
                        return false;
                    }
                });

                return isValid;
            }

            $addContactButton.on('click', function () {
                const newContact = `
                <div class="contact-item flex items-center justify-between gap-4">
                    <div class="flex-grow">
                        <label for="contacts[]" class="block text-gray-700 font-semibold">
                            {{ __('Email da Pessoa') }}
                                </label>
                                <input type="email" name="contacts[]"
                                       class="w-full mt-2 border-gray-300 rounded-lg shadow-sm not-required">
                            </div>
                            <button type="button"
                                    class="mt-8 delete-contact bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg shadow-sm flex items-center justify-center"
                                    style="height: 42px; width: 42px;">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                </div>`;

                $contactList.append(newContact);
            });

            $contactList.on('click', '.delete-contact', function () {
                if ($contactList.find('.contact-item').length > 1) {
                    $(this).closest('.contact-item').remove();
                } else {
                    alert('{{ __("Pelo menos um contato deve ser mantido.") }}');
                }
            });

            showStep(currentStep);

            // Calculating total price
            const $totalPriceLabel = $('#total-price');
            const $serviceCheckboxes = $('input[name="services[]"]');
            const $extrasCheckboxes = $('input[name="extras[]"]');

            function updateTotalPrice() {
                let total = $totalPriceLabel.data('base-price');
                $serviceCheckboxes.each(function () {
                    if (this.checked) {
                        total += parseFloat($(this).data('price'));
                    }
                });
                $extrasCheckboxes.each(function () {
                    if (this.checked) {
                        total += parseFloat($(this).data('price'));
                    }
                });
                $totalPriceLabel.text(`€${total.toFixed(2)}`);
                $('#estimated_value').val(total.toFixed(2));
            }

            $serviceCheckboxes.on('change', updateTotalPrice);
            $extrasCheckboxes.on('change', updateTotalPrice);

            updateTotalPrice();
        });
    </script>
</x-app-layout>
