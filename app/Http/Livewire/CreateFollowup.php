<?php

namespace App\Http\Livewire;

use App\Models\Follow_up;
use App\Models\Supervision;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateFollowup extends Component
{
    public $supervision_id;
    public $description;
    public $date;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'supervision_id' => 'required',
        'description' => 'required|string',
        'date' => 'required',
        'image' => 'required|image|max:1024',
    ];

    public function mount($supervision_id)
    {
        $supervision_id = Supervision::find($this->supervision_id);
    }

    public function createFollowUp()
    {
        $data = $this->validate();

        // Almacenar la imagen
        // this->, hace referencia a todos los publics (propiedades y métodos) que tenemos en esta instancia
        $imagen = $this->image->store('public/follow-up');//store() lo va a colocar en alguna ruta (store es de livewire)
        $data['image'] = str_replace('public/follow-up/', '', $imagen);
        // $nombre_imagen = str_replace('public/vacantes/', '', $imagen);
        //dd($nombre_imagen);

        // Crear la vacante
        Follow_up::create([
            'supervision_id' => $data['supervision_id'],
            'description' => $data['description'],
            'date' => $data['date'],
            'image' => $data['image'],
        ]);

        // Crear un mensaje
        // session()->flash('status', 'La vacante se publicó correctamente!');

        // Redireccionar al usuario
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.create-followup', [
            'supervision' => Supervision::find($this->supervision_id)
        ]);
    }
}
