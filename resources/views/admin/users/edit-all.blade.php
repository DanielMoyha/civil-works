@push('styles')
    @livewireStyles
@endpush
<x-main class="is-sidebar-open">
    @section('sidebar-panel')
        @include('layouts.sidebar-panel.sp-users')
    @endsection

    @section('content')
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            {{-- <div class="my-20">
                PRUEBAS
                @foreach ($users as $user)
                    <ul>
                        <li>{{ $user->name }} => {{ $user->city->name ?? 'Sin ciudad' }}</li>
                    </ul>
                @endforeach
            </div> --}}
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Modificar Usuario') }}</h2>
                <x-separate-vertical></x-separate-vertical>
                <ul class="flex flex-wrap items-center space-x-2">
                    <x-link :href="route('admin.users.index')">{{ __('Usuarios') }}</x-link>
                    <li>{{ __('Cambiar Datos Usuario') }}</li>
                </ul>
            </div>

            <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
                <div class="col-span-12 grid lg:col-span-10">
                    <div class="card">
                        <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                            <div class="flex items-center space-x-2">
                                <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                                    <i class="fa-solid fa-layer-group"></i>
                                </div>
                                <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">{{ __('Modificar Datos del Usuario') }}</h4>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mx-4 mt-3 flex justify-between">
                                <div>
                                    <span>Rol Actual:</span>
                                    <span class="font-medium italic tracking-wide text-slate-700 dark:text-navy-100 lg:text-base">
                                        @if ($user->roles->first())
                                            {{ $user->roles->first()->name }}
                                        @else
                                        <span class="tag rounded-full text-sm font-bold border border-warning/30 bg-warning/10 text-warning hover:bg-warning/20 focus:bg-warning/20 active:bg-warning/25">Este usuario no tiene un rol asignado</span>
                                        @endif
                                    </span>
                                    <a href="{{ route('admin.users.editRole', [$user->id]) }}"
                                        class="btn h-9 w-9 rounded-full border border-success/30 bg-success/10 p-0 font-medium text-success hover:bg-success/20 hover:shadow-lg hover:shadow-success/50 focus:bg-success/20 focus:shadow-lg focus:shadow-success/50 active:bg-success/25"
                                    ><i class="fa-solid fa-edit"></i></a>
                                </div>
                                <div class="mx-5">
                                    <label class="inline-flex items-center space-x-2">
                                        <input type="hidden" name="is_active" value="0">
                                        <p>Activo</p>
                                        <input
                                          class="form-checkbox is-basic h-5 w-5 rounded-full border-slate-400/70 checked:bg-success checked:!border-success hover:!border-success focus:!border-success dark:border-navy-400"
                                          type="checkbox"
                                          name="is_active"
                                          value="1" {{ $user->is_active || old('is_active', 0) === 1 ? 'checked' : '' }}
                                        />
                                        
                                    </label>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2">
                                <label class="block">
                                    <span>{{ __('Nombre Completo') }}</span>
                    
                                    <input id="name" name="name"
                                        class="form-input peer w-full mt-1.5 rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Escriba el nombre completo" type="text" value="{{ old('name', $user->name) }}" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </label>
                                <label class="block">
                                    <span>Nombre de Usuario</span>
                    
                                    <input id="username" name="username"
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Escriba el nombre de Usuario" type="text" value="{{ old('username', $user->username) }}" />
                                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                </label>
                                <label class="block">
                                    <span>Correo Electrónico</span>
                    
                                    <input id="email" name="email"
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Escriba el correo electrónico" type="email" value="{{ old('email', $user->email) }}" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </label>
                                <label class="block">
                                    <span>Teléfono</span>
                    
                                    <input id="phone" name="phone"
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Digite el teléfono" type="number" value="{{ old('phone', $user->phone) }}" />
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </label>
                                <label class="block">
                                    <span>Dirección</span>
                    
                                    <input id="address" name="address"
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Describa la dirección de calle" type="text" value="{{ old('address', $user->address) }}" />
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </label>
                                <label class="block">
                                    @livewire('country-state-city', ['selectedCity' => $user->city_id])
                                    {{-- @livewire('country-state-city') --}}
                                </label>
                                {{-- <label class="block">
                                <span class="block">Contraseña</span>
                                <div class="flex items-center justify-between space-x-2">
                                <input
                                    id="password"
                                    name="password"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Escriba la contraseña"
                                    type="password"
                                    value="{{ old('password') }}"
                                />
                                <button
                                    class="btn space-x-2 rounded-full bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                >
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                    />
                                    </svg>
                                    <span>Generar</span>
                                </button>
                                </div>
                            </label> --}}
                                {{-- <label class="block">
                                <span></span>
                                <div class="inline-flex items-center space-x-2">
                                    <input
                                    id="is_active"
                                    name="is_active"
                                    class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:bg-success checked:!border-success hover:!border-success focus:!border-success dark:border-navy-400"
                                    type="checkbox"
                                    />
                                    <p>Activo</p>
                                </div>
                            </label> --}}
                            </div>
                            <div class="mt-6 grid w-full md:w-80 grid-cols-2 p-4 gap-4">
                                <button
                                    class="btn bg-success font-medium text-white hover:bg-success-focus hover:shadow-lg hover:shadow-success/50 focus:bg-success-focus focus:shadow-lg focus:shadow-success/50 active:bg-success-focus/90">
                                    Guardar
                                </button>
                    
                                {{-- <x-primary-button>Guardar</x-primary-button> --}}
                    
                                <a href="{{ route('admin.users.index') }}"
                                    class="btn bg-error font-medium text-white hover:bg-error-focus hover:shadow-lg hover:shadow-error/50 focus:bg-error-focus focus:shadow-lg focus:shadow-error/50 active:bg-error-focus/90">
                                    Volver
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </main>
    @endsection

    @push('scripts')
        
    @endpush
</x-main>
