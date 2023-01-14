<?php

namespace App\Http\Livewire;

use App\Models\Control;
use App\Models\Supervision;
use Livewire\Component;

class EditTask extends Component
{
    public $task;
    public $description;
    public $supervision_id;
    public $a;

    protected $rules = [
        'description' => 'required|max:100|string'
    ];

    protected $listeners = [
        'editingTask'
    ];

    public function mount($supervision_id)
    {
        $supervision_id = Supervision::find($this->supervision_id);
        $this->getTask();
    }

    public function submit()
    {
        $this->validate();

        $this->updateTask();

        $this->task = null;

        $this->emit('taskEdited');
    }

    public function editingTask()
    {
        $this->getTask();
    }

    public function updateTask()
    {
        $this->task->description = $this->description;
        $this->task->supervision_id = $this->supervision_id;
        $this->task->editing = false;

        $this->task->save();
    }

    public function getTask()
    {
        $this->task = Control::where('editing', '=', true)
        ->where('supervision_id', $this->supervision_id)
            ->first();

        if($this->task) {
            $this->description = $this->task->description;
        }
    }
    public function render()
    {
        return view('livewire.edit-task', [
            'supervision' => Supervision::find($this->supervision_id)//nueva línea agregada
        ]);
    }
}
