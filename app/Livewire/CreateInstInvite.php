<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invitados;
use Illuminate\Support\Str;
use App\Models\instituciones;

class CreateInstInvite extends Component
{
    public $open = false;
    public $nombre_completo, $institucion, $posicion;
    public function render()
    {
        return view('livewire.create-inst-invite');
    }

    public function update()
    {
        $institucion = instituciones::create([
            'nombre' => Str::upper($this->institucion)
        ]);

        Invitados::create([
            'id_institucion' => $institucion->id,
            'nombre_completo' => Str::upper($this->nombre_completo),
            'posicion' => Str::upper($this->posicion),
            'asistio' => 'Si'
        ]);
        $this->dispatch('show-instituciones', 'render');
        $this->reset(['open', 'nombre_completo', 'institucion', 'posicion']);
        $this->dispatch('alert', 'Información actualizada');
    }
}
