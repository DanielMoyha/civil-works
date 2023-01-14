<?php

namespace App\Http\Livewire;

use App\Models\Construction;
use Livewire\Component;
use Livewire\WithPagination;

class GeneralConstructions extends Component
{
    use WithPagination;
    public $search = '';
    public $constructions;

    public function render()
    {
        $this->constructions = Construction::all();
        $allconstructions = Construction::search(['name', 'materials.name'], $this->search)->paginate(10);
        return view('livewire.general-constructions', [
            'allconstructions' => $allconstructions
        ]);
    }
}
