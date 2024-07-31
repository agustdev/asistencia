<div>
    <x-guest-layout>
        <h3
            class="uppercase mb-4 text-3xl font-extrabold leading-none tracking-tight text-blue-900 md:text-5xl lg:text-4xl text-center lg:text-start p-4">
            Sistema de Registro de Asistencia a Evento, ARD.
            <div class="border-2 border-purple-900"></div>
        </h3>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="mx-auto content-center items-center">
                <div class="grid grid-cols-2 gap-2 items-center justify-center md:flex lg:flex">
                    <img src="{{ asset('images/red-mamla.png') }}" alt="">
                    <img src="{{ asset('images/women-maritime.png') }}" alt="">
                    <img src="https://portuaria.gob.do/wp-content/uploads/2021/02/LOGODARK.png" alt=""
                        width="200" class="mr-4">
                    <img src="https://armada.mil.do/wp-content/uploads/2024/07/logo_armada-min-283x300-1.png"
                        alt="" width="100" class="rounded-full">
                </div>
                <div class="text-center font-extrabold text-lg">
                    <h1 class="border-b-2 border-pink-900 text-pink-600 mb-3 py-3">MUJERES DOMINICANAS LIDERANDO LA
                        TRANSFORMACION DE
                        LA INDUSTRIA LOGISTICA, MARITIMA Y PORTUARIA
                    </h1>
                    <h1 class="uppercase font-extrabold">Invitados al evento - {{ $insti->nombre }}</h1>
                </div>
            </div>

            <x-table>
                <div class="px-6 py-4 flex items-center">
                    <x-input wire:model.live='search' type="text" class="uppercase flex-1 mx-4"
                        placeholder="Buscar invitado"></x-input>
                    @livewire('create-invite', ['institucion' => $institucion], key(request()->route()->institucion))
                    <a href="{{ url('/') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Volver
                    </a>
                </div>
                <div wire:loading wire:target="loadInvitados" class="py-4 px-6">
                    <div role="status">
                        <svg aria-hidden="true"
                            class="w-8 h-8 text-gray-200 animate-spin dark:text-blue-900 fill-gray-600"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                @if (count($invitados))
                    <table class="min-w-full divide-y divide-gray-200 uppercase text-center">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 ">No.</th>
                                <th scope="col" class="cursor-pointer px-6 py-3 tracking-tighter">
                                    Nombre del invitado
                                    {{-- Sort --}}
                                </th>
                                <th scope="col" class="cursor-pointer px-6 py-3 tracking-tighter">
                                    Posición
                                </th>
                                <th scope="col" class="cursor-pointer px-6 py-3 tracking-tighter">

                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @php
                                $x = 1;
                            @endphp
                            @foreach ($invitados as $invitado)
                                <tr wire:key="{{ $invitado->id }}" class="hover:bg-gray-300">
                                    <td class="px-6 py-4 ">{{ $x++ }}</td>
                                    <td class="px-6 py-4 ">
                                        {{ $invitado->nombre_completo }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $invitado->posicion }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        @livewire('confirm-asistencia', ['invitado' => $invitado], key($invitado->id))
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($invitados->hasPages())
                        <div class="px-6 py-3">
                            {{ $invitados->links() }}
                        </div>
                    @endif
                @else
                    <div class="px-6 py-4">No se encuentra información en la busqueda
                        <strong>{{ $search }}</strong>
                    </div>
                @endif
            </x-table>
        </div>

    </x-guest-layout>
</div>
