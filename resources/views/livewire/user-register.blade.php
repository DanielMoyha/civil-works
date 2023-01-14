<div>
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
    <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2">
        <label class="block">
            <span>{{ __('Nombre Completo') }}</span>

            <input
                id="name"
                name="name"
                class="form-input peer w-full mt-1.5 rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                placeholder="Escriba el nombre completo"
                type="text"
                value="{{ old('name') }}"
                wire:model='name'
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </label>
        <label class="block">
            <span>Nombre de Usuario</span>

            <input
                id="username"
                name="username"
                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                placeholder="Escriba el nombre de Usuario"
                type="text"
                value="{{ old('username') }}"
                wire:model='username'
            />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </label>
        <label class="block">
            <span>Correo Electrónico</span>

            <input
                id="email"
                name="email"
                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                placeholder="Escriba el correo electrónico"
                type="email"
                value="{{ old('email') }}"
                wire:model='email'
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </label>
        <label class="block">
            <span>Teléfono</span>

            <input
                id="phone"
                name="phone"
                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                placeholder="Digite el teléfono"
                type="number"
                value="{{ old('phone') }}"
                wire:model='phone'
            />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </label>
        <label class="block">
            <span>Dirección</span>

            <input
                id="address"
                name="address"
                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                placeholder="Describa la dirección de calle"
                type="text"
                value="{{ old('address') }}"
                wire:model='address'
            />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </label>
        <label class="block">
            {{-- @livewire('country-state-city', ['selectedCity' => 30000]) --}}
            @livewire('country-state-city')
        </label>
        @livewire('password-generate')
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
        <button class="btn bg-success font-medium text-white hover:bg-success-focus hover:shadow-lg hover:shadow-success/50 focus:bg-success-focus focus:shadow-lg focus:shadow-success/50 active:bg-success-focus/90">
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
