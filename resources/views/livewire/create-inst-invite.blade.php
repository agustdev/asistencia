<div>
    <x-green-button type="button" wire:click="$set('open', true)">+ Nuevo</x-green-button>
    <x-dialog-modal wire:model='open'>
        <x-slot name="title">
            Crear nuevo invitado
        </x-slot>
        <x-slot name="content">
            <div class="mt-4 uppercase">
                <x-label class="text-3xl">Institución</x-label>
                <x-input class="block w-full mt-2 uppercase" wire:model='institucion'></x-input>
            </div>
            <div class="mt-4 uppercase">
                <x-label class="text-3xl">Nombre completo</x-label>
                <x-input class="block w-full mt-2 uppercase" wire:model='nombre_completo'></x-input>
            </div>
            <div class="mt-4 uppercase">
                <x-label class="text-3xl">Cargo</x-label>
                <x-input class="block w-full mt-2 uppercase" wire:model='posicion'></x-input>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-danger-button class="mr-4" wire:click="$set('open', false)">Cancelar</x-danger-button>
            <x-blue-button wire:click='update' wire:loading.attr='disabled'
                class="disabled:opacity-25">Guardar</x-blue-button>
        </x-slot>
    </x-dialog-modal>
</div>
