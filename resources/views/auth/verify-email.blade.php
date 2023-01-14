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
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Antes de continuar, es necesario que confirmes tu cuenta, revisa la bandeja de entrada de tu correo electrónico y presiona el botón de verificación.') }}
                </div>
                @if (session('status') == 'verification-link-sent')
                    <div class="my-2 font-medium text-xs text-success">
                        {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó cuando se le registró en el sistema.') }}
                    </div>
                @endif

                <div class="space-y-4">
                    <div class="flex justify-center space-x-2 pt-4">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <button
                                class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                            >
                                {{ __('Reenviar correo de verificación') }}
                            </button>
                        </form>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                            >
                                {{ __('Cerrar Sesión') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
