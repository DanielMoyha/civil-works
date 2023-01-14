<?php

namespace App\Http\Livewire;

use App\Models\Control;
use App\Models\Supervision;
use Carbon\Carbon;
use Livewire\Component;

class CompletedTasks extends Component
{
    public $tasks;
    public $supervision_id;
    public $a;

    protected $listeners = [
        'taskAdded',
        'taskCompleted'
    ];

    public function mount($supervision_id)
    {
        $supervision_id = Supervision::find($this->supervision_id);
        // $this->a = $supervision_id;
        $this->getTasks();
    }

    public function taskAdded()
    {
        $this->getTasks();
    }

    public function taskCompleted()
    {
        $this->getTasks();
    }

    public function getTasks()
    {
        // $a = Supervision::find($this->supervision_id);
        $tasks = Control::where('completed_at', '!=', null)
            ->where('supervision_id', $this->supervision_id)
            ->orderBy('completed_at', 'desc')
            ->get();

        foreach ($tasks as $key => $task) {
            $date = Carbon::parse($task->completed_at);
            // $task->completed_at = $date->format('m/d/Y g:i A');
            $task->completed_at = $date;
        }

        $this->tasks = $tasks;
    }

    public function getTask($id)
    {
        $this->task = Control::find($id);
    }

    public function returnTask($id)
    {
        $this->getTask($id);
        $this->task->supervision_id;
        $this->task->completed_at = null;
        $this->task->save();

        $this->mount($id);

        $this->emit('taskReturned');
    }

    public function deleteTask($id)
    {
        $this->getTask($id);
        $this->task->delete();

        $this->mount($id);
    }

    public function render()
    {
        return view('livewire.completed-tasks');
    }
}
