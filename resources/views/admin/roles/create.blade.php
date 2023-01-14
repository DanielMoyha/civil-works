@push('styles')
    {{-- @livewireStyles --}}
@endpush
<x-main class="is-sidebar-open">
    @section('sidebar-panel')
        @include('layouts.sidebar-panel.sp-users')
    @endsection

    @section('content')
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                {{-- <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">Crear un Nuevo Rol</h2> --}}
            </div>

            <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
                <div class="col-span-12 grid lg:col-span-8">
                    <div class="card">
                        <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                            <div class="flex items-center space-x-2">
                                <div
                                    class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                                    <i class="fa-solid fa-layer-group"></i>
                                </div>
                                <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">Crear un Nuevo Rol</h4>
                            </div>
                        </div>
                        <form action="{{ route('admin.roles.store') }}" method="POST">
                            @csrf
                            <div class="space-y-4 p-4 sm:p-5">
                                <label class="block">
                                    <span>Nombre</span>
    
                                    <input
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Ingrese el nombre del Rol" type="text" name="name" id="name"/>
                                    @error('name')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </label>
                                <label class="block">
                                    <span>Descripción</span>
    
                                    <input
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Describa brevemente el rol" type="text" name="description" id="description"/>
                                    @error('description')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </label>
                                <label class="block mt-4">
                                    <span>Seleccione los permisos correspondiente a este rol</span>
                                    <div class="mt-5 grid grid-cols-2 place-items-start gap-6 sm:grid-cols-3">
                                        @foreach ($permissions as $permission)
                                            <label class="inline-flex items-center space-x-2">
                                                <input
                                                    class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                                    type="radio"
                                                    name="permissions[]"
                                                    value="{{ $permission->id }}"
                                                    id="{{ $permission->id }}"
                                                />
                                                <p>{{ $permission->description }}</p>
                                            </label>
                                        @endforeach
                                    </div>
                                </label>

                                <div class="mt-6 grid w-full grid-cols-2 gap-2">
                                    <button class="btn bg-success font-medium text-white hover:bg-success-focus hover:shadow-lg hover:shadow-success/50 focus:bg-success-focus focus:shadow-lg focus:shadow-success/50 active:bg-success-focus/90">
                                        Guardar
                                    </button>
                                    <a href="{{ route('admin.roles.index') }}"
                                        class="btn bg-error font-medium text-white hover:bg-error-focus hover:shadow-lg hover:shadow-error/50 focus:bg-error-focus focus:shadow-lg focus:shadow-error/50 active:bg-error-focus/90">
                                        Volver
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>
    @endsection

    @push('scripts')
        {{-- @livewireScripts --}}
        {{-- @powerGridScripts --}}
    @endpush
</x-main>
