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

                    <!-- Timeline Flowbite -->
                    <ol class="relative border-s border-default">

                        @forelse($checks  as $check)

                            <li class="mb-10 ms-6">

                                <span class="absolute flex items-center justify-center w-6 h-6 bg-brand-softer rounded-full -start-3 ring-8 ring-buffer">
                                    <svg class="w-3 h-3 text-fg-brand-strong" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                                    </svg>
                                </span>

                                <time class="bg-neutral-secondary-medium border border-default-medium text-heading text-xs font-medium px-1.5 py-0.5 rounded">
                                    {{ \Carbon\Carbon::parse($check->created_at)->format('d/m/Y H:i:s') }}
                                </time>

                                <h3 class="flex items-center mb-1 text-lg font-semibold text-heading my-2">
                                    {{ $this->url }}{{ $check->endpoint->name }}
                                    <span class="ms-2 bg-brand-softer border border-brand-subtle text-fg-brand-strong text-xs font-medium px-1.5 py-0.5 rounded">
                                        {{ $check->status_code }}
                                    </span>
                                </h3>

                                <p class="mb-4 text-body">
                                    {{ $check->response_body }}
                                </p>

                            </li> <!-- -->

                        @empty

                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    Nenhum registro encontrado!
                                </td>
                            </tr>

                        @endforelse

                    </ol> <!-- -->

                </div> <!-- p-6 lg:p-8 bg-white border-b border-gray-200 -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</div> <!-- -->
