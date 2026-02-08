<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Dados do endpoint do site: $this->url") }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

                    <!-- Table Flowbite -->
                    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">

                        <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 p-4">

                            <div class="relative">
                                <input type="text" id="search" class="block w-full max-w-96 ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" placeholder="Buscar" wire:model.live.debounce.300ms="search">
                            </div>

                            <div>
                                <a href="{{ route('site.endpoint.create', $this->id) }}" class="text-white bg-green-600 hover:bg-green-700
                                 focus:ring-4 focus:ring-green-300
                                 shadow-md font-medium rounded-full
                                 text-sm px-4 py-2.5 focus:outline-none"
                                >
                                    Novo
                                </a>
                            </div>

                        </div> <!-- flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 p-4 -->

                        <table class="w-full text-sm text-left rtl:text-right text-body">

                            <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-t border-default-medium">

                            <tr>

                                <th scope="col" class="p-4">
                                    Site
                                </th>

                                <th scope="col" class="px-6 py-3 font-medium">
                                    Endpoint
                                </th>

                                <th scope="col" class="px-6 py-3 font-medium">
                                    Frequência
                                </th>

                                <th scope="col" class="px-6 py-3 font-medium">
                                    Próxima verificação
                                </th>

                                <th scope="col" class="px-6 py-3 font-medium">
                                    Logs
                                </th>

                            </tr>

                            </thead>

                            <tbody>

                            @forelse($endpoints  as $endpoint)

                                <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">

                                    <th scope="row" class="flex items-center px-6 py-4 text-heading whitespace-nowrap">
                                        <img
                                            class="w-10 h-10 rounded-full"
                                            src="{{ asset('assets/images/www.jpg') }}">
                                        <a href="{{ route('site.endpoint.edit', [$this->id, $endpoint->id]) }}">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold">{{ $endpoint->site->url }}</div>
                                            </div>
                                        </a>
                                    </th>

                                    <td class="px-6 py-4">
                                        <a href="{{ route('site.endpoint.edit', [$this->id, $endpoint->id]) }}">
                                            {{ $endpoint->name }}
                                        </a>
                                    </td>

                                    <td class="px-6 py-4">
                                        <a href="{{ route('site.endpoint.edit', [$this->id, $endpoint->id]) }}">
                                            {{ $endpoint->frequency }}
                                        </a>
                                    </td>

                                    <td class="px-6 py-4">
                                        <a href="{{ route('site.endpoint.edit', [$this->id, $endpoint->id]) }}">
                                            {{ \Carbon\Carbon::parse($endpoint->next_check)->format('d/m/Y H:i:s') }}
                                        </a>
                                    </td>

                                    <td class="px-6 py-4">
                                        <a href="{{ route('site.endpoint.edit', [$this->id, $endpoint->id]) }}">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1v3m5-3v3m5-3v3M1 7h7m1.506 3.429 2.065 2.065M19 7h-2M2 3h16a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Zm6 13H6v-2l5.227-5.292a1.46 1.46 0 0 1 2.065 2.065L8 16Z"/>
                                            </svg>
                                        </a>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                        Nenhum registro encontrado!
                                    </td>
                                </tr>

                            @endforelse

                            </tbody> <!-- -->

                            <tfoot>

                            <tr>
                                <td colspan="5" class="px-6 py-4">
                                    {{ $endpoints->links() }}
                                </td>
                            </tr>

                            </tfoot> <!-- -->

                        </table> <!-- w-full text-sm text-left rtl:text-right text-body -->

                    </div> <!-- relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default -->

                </div> <!-- p-6 lg:p-8 bg-white border-b border-gray-200 -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</div> <!-- -->
