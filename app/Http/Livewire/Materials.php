<?php

namespace App\Http\Livewire;

use App\Models\Material;
use Livewire\WithPagination;
use Livewire\Component;

class Materials extends Component
{
    use WithPagination;
    public $search = '';
    public $materials;
    public $name;
    public $quantity;
    public $remarks;
    public $material_id;
    public $updateMode = false;

    protected $listeners = ['deleteMaterial'];

    public function deleteMaterial(Material $material)
    {
        if ($material->constructions()->exists())
        {
            return session()->flash('status', 'cannot-deleted');
        }
        $material->delete();
        session()->flash('status', 'material-deleted');
    }

    public function render()
    {
        $this->materials = Material::all();
        $allMaterials = Material::search('name', $this->search)->paginate(10);
        return view('livewire.materials', [
            'allMaterials' => $allMaterials
        ]);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->quantity = '';
        $this->remarks = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'quantity' => 'required',
            'remarks' => 'nullable',
        ]);

        // dd($validatedDate);

        Material::create($validatedDate);
        session()->flash('status', 'material-created');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        $this->material_id = $id;
        $this->name = $material->name;
        $this->quantity = $material->quantity;
        $this->remarks = $material->remarks;
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
            'quantity' => 'required',
            'remarks' => 'nullable',
        ]);

        $material = Material::find($this->material_id);
        $material->update([
            'name' => $this->name,
            'quantity' => $this->quantity,
            'remarks' => $this->remarks,
        ]);
        $this->updateMode = false;
        session()->flash('status', 'material-created');
        $this->resetInputFields();
    }

    /* public function delete($id)
    {
        Material::find($id)->delete();
        session()->flash('status', 'material-deleted');
    } */
}
