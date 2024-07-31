<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invitados;
use Illuminate\Support\Str;
use App\Models\instituciones;

class CreateInvite extends Component
{
    public $open = false;
    public $institucion, $nombre_completo, $posicion;
    public function mount(instituciones $institucion)
    {
        $this->institucion = $institucion;
    }
    public function render()
    {
        $institucion = instituciones::where('id', $this->institucion)->first();
        return view('livewire.create-invite', compact('institucion'));
    }

    public function update()
    {
        Invitados::create([
            'id_institucion' => $this->institucion->id,
            'nombre_completo' => Str::upper($this->nombre_completo),
            'posicion' => Str::upper($this->posicion),
            'asistio' => 'Si'
        ]);
        $this->dispatch('render')->to('show-invitados');
        $this->dispatch('alert', 'Información actualizada');
        $this->reset(['open', 'nombre_completo', 'posicion']);
    }
}
