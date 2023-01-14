<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    protected $listeners = ['deleteRole'];

    public function deleteRole(Role $role)
    {
        $role->delete();
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.roles', [
            'roles' => $roles,
        ]);
    }
}
