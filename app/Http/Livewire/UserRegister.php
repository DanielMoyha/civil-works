<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserRegister extends Component
{

    public $name;
    public $username;
    public $email;
    public $phone;
    public $address;
    public $city_id;
    public $password;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'phone' => 'required|numeric|digits:8',
            'address' => 'required|string|max:255',
            'city_id' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.unique' => 'Este nombre de usuario ya existe',
            'email.unique' => 'Este email ya corresponde a un usuario existente',
        ];
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /* public function storeUser()
    {
        $data = $this->validate();
        dd($data);

        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city_id' => $data['city_id'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('admin.users.index');
    } */
    public function render()
    {
        return view('livewire.user-register');
    }
}
