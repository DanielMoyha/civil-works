<x-main>
    @include('layouts.sidebar-panel.sp-supervision')

    @section('content')
        @if (session('status') === 'type-studies-action')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2200)">
            <div x-init="$notification({ text: 'Datos guardados correctamente!', variant: 'success', position: 'right-top', duration: 2200 })"></div>
            </p>
        @endif

    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Estudios Extras') }}</h2>
            <x-separate-vertical></x-separate-vertical>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <x-link :href="route('study.assignments')">{{ __('Asiganciones de obra') }}</x-link>
                <li>{{ __('Definición de nuevos estudios extras') }}</li>
            </ul>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-1">
            <div class="card p-5">
                <div class="flex justify-between items-center gap-4">
                    <h2 class="font-bold text-sm+ uppercase">Detalles de la obra</h2>

                    <div>
                        <a href="{{ route('study.studies.upload.documents', [$study->id]) }}"
                            class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90"
                        >
                        <i class="fa-regular fa-folder-open mr-2"></i> Subir Documentos
                        </a>
                        <a href="{{ route('study.assignments') }}"
                            class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90"
                        >
                            Volver
                        </a>
                    </div>
                </div>
                <div>
                    <p class="text-sm font-medium italic opacity-50">{{ __('Nombre de la Obra') }}</p>
                    <p>{{ $study->work->name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium italic opacity-50">{{ __('Dirección donde se desarrollará la obra (municipio / dpto.)') }}</p>
                    <p><i class="fa-solid fa-map-location-dot"></i> {{ $study->work->city->name .' / '. $study->work->city->state->name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium italic opacity-50">{{ __('Fecha de Inicio') }}</p>
                    <p><i class="fa-solid fa-calendar-check"></i> {{ $study->work->start_date->format('d-m-Y') }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium italic opacity-50">{{ __('Descripción de la obra') }}</p>
                    <p>{{ $study->work->description }}</p>
                </div>
                <div class="my-3 h-px bg-slate-200 dark:bg-navy-500"></div>
                <div>
                    <p class="text-sm font-medium italic opacity-50 mb-1">{{ __('Servicios a desarrollar') }}</p>
                    @forelse ($study->work->services as $service)
                        <p><i class="fa-solid fa-check"></i> {{ $service->name }}</p>
                    @empty
                    <div class="flex justify-center items-center gap-3">
                        <p class="mt-2 italic font-bold text-sm+"><i class="fa-solid fa-inbox"></i> Sin servicios designados aún...</p>
                    </div>
                    @endforelse
                </div>
                <div class="my-3 h-px bg-slate-200 dark:bg-navy-500"></div>
                <div>
                    <p class="text-sm font-medium italic opacity-50">{{ __('Estudios Extra') }}</p>
                    @forelse ($study->types as $type)
                        <p><i class="fa-solid fa-check"></i> {{ $type->name }}</p>
                    @empty
                    <div class="flex justify-center items-center gap-3">
                        <p class="mt-2 italic font-bold text-sm+"><i class="fa-solid fa-inbox"></i> Este estudio no tiene otros estudios extras...</p>
                    </div>
                    @endforelse
                </div>
            </div>
            <div>
                <div class="card p-5">
                    <form action="{{ route('study.assignments.update', $study->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label class="block">
                            <span class="font-medium text-slate-600 dark:text-navy-100">{{ __('Tipos de Estudio Extra') }}</span>
                            <select x-init="$el._x_tom = new Tom($el)" name="types[]" class="mt-1.5 w-full" multiple placeholder="Elija los tipos extras..." autocomplete="off">
                                <option value="">{{ __('Elija los estudios extra...') }}</option>
                                @foreach ($types as $typeStudie)
                                    <option value="{{ $typeStudie->id }}" {{ in_array($typeStudie->id, $studyHasTypeStudies) ? 'selected' : '' }} {{ (collect(old('types'))->contains($typeStudie->id)) ? 'selected':'' }}>{{ $typeStudie->name }}</option>
                                @endforeach
                            </select>
                        </label>
                        <button class="btn bg-success font-medium text-white hover:bg-success-focus hover:shadow-lg hover:shadow-success/50 focus:bg-success-focus focus:shadow-lg focus:shadow-success/50 active:bg-success-focus/90 mt-4">
                            {{ __('Guardar') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    @endsection
</x-main>