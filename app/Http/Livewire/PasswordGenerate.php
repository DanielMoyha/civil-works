<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PasswordGenerate extends Component
{

    public $password;
    public $visible = false;

    /* public function mount()
    {
        $this->visible = false;
    } */

    public function render()
    {
        return view('livewire.password-generate');
    }

    public function generatePassword() : void
    {
        $lowercase = range('a', 'z');
        $uppercase = range('A', 'Z');
        $digits = range(0,9);
        $special = ['!', '#', '@', '%', '*', '$'];
        $chars = array_merge($lowercase, $uppercase, $digits, $special);
        $length = env('PASSWORD_LENGTH', 8);

        do {
            $password = array();

            for ($i=0; $i < $length; $i++) {
                $int = rand(0, count($chars) - 1);
                array_push($password, $chars[$int]);
            }
        } while (empty(array_intersect($special, $password)));

        $this->setPasswords(implode('', $password));
    }

    /* public function togglePassword()
    {
        $this->visible = !$this->visible;
    } */

    public function setPasswords($value)
    {
        $this->password = $value;
        // $this->password_confirmation = $value;
    }
}
