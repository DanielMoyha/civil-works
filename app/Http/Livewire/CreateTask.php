<?php

namespace App\Http\Livewire;

use App\Models\Control;
use App\Models\Supervision;
use Livewire\Component;

class CreateTask extends Component
{
    public $description;
    public $supervision_id;
    public $a;

    protected $rules = [
        'description' => 'required|max:100|string'
    ];

    public function mount($supervision_id)
    {
        $supervision = Supervision::find($supervision_id);
        // $this->supervision = Supervision::find($supervision_id);
        $this->a = $supervision->id;
    }

    public function submit()
    {
        $this->validate();

        $this->createTask();

        $this->description = '';

        $this->emit('taskAdded');
    }

    public function createTask()
    {
        Control::create([
            'supervision_id' => $this->supervision_id,
            'description' => $this->description
        ]);
    }

    public function render()
    {
        // $supervision = Supervision::find($this->supervision_id);
        return view('livewire.create-task', [
            'supervision' => Supervision::find($this->supervision_id)
        ]);
    }
}
