<div>
    <button @if ($invitado->asistio == 'Si') disabled @endif @if ($invitado->asistio == 'Otro') disabled @endif
        type="button" wire:click="$set('open', true)"
        class="disabled:opacity-25 inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        Asistencia
    </button>

    <x-dialog-modal wire:model='open'>
        <x-slot name="title">
            Confirmación de asistencia - {{ $invitado->nombre_completo }}
        </x-slot>
        <x-slot name="content">
            <x-label class="text-3xl">Esta presente?</x-label>
            <div>
                <label class="px-2">
                    <input type="radio" wire:model="asistio" class="asistencia" value="Si" />
                    Si
                </label>
                <label class="px-2">
                    <input type="radio" wire:model="asistio" class="asistencia" value="No" />
                    No
                </label>
            </div>

            <div class="representante hidden mt-4">
                <h3>En caso de asistir otra persona:</h3>
                <x-label class="text-3xl">Nombre del representante</x-label>
                <x-input class="block w-full mt-2" wire:model='representante'></x-input>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-danger-button class="mr-4" wire:click="$set('open', false)">Cancelar</x-danger-button>
            <x-blue-button wire:click='update' wire:loading.attr='disabled'
                class="disabled:opacity-25">Aceptar</x-blue-button>
        </x-slot>
        @push('js')
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
            <script>
                $('.asistencia').on('click', function() {
                    if ($(this).val() != 'Si') {
                        $('.representante').show();
                    } else {
                        $('.representante').hide();
                    }
                });
            </script>
        @endpush
    </x-dialog-modal>
</div>
