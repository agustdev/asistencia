<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invitados;
use App\Models\instituciones;
use Livewire\WithPagination;

class ShowInvitados extends Component
{
    use WithPagination;
    public $search;
    public $institucion;
    protected $listeners = ['render'];

    public function mount($institucion)
    {
        $this->institucion = $institucion;
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {

        $insti = instituciones::where('id', $this->institucion)->first();
        $invitados = Invitados::where('id_institucion', $insti->id)
            ->where('nombre_completo', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.show-invitados', compact('invitados', 'insti'));
    }
}
