<?php

namespace App\Http\Livewire;

use App\Models\Work;
use Livewire\Component;
use Livewire\WithPagination;

class Works extends Component
{
    use WithPagination;
    public $search = '';
    public $table_works;
    protected $listeners = ['deregistering_work', 'enable_work'];

    public function deregistering_work(Work $work)
    {
        $value = 0;
        $work->update([
            'status' => $work->status = $value
        ]);
    }

    public function enable_work(Work $work)
    {
        $value = 1;
        $work->update([
            'status' => $work->status = $value
        ]);
    }

    public function render()
    {
        $this->table_works = Work::all();
        $works = Work::search(['name', 'name_contractor', 'user.name', 'city.name'], $this->search)->paginate(10);
        return view('livewire.works', [
            'works' => $works
        ]);
    }
}
