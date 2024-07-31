<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\instituciones;
use Livewire\WithPagination;

class ShowInstituciones extends Component
{
    use WithPagination;
    public $search;
    public $readyToLoad = false;
    protected $listeners = ['render'];
    public function search()
    {
        $this->resetPage();
    }
    public function loadInstituciones()
    {
        $this->readyToLoad = true;
    }
    public function render()
    {
        if ($this->readyToLoad) {
            $instituciones = instituciones::where('nombre', 'like', '%' . $this->search . '%')->orderBy('nombre', 'asc')->paginate(20);
        } else {
            $instituciones = [];
        }
        return view('livewire.show-instituciones', compact('instituciones'));
    }
}
