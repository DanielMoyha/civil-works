<x-main>
    @include('layouts.sidebar-panel.sp-supervision')

    @section('content')


    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Detalles de Obra') }}</h2>
            <x-separate-vertical></x-separate-vertical>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <x-link :href="route('study.assignments')">{{ __('Asiganciones de obra') }}</x-link>
                <li>{{ __('Ver detalles de la obra designada') }}</li>
            </ul>
        </div>


        <div class="grid grid-cols-1">
            <div class="card px-5 py-8 sm:px-18">
                <div class="flex justify-end gap-3">
                    <a href="{{ route('supervision.assignments.tasks', [$supervision->id]) }}" class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90"><i class="fa-solid fa-list-check mr-2"></i> Registrar Tareas</a>
                    <a href="{{ route('supervision.assignments.follow-ups', [$supervision->id]) }}" class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90"><i class="fa-solid fa-images mr-2"></i>Realizar Seguimiento</a>
                    <a href="{{ route('supervision.assignments') }}" class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-success-focus/90"><i class="fa-solid fa-caret-left mr-2"></i>Volver</a>
                </div>
                <div class="my-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                <div class="flex flex-col justify-between sm:flex-row">
                    <div class="text-center sm:text-left w-10/12">
                        <h2 class="text-xl font-semibold uppercase text-primary dark:text-accent-light">
                            {{ $supervision->work->name }}
                        </h2>
                        <div class="space-y-1 pt-2">
                            <p><span class="font-bold">{{ __('Duración del Trabajo: ') }}</span> {{ $supervision->work->work_duration . __(' Meses') }}</p>
                            <p><span class="font-bold">{{ __('Fecha de Inicio: ') }}</span> {{ $supervision->work->start_date->format('d-m-Y') }}</p>
                            <p><span class="font-bold">{{ __('Fecha de Conclusión: ') }}</span> {{ $supervision->work->completion_date->format('d-m-Y') }}</p>
                        </div>
                    </div>
                    <div class="mt-4 text-center sm:m-0 sm:text-right w-auto">
                        <h2 class="text-sm+ font-semibold uppercase text-primary dark:text-accent-light">
                            {{ $supervision->work->city->name .' / '. $supervision->work->city->state->name }}
                        </h2>
                    </div>
                </div>
                <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                <div class="flex flex-col justify-between sm:flex-row">
                    <div class="text-center sm:text-left">
                        <p class="text-lg font-medium text-slate-600 dark:text-navy-100">{{ __('Descripción del Trabajo') }}</p>
                        <div class="space-y-1 pt-2">
                            <p>{{ $supervision->work->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-8 mt-1">
                    <div>
                        <p class="font-bold text-lg">Lista de Servicios:</p>
                        <div class="flex flex-wrap gap-3">
                            @forelse ($supervision->work->services as $service)
                                <div class="space-x-2.5 text-slate-600 dark:text-navy-100">
                                    <a class="tag rounded-full bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                        {{ $service->name }}
                                    </a>
                                </div>
                            @empty
                                <p class="font-bold text-sm+ italic opacity-40 flex justify-center items-center">Esta obra no tiene servicios registrados...</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
            </div>
        </div>
    </main>

    @endsection
</x-main>