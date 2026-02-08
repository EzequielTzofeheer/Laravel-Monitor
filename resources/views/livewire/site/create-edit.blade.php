<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dados do site') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

                    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

                        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">

                            @include('livewire.site.partials.form')

                            <div class="p-1 flex gap-4 mt-4">

                                <button type="submit"
                                        class="text-white bg-blue-600 hover:bg-blue-700
                                    focus:ring-4 focus:ring-blue-300
                                    shadow-md font-medium rounded-full
                                    text-sm px-4 py-2.5 focus:outline-none"
                                >
                                    Salvar
                                </button>

                                <a href="{{ route('site') }}"
                                   class="text-white bg-green-600 hover:bg-green-700
                                    focus:ring-4 focus:ring-green-300
                                    shadow-md font-medium rounded-full
                                    text-sm px-4 py-2.5 focus:outline-none"
                                >
                                    Voltar
                                </a>

                                @if ($isEdit)

                                    <button
                                        wire:click.prevent="destroy"
                                        wire:confirm="Tem certeza que deseja excluir este registro?"
                                        class="text-white bg-red-600 hover:bg-red-700
                                        focus:ring-4 focus:ring-red-300
                                        shadow-md font-medium rounded-full
                                        text-sm px-4 py-2.5 focus:outline-none"
                                    >
                                        Excluir
                                    </button>

                                @endif

                            </div> <!-- p-1 flex gap-4 -->

                        </form>

                    </div> <!-- flex h-full w-full flex-1 flex-col gap-4 rounded-xl -->

                </div> <!-- p-6 lg:p-8 bg-white border-b border-gray-200 -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</div> <!-- -->
