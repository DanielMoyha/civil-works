<?php

namespace App\Http\Livewire;

use App\Models\Control;
use App\Models\Supervision;
use Livewire\Component;

class Tasks extends Component
{
    public $tasks;
    public $task;
    public $supervision_id;
    public $a;

    protected $listeners = [
        'taskAdded',
        'taskEdited',
        'taskReturned'
    ];

    public function mount($supervision_id)
    {
        $supervision_id = Supervision::find($this->supervision_id);
        // $$supervision_id->id = $this->id;

        $this->getTasks();
    }

    public function taskAdded()
    {
        $this->getTasks();
    }

    public function taskEdited()
    {
        $this->getTasks();
    }

    public function taskReturned()
    {
        $this->getTasks();
    }

    public function taskCompleted($id)
    {
        $this->getTask($id);
        $this->task->supervision_id = $this->supervision_id;
        $this->task->completed_at = now()->toDateTimeString();
        $this->task->save();

        $this->mount($id);

        $this->emit('taskCompleted');
    }

    public function editTask($id)
    {
        $editingTask = Control::where('editing', '=', true)->first();

        if(!$editingTask) {
            $this->getTask($id);
            $this->task->editing = true;
            $this->task->save();

            $this->mount($id);

            $this->emit('editingTask');
        }
    }

    public function deleteTask($id)
    {
        $this->getTask($id);
        $this->task->delete();

        $this->mount($id);
    }

    public function getTasks()
    {
        $this->tasks = Control::where('completed_at', null)
            ->where('editing', '!=', true)
            ->where('supervision_id', $this->supervision_id)
            ->get();
    }

    public function getTask($id)
    {
        $this->task = Control::find($id);
    }

    public function render()
    {
        return view('livewire.tasks');
    }
}
