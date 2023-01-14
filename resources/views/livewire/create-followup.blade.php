<!--wire:submit.prevent='crearVacante', esto debemos crearlo también en el componente "CrearVacante.php"-->
<form class="md:w-1/2 space-y-5" wire:submit.prevent="createFollowUp">
    <!--El csrf, livewire ya lo tiene por defecto asi que no es necesario colocarlo-->
    <input wire:model="supervision_id" type="hidden" value="{{ $supervision->id }}" name="supervision_id" >


    <div>
        <x-label for="description" :value="__('Descripción')" />

        <x-input
            id="description"
            class="block mt-1 w-full"
            type="text"
            wire:model="description"
            :value="old('description')"
            placeholder="Título Vacante"
        />

        @error('description')
            <!-- los dos puntos (:) es como decirle que va a ser un valor dinámico, -->
            {{-- <livewire:mostrar-alerta :message="$message" /> --}}
            <!--para pasar el mensaje de error dinámicamente y como pasamos esa variable también debemos registrarlo en el componente (MostrarAlerta.php)-->
        @enderror
    </div>

    <div>
        <x-label for="date" :value="__('Fecha de publicación')" />

        <x-input
            wire:model="date"
            id="date"
            class="block mt-1 w-full"
            type="date"
            :value="old('date')"
        />

        @error('date')
            {{-- <livewire:mostrar-alerta :message="$message" /> --}}
        @enderror
    </div>

    <!-- Imagen -->
    <div>
        <x-label for="image" :value="__('Imagen')" />

        <div class="my-5 w-80">
            <!--como tenemos el wiremodel="image" esa variable también va estar disponible en la vista-->
            <!--temporaryUrl() es para tener una previsualización de la image antes de subirla al servidor-->
            {{-- @if($image)
                image:
                <img src="{{ $image->temporaryUrl() }}">
            @endif --}}
        </div>
        <x-input
            id="image"
            class="block mt-1 w-full"
            type="file"
            wire:model="image"
            accept="image/*"
        />

        

        @error('image')
            {{-- <livewire:mostrar-alerta :message="$message" /> --}}
        @enderror
    </div>

    <x-button>
        Guardar
    </x-button>
</form>
