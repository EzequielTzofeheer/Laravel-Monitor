<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sites') }}
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
                                <a href="{{ route('site.create') }}" class="text-white bg-green-600 hover:bg-green-700
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
                                        Usuário
                                    </th>

                                    <th scope="col" class="px-6 py-3 font-medium">
                                        URL
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                            @forelse($sites  as $site)

                                <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">

                                    <th scope="row" class="flex items-center px-6 py-4 text-heading whitespace-nowrap">
                                        <img
                                            class="w-10 h-10 rounded-full"
                                            src="{{ asset('assets/images/www.jpg') }}">
                                        <a href="{{ route('site.edit', $site->id) }}">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold">{{ $site->user->name }}</div>
                                                <div class="font-normal text-body">{{ $site->user->email }}</div>
                                            </div>
                                        </a>
                                    </th>

                                    <td class="px-6 py-4">
                                        <a href="{{ route('site.edit', $site->id) }}">
                                            {{ $site->url  }}
                                        </a>
                                    </td>

                                    <td class="px-6 py-4">
                                        <a href="{{ route('site.endpoint', $site->id) }}">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
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
                                        {{ $sites->links() }}
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
