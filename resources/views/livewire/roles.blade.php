@push('styles')
{{-- <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet"> --}}
<style>
    .swal2-icon{
  width: 55px !important;
  height: 55px !important;
}
</style>
@endpush
<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6">
    @forelse ($roles as $role)
        <div class="max-w-xl">
            <div class="mt-5 flex flex-col space-y-4 sm:space-y-5 lg:space-y-6">
                <div x-data="{expanded:false}" class="overflow-hidden rounded-lg border border-slate-150 dark:border-navy-500">
                    <div class="flex items-center justify-between bg-slate-150 px-4 py-4 dark:bg-navy-500 sm:px-5">
                        <div class="flex items-center space-x-3.5 tracking-wide outline-none transition-all">
                            <div>
                                <p class="text-slate-700 line-clamp-1 dark:text-navy-100">{{ $role->name }}</p>
                                <p class="text-xs text-slate-500 dark:text-navy-300">{{ $role->description }}</p>
                            </div>
                        </div>
                        <button
                            @click="expanded = !expanded"
                            class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                        >
                            <i :class="expanded && '-rotate-180'" class="fas fa-chevron-down text-sm transition-transform"></i>
                        </button>
                    </div>
                    <div x-collapse x-show="expanded">
                        <div class="px-4 py-4 sm:px-5">
                            <p>
                                <p class="pt-1 text-xs text-slate-400 dark:text-navy-300">
                                    Permisos Designados:
                                </p>
                                {{-- <div class="my-2 h-px bg-slate-200 dark:bg-navy-500"></div> --}}
                                <div class="flex gap-2 flex-wrap pt-2">
                                    @foreach ($role->permissions as $permission)
                                        <span
                                            class="tag rounded-full bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                        >
                                        {{-- <span class="tag rounded-full bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25"> --}}
                                            {{ $permission->description }}
                                        </span>
                                    @endforeach
                                </div>
                            </p>
                            <div class="my-2 h-px bg-slate-200 dark:bg-navy-500"></div>
                            <p class="pt-1 text-xs text-slate-400 dark:text-navy-300">
                                {{  $role->users->count() }} @choice('Usuario|Usuarios', $role->users->count()) {{ __('posee este rol') }}
                            </p>
                            <div class="mt-4 flex justify-between">
                                <div class="flex flex-wrap -space-x-2">
                                    @foreach ($role->users as $user)
                                    @php
                                        $words = explode(' ', $user->name, 2);
                                        $acronym = '';
                                        foreach ($words as $w) {
                                            $acronym .= mb_substr($w, 0, 1);
                                        }
                                    @endphp
                                        <div class="avatar h-7 w-7 hover:z-10">
                                            <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700"  x-tooltip.placement.bottom="'{{ $user->name }}'">
                                                {{ $acronym }}
                                                {{-- {{ $user->name }} --}}
                                            </div>
                                            {{--  <template id="showInfoUser">
                                                <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
                                                  <div>
                                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                                        {{ $user->name }}
                                                    </p>
                                                  </div>
                                                </div>
                                            </template> --}}
                                        </div>
                                    @endforeach
                                </div>
                                <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="if(isShowPopper) isShowPopper = false" class="static top-0 right-0 lg:static">
                                    <button
                                        x-ref="popperRef"
                                        @click="isShowPopper = !isShowPopper"
                                        class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 rotate-45"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7 11l5-5m0 0l5 5m-5-5v12"
                                        />
                                        </svg>
                                    </button>

                                    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                        <div
                                            class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700 px-2 flex content-center items-center"
                                        >
                                            <ul>
                                                <li>
                                                    <a
                                                        href="{{ route('admin.roles.edit', $role) }}"
                                                        class="h-7 w-7 px-1.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                    >
                                                        <i class="fa-solid fa-pen-to-square fa-xl"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                            <ul>
                                                <li>
                                                    {{-- <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="flex h-7 w-7 px-3.5 content-center items-center tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                        >
                                                            <i class="fa-solid fa-trash fa-xl"></i>
                                                        </button>
                                                    </form> --}}
                                                    {{-- <x-delete-button :action="route('admin.roles.destroy', $role)"></x-delete-button> --}}
                                                    <button
                                                    wire:click="$emit('showAlert', {{ $role->id }})"
                                                            class="h-7 w-7 px-1.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                        >
                                                            <i class="fa-solid fa-trash fa-xl"></i>
                                                        </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>Sin Roles registrado aún</p>
    @endforelse
</div>
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> --}}
    <script>
        // alert('g');
        Livewire.on('showAlert', RoleId => {
            Swal.fire({
                title: '¿Eliminar Rol?',
                text: "Al elimiar el rol, los usuarios pertenecientes a este rol quedarán sin un rol y perderán el acceso a sus áreas correspondientes.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Eliminar el rol
                    Livewire.emit('deleteRole', RoleId);

                    Swal.fire(
                        'Se eliminó el Rol',
                        'Eliminado Correctamente',
                        'success'
                    )
                }
            })
        });
    </script>
@endpush