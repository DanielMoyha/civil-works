<?php

namespace App\Http\Livewire;

use App\Models\Supervision;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class GeneralSupervisions extends Component
{
    use WithPagination;
    public $search = '';
    public $supervisions;

    public function render()
    {
        /* $exists =  Storage::disk('public')->get('followUp/');
        dd($exists); */
        $this->supervisions = Supervision::all();
        $allSupervisions = Supervision::search(['name'], $this->search)->paginate(10);
        return view('livewire.general-supervisions', [
            'allSupervisions' => $allSupervisions
        ]);
    }
}
