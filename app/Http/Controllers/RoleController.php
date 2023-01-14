<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        //Usuarios con el mismo rol
        /* foreach ($roles as $role) {
            foreach ($role->users as $user) {
                $words = explode(' ', $user->name);
                $acronym = '';
                foreach ($words as $w) {
                    $acronym .= mb_substr($w, 0, 1);
                }
            }
        } */

        return view('admin.roles.index', [
            'roles' => $roles,
            // 'acronym' => $acronym
        ]);
    }

    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::all();

        // dd($permissions);
        return view('admin.roles.create', [
            'permissions' => $permissions,
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        //se crea el nuevo rol
        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        //y asignamos los permisos seleccionados al rol creado
        $role->permissions()->sync($request->permissions);

        // return redirect()->route('admin.roles.edit', $role)->with('Datos Guardados Correctamente');
        return redirect()->route('admin.roles.index')->with('status','role-created');
    }

    public function show(Role $role)
    {
        return view('admin.roles.show');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $userHasRoles = array_column(json_decode($role->permissions, true), 'id');
        return view('admin.roles.edit', [
            'role' => $role,
            'userHasRoles' => $userHasRoles,
            'permissions' => $permissions
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role->update($request->all());

        //y asignamos los permisos seleccionados al rol creado
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit', $role)->with('Datos Guardados Correctamente');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index', $role)->with('status','role-deleted');
    }
}
