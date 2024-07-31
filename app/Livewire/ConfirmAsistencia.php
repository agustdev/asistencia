<?php

namespace App\Livewire;

use App\Models\Invitados;
use App\Models\representantes;
use Livewire\Component;

class ConfirmAsistencia extends Component
{
    public $open = false;
    public $invitado, $id_institucion, $idinvitado;
    public $asistio = 'Si';
    public $representante;

    // public function mount(Invitados $invitado)
    // {
    //     $this->invitado = $invitado;
    // }
    public function render()
    {
        return view('livewire.confirm-asistencia');
    }

    public function update()
    {
        if ($this->representante != '') {
            $this->invitado->asistio = 'Otro';
            representantes::create([
                'id_institucion' => $this->invitado->id_institucion,
                'nombre_completo' => $this->representante,
                'id_invitado' => $this->invitado->id
            ]);
        } else {
            $this->invitado->asistio = $this->asistio;
        }
        $this->invitado->update();
        $this->dispatch('show-invitados', 'render');
        $this->reset(['open', 'representante', 'asistio']);
    }

    public function updatingOpen()
    {
        if ($this->open === false) {
            $this->reset(['asistio', 'representante']);
        }
    }
}
