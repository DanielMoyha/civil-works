<div>
    @if (session('status') === 'type-created')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
        <div x-init="$notification({ text: 'Datos guardados exitosamente!', variant: 'success', position: 'right-top', duration: 2200 })"></div>
        </p>
    @endif
    @if (session('status') === 'cannot-deleted')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3500)">
        <div x-init="$notification({ text: 'Este estudio extra pertenece a uno o varios estudios, no se puede eliminar!', variant: 'warning', position: 'right-top', duration: 3500 })"></div>
        </p>
    @endif
    @if (session('status') === 'study_type-deleted')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2200)">
        <div x-init="$notification({ text: 'Estudio Extra eliminado exitosamente!', variant: 'success', position: 'right-top', duration: 2200 })"></div>
        </p>
    @endif

    @if ($updateMode)
        @include('studies.type_studies.edit')
    @else
        @include('studies.type_studies.create')
    @endif


    <div class="flex items-center justify-between mt-10">
        <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
            {{ __('Lista de estudios extra') }}
        </h2>
        <div class="flex">
            <div class="flex items-center" x-data="{isInputActive:false}">
                <label class="block">
                    <input
                        x-effect="isInputActive === true && $nextTick(() => { $el.focus()});"
                        :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'"
                        class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200"
                        placeholder="Buscar aquí..."
                        type="search"
                        wire:model='search'
                    />
                </label>
                <button
                    @click="isInputActive = !isInputActive"
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4.5 w-4.5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="card mt-1 shadow-xl">
        <div class="is-scrollbar-show min-w-full overflow-x-auto  rounded-lg">
            <table class="is-hoverable w-full text-left">
                <thead>
                    <tr>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center">
                            {{ __('N°') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            {{ __('Nombre del estudio') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center">
                            {{ __('Descripción') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center">
                            {{ __('Acciones') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allTypes as $type)
                        <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500" wire:loading.class='opacity-40'>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $type->name }}</td>
                            <td class="text-center"> {{ $type->description }}</td>
                            <td class="flex justify-center items-center gap-2 py-2">
                                <button wire:click="edit({{ $type->id }})" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90 h-8 w-1"><i
                                        class="fa-solid fa-pen-to-square fa-lg"></i></button>
                                <button wire:click="$emit('showAlert', {{ $type->id }})" class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90 h-8 w-1"><i
                                        class="fa-solid fa-trash fa-lg"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="flex justify-center items-center space-x-2">
                                    <span class="h-8 w-8 text-cool-gray-400 text-3xl"><i class="fa-solid fa-inbox"></i></span>
                                    <span class="font-medium py-8 text-cool-gray-400 text-xl">{{ __('Tipos de Estudios no encontrados...') }}</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="">
                {!! $allTypes->links() !!}
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> --}}
    <script>
        // alert('g');
        Livewire.on('showAlert', typeStudyId => {
            Swal.fire({
                title: '¿Eliminar Estudio Extra?',
                text: "El material se eliminará de forma permanente.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Eliminar el rol
                    Livewire.emit('deleteTypeStudy', typeStudyId);

                    /* Swal.fire(
                        'Se eliminó el Servicio',
                        'Eliminado Correctamente',
                        'success'
                    ) */
                }
            })
        });
    </script>
@endpush