<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update'); */
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $usersHasWork = User::has('works')->find(6);
        // dd($usersHasWork);
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'phone' => 'required|numeric|digits:8',
            'address' => 'required|string|max:255',
            'city_id' => 'required',
            'password' => ['required', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city_id' => $request->city_id,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // return redirect()->route('admin.users.index');
        return redirect()->route('admin.users.editRole', $user)->with('status','user-registered');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit-all', [
            'user' => $user
        ]);
    }

    public function editRole(User $user)
    {
        $roles = Role::all();
        $userHasRoles = array_column(json_decode($user->roles, true), 'id');
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles,
            'userHasRoles' => $userHasRoles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => ['required','string','max:255',Rule::unique('users')->ignore($user->id)],
            'email' => ['required','string','email','max:255',  Rule::unique('users')->ignore($user->id),],
            'is_active' => 'required','boolean',
            'phone' => 'required|numeric|digits:8',
            'address' => 'required|string|max:255',
            'city_id' => 'required',
        ]);

        $user->update($request->all());
        // $user->fill($request->post())->save();
        return redirect()->route('admin.users.index', $user)->with('status', 'user-updated');
    }

    public function updateRole(Request $request, User $user)
    {
        //sync se encargará de colocar nuevos registros en la tabla intermedia 'model_has_roles'
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index', $user)->with('status', 'role-assigned');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('info', 'Usuario eliminado correctamente');
    }
}
