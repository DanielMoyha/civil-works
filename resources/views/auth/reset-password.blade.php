<x-guest-layout>
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="grid place-items-center">
            <div class="card mt-20 w-100 max-w-xl p-4 sm:p-5">
                <div class="relative mx-auto -mt-20 h-40 w-72 transition-transform hover:scale-110 lg:h-28 lg:w-80">
                    {{-- <div class="h-full w-full rounded-lg"></div> --}}
                    <div class="flex justify-center">
                        <a href="{{ route('login') }}">
                            <img src="{{ asset('assets/images/logos/logo-eyserges.svg') }}" class="h-28 w-28 rounded-lg" alt="logo" />
                        </a>
                    </div>
                    <p class="text-xl text-center font-semibold text-primary dark:text-accent-light">EYSERGES</p>
                </div>
                <div class="my-4 text-sm text-gray-600">
                    {{ __('Ingresa tu nueva contraseña por favor.') }}
                </div>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="space-y-4">
                        <label class="block">
                            <span>Correo Electrónico</span>
                            <input
                                class="form-input mt-1.5 w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Escribe tu Correo Electrónico"
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email', $request->email) }}"
                                required
                                readonly
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </label>

                        <label class="block">
                            <span>{{ __('Nueva Contraseña') }}</span>
                            <input
                                class="form-input mt-1.5 w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Escribe tu nueva contraseña"
                                type="password"
                                id="password"
                                name="password"
                                required
                            />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </label>

                        <label class="block">
                            <span>{{ __('Confirmar Contraseña') }}</span>
                            <input
                                class="form-input mt-1.5 w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Confirma tu nueva contraseña"
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                required
                            />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </label>


                        <div class="flex justify-center space-x-2 pt-4">
                            <a href="{{ route('login') }}"
                                class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                            >
                                {{ __('Volver') }}
                            </a>
                            <button
                                class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                            >
                                {{ __('Cambiar Contraseña') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-guest-layout>
