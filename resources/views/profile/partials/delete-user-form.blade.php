<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Apagar Conta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ao apagar a sua conta, todos os dados e pedidos associados serão eliminados. Caso queira guardar informação associada à sua conta, envie-nos um email através do formulário de contacto na página inicial para que estes lhe sejam fornecidos.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Apagar conta') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Tem a certeza que quer apagar a sua conta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Toda a informação associada à sua conta será eliminada permanentemente caso ela seja eliminada. Por favor introduza a sua palavra-passe para confirmar a eliminação da sua conta.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Palavra-passe') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Palavra-passe') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Apagar conta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
