<?php

namespace App\Http\Livewire;

use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;

class TypesStudiesExtra extends Component
{
    use WithPagination;
    public $search = '';

    public $type_studies, $name, $description, $type_id;
    public $updateMode = false;

    protected $listeners = ['deleteTypeStudy'];

    public function deleteTypeStudy(Type $type_study)
    {
        if ($type_study->studies()->exists())
        {
            return session()->flash('status', 'cannot-deleted');
        }
        $type_study->delete();
        session()->flash('status', 'type_study-deleted');
    }


    public function render()
    {
        $this->type_studies = Type::all();
        $allTypes = Type::search('name', $this->search)->paginate(5);
        return view('livewire.types-studies-extra', [
            'allTypes' => $allTypes
        ]);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Type::create($validatedDate);
        session()->flash('status', 'type-created');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $type = Type::findOrFail($id);
        $this->type_id = $id;
        $this->name = $type->name;
        $this->description = $type->description;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $type = Type::find($this->type_id);
        $type->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->updateMode = false;
        session()->flash('status', 'type-created');
        $this->resetInputFields();
    }

    /* public function delete($id)
    {
        Type::find($id)->delete();
        session()->flash('status', 'type-deleted');
    } */
}
