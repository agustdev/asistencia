<div>
    <x-green-button type="button" wire:click="$set('open', true)">+ Nuevo</x-green-button>
    <x-dialog-modal wire:model='open'>
        <x-slot name="title">
            Crear nuevo invitado
        </x-slot>
        <x-slot name="content">
            <div class="mt-4 uppercase">
                <x-label class="text-3xl">Nombre completo</x-label>
                <x-input class="block w-full mt-2 uppercase" wire:model='nombre_completo'></x-input>
            </div>
            <div class="mt-4 uppercase">
                <x-label class="text-3xl">Correo electrónico</x-label>
                <x-input class="block w-full mt-2 uppercase" wire:model='correo'></x-input>
            </div>
            <div class="mt-4 uppercase">
                <x-label class="text-3xl">Teléfono </x-label>
                <x-input class="block w-full mt-2 uppercase phone" wire:model='telefono'></x-input>
            </div>
            <div class="mt-4 uppercase">
                <x-label class="text-3xl">Cargo</x-label>
                <x-input class="block w-full mt-2 uppercase" wire:model='posicion'></x-input>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-danger-button class="mr-4" wire:click="$set('open', false)">Cancelar</x-danger-button>
            <x-blue-button wire:click='update' wire:loading.attr='disabled'
                class="disabled:opacity-25">Aceptar</x-blue-button>
        </x-slot>
    </x-dialog-modal>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $('.phone').mask('(000) 000-0000');
</script>
