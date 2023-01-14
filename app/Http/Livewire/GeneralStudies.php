<?php

namespace App\Http\Livewire;

use App\Models\Study;
use Livewire\Component;
use Livewire\WithPagination;

class GeneralStudies extends Component
{
    use WithPagination;
    public $search = '';
    public $studies;

    public function render()
    {
        $this->studies = Study::all();
        $allStudies = Study::search(['name', 'types.name', 'documents.name'], $this->search)->paginate(10);
        return view('livewire.general-studies', [
            'allStudies' => $allStudies
        ]);
    }
}
