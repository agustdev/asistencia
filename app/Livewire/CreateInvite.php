<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invitados;
use Illuminate\Support\Str;
use App\Models\instituciones;

class CreateInvite extends Component
{
    public $open = false;
    public $institucion, $nombre_completo, $posicion, $correo, $telefono;
    // public function mount(instituciones $institucion)
    // {
    //     $this->institucion = $institucion;
    // }
    public function render()
    {
        // $institucion = instituciones::where('id', $this->institucion)->first();
        return view('livewire.create-invite');
    }

    public function update()
    {
        $this->validate([
            'nombre_completo' => 'required',
            'posicion' => 'required',
            'correo' => 'email|unique:invitados,correo'
        ]);
        Invitados::create([
            'nombre_completo' => Str::upper($this->nombre_completo),
            'posicion' => Str::upper($this->posicion),
            'correo' => $this->correo ?? null,
            'telefono' => $this->telefono ?? null,
            'asistio' => 'Si'
        ]);
        $this->dispatch('render')->to('show-invitados');
        $this->dispatch('alert', 'Información actualizada');
        $this->reset(['open', 'nombre_completo', 'posicion', 'correo', 'telefono']);
    }
}
