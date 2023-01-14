<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;
    public $search = '';

    public $table_services, $name, $service_id;
    public $updateMode = false;

    protected $listeners = ['deleteService'];

    public function deleteService(Service $service)
    {
        $service->delete();
    }

    public function render()
    {
        // sleep(0.3);
        $this->table_services = Service::all();
        $allServices = Service::search('name', $this->search)->paginate(10);
        return view('livewire.services', [
            'allServices' => $allServices
        ]);
    }

    private function resetInputFields(){
        $this->name = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
        ]);

        Service::create($validatedDate);
        session()->flash('status', 'service-created');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $this->service_id = $id;
        $this->name = $service->name;
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
        ]);

        $service = Service::find($this->service_id);
        $service->update([
            'name' => $this->name,
        ]);
        $this->updateMode = false;
        session()->flash('status', 'service-created');
        $this->resetInputFields();
    }

    /* public function delete($id)
    {
        Service::find($id)->delete();
        session()->flash('status', 'service-deleted');
    } */
}
