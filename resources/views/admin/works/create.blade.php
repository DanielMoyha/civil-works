<x-main class="">
    @section('sidebar-panel')
        @include('layouts.sidebar-panel.sp-works')
    @endsection

    @section('content')
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Trabajos - Obras') }}</h2>
                <x-separate-vertical></x-separate-vertical>
                <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                    <x-link :href="route('admin.works.index')">{{ __('Obras') }}</x-link>
                    <li>{{ __('Nueva Obra') }}</li>
                </ul>
            </div>


            <form action="{{ route('admin.works.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
                    <div class="col-span-12 lg:col-span-8">
                        <div class="card">
                            <div class="tabs flex flex-col">
                                <div class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
                                    <h2 class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100 space-x-2 dark:text-primary">
                                        <span><i class="fa-solid fa-layer-group text-base"></i></span>
                                        <span> {{ __('Registrar Nueva Obra') }}</span>
                                    </h2>
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('admin.works.index') }}"
                                            class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                                        >{{ __('Cancelar') }}</a>
                                        <button
                                            type="submit"
                                            class="btn min-w-[7rem] rounded-full bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                        >
                                            {{ __('Registrar') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="tab-content p-4 sm:p-5">
                                    <div class="space-y-5">
                                        <label class="block">
                                            <span class="font-medium text-slate-600 dark:text-navy-100">Nombre del Trabajo</span>
                                            <input
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Escriba el nombre del trabajo"
                                                type="text"
                                                name="name"
                                                value="{{ old('name') }}"
                                            />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </label>
                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                            <label class="block">
                                                <span class="font-medium text-slate-600 dark:text-navy-100">{{ __('Seleccione el tipo de trabajo') }}</span>
                                                <select
                                                    class="mt-1.5 w-full"
                                                    x-init="$el._x_tom = new Tom($el,pages.tomSelect)"
                                                    placeholder="Seleccione el tipo..."
                                                    name="type_work_id"
                                                >
                                                <option value>{{ __('Seleccione el tipo de trabajo') }}</option>
                                                @foreach ($type_works as $type_work)
                                                    <option value="{{ $type_work->id }}" {{ old('type_work_id') == $type_work->id ?  'selected' : '' }}>{{ $type_work->name }}</option>
                                                @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('type_work_id')" class="mt-2" />
                                            </label>
                                            <label class="block">
                                                <span class="font-medium text-slate-600 dark:text-navy-100">{{ __('Seleccionar Encargado') }}</span>
                                                <select
                                                    class="mt-1.5 w-full "
                                                    {{-- x-init="$el._x_tom = new Tom($el,pages.tomSelect)" --}}
                                                    x-init="$el._x_tom = new Tom($el,{sortField: {field: 'text',direction: 'asc'}})"
                                                    placeholder="Seleccione un Encargado..."
                                                    name="user_id"
                                                >
                                                    <option value>Seleccione un Encargado</option>
                                                    @foreach ($users as $user)
                                                        @if ($user->roles->first()->name ?? null)
                                                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ?  'selected' : '' }}>
                                                                <span>{{ $user->roles->first()->name ?? null }} - {{ $user->name }}</span>
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                                            </label>
                                            <label class="block">
                                                <span class="font-medium text-slate-600 dark:text-navy-100">Nombre del Contratante</span>
                                                <input
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Escriba el nombre de la entidad contratante"
                                                type="text"
                                                name="name_contractor"
                                                value="{{ old('name_contractor') }}"
                                                />
                                                <x-input-error :messages="$errors->get('name_contractor')" class="mt-2" />
                                            </label>
                                            <label class="block">
                                                <span class="font-medium text-slate-600 dark:text-navy-100">Dirección del Contratante</span>
                                                <input
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Escriba el dirección de la entidad contratante"
                                                type="text"
                                                name="address_contractor"
                                                value="{{ old('address_contractor') }}"
                                                />
                                                <x-input-error :messages="$errors->get('address_contractor')" class="mt-2" />
                                            </label>
                                        </div>
                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                            <label class="block">
                                                <span class="font-medium text-slate-600 dark:text-navy-100">Duración del Trabajo (meses)</span>
                                                <input
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Escriba la cantidad de meses"
                                                type="number"
                                                name="work_duration"
                                                value="{{ old('work_duration') }}"
                                                />
                                                <x-input-error :messages="$errors->get('work_duration')" class="mt-2" />
                                            </label>
                                            <label class="block">
                                                <span class="font-medium text-slate-600 dark:text-navy-100">Valor aproximado de los servicios en Bs.</span>
                                                <input
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Escriba el dirección de la entidad contratante"
                                                type="text"
                                                name="value_approximate_services"
                                                value="{{ old('value_approximate_services') }}"
                                                />
                                                <x-input-error :messages="$errors->get('value_approximate_services')" class="mt-2" />
                                            </label>
                                            <label>
                                                <span class="font-medium text-slate-600 dark:text-navy-100">Fecha de Inicio</span>
                                                <span class="relative mt-1.5 flex">
                                                    <input
                                                        x-init="$el._x_flatpickr = flatpickr($el)"
                                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                        placeholder="Seleccione una fecha..."
                                                        type="date"
                                                        name="start_date"
                                                        value="{{ old('start_date') }}"
                                                    />
                                                    <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 transition-colors duration-200"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke="currentColor"
                                                            stroke-width="1.5"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                            />
                                                        </svg>
                                                    </span>
                                                </span>
                                                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                                            </label>
                                            <label>
                                                <span class="font-medium text-slate-600 dark:text-navy-100">Fecha de Conclusión (aprox.)</span>
                                                <span class="relative mt-1.5 flex">
                                                    <input
                                                        x-init="$el._x_flatpickr = flatpickr($el, {minDate: 'today'})"
                                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                        placeholder="Seleccione una fecha..."
                                                        type="date"
                                                        name="completion_date"
                                                        value="{{ old('completion_date') }}"
                                                    />
                                                    <span
                                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 transition-colors duration-200"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke="currentColor"
                                                            stroke-width="1.5"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                            />
                                                        </svg>
                                                    </span>
                                                </span>
                                                <x-input-error :messages="$errors->get('completion_date')" class="mt-2" />
                                            </label>
                                        </div>
                                        <div>
                                            <span class="font-medium text-slate-600 dark:text-navy-100">Descripción del Proyecto</span>
                                            <div class="mt-1.5 w-full">
                                                <textarea
                                                    rows="4"
                                                    name="description"
                                                    placeholder="Describa el proyecto..."
                                                    class="form-textarea w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                    >{{ old('description') }}</textarea>
                                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-4">
                        <div class="card space-y-5 p-4 sm:p-5">
                            
                            <label class="block">
                                @livewire('country-state-city')
                            </label>
                            
                            <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100">{{ __('Consultores Asociados') }}</span>
                                <select x-init="$el._x_tom = new Tom($el)" name="associate_consultants[]"  class="mt-1.5 w-full" multiple placeholder="Seleccione un Asociado..." autocomplete="off">
                                    <option value="">{{ __('Seleccione un Asociado...') }}</option>
                                    @foreach ($associate_consultants as $associate_consultant)
                                        <option value="{{ $associate_consultant->id }}" {{ (collect(old('associate_consultants'))->contains($associate_consultant->id)) ? 'selected':'' }}>{{ $associate_consultant->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <x-input-error :messages="$errors->get('associate_consultants')" class="mt-2" /> --}}
                            </label>
                            <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100">{{ __('Servicios') }}</span>
                                <select x-init="$el._x_tom = new Tom($el)" name="services[]" class="mt-1.5 w-full" multiple placeholder="Elija los Servicios..." autocomplete="off">
                                    <option value="">{{ __('Elija los servicios...') }}</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}" {{ (collect(old('services'))->contains($service->id)) ? 'selected':'' }}>{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('services[]')" class="mt-2" />
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    @endsection
</x-main>

