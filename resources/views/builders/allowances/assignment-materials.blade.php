<x-main>
    @include('layouts.sidebar-panel.sp-construction')

    @section('content')
        @if (session('status') === 'materials-action')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2200)">
            <div x-init="$notification({ text: 'Datos guardados correctamente!', variant: 'success', position: 'right-top', duration: 2200 })"></div>
            </p>
        @endif

        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Asignar Materiales') }}</h2>
                <x-separate-vertical></x-separate-vertical>
                <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                    <x-link :href="route('construction.assignments')">{{ __('Asiganciones de obra') }}</x-link>
                    <li>{{ __('Asignaciones de materiales de construcción por obra') }}</li>
                </ul>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-1">
                <div class="card p-5">
                    <h2 class="font-bold text-sm+ uppercase">Detalles de la obra</h2>
                    <div>
                        <p class="text-sm font-medium italic opacity-50">{{ __('Nombre de la Obra') }}</p>
                        <p>{{ $construction->work->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium italic opacity-50">{{ __('Dirección donde se desarrollará la obra (municipio / dpto.)') }}</p>
                        <p><i class="fa-solid fa-map-location-dot"></i> {{ $construction->work->city->name .' / '. $construction->work->city->state->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium italic opacity-50">{{ __('Fecha de Inicio') }}</p>
                        <p><i class="fa-solid fa-calendar-check"></i> {{ $construction->work->start_date->format('d-m-Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium italic opacity-50">{{ __('Descripción de la obra') }}</p>
                        <p>{{ $construction->work->description }}</p>
                    </div>
                    <div class="my-3 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div>
                        <p class="text-sm font-medium italic opacity-50 mb-1">{{ __('Servicios a desarrollar') }}</p>
                        @forelse ($construction->work->services as $service)
                            <p><i class="fa-solid fa-check"></i> {{ $service->name }}</p>
                        @empty
                        <div class="flex justify-center items-center gap-3">
                            <p class="mt-2 italic font-bold text-sm+"><i class="fa-solid fa-inbox"></i> Sin servicios designados aún...</p>
                        </div>
                        @endforelse
                    </div>
                    <div class="my-3 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div>
                        <p class="text-sm font-medium italic opacity-50">{{ __('Materiales utilizados') }}</p>
                        @forelse ($construction->materials as $material)
                            <p><i class="fa-solid fa-check"></i> {{ $material->name }}</p>
                        @empty
                        <div class="flex justify-center items-center gap-3">
                            <p class="mt-2 italic font-bold text-sm+"><i class="fa-solid fa-inbox"></i> Sin materiales designados aún...</p>
                        </div>
                        @endforelse
                    </div>
                </div>
                <div>
                    <div class="card p-5">
                        <form action="{{ route('construction.materials.update', $construction->id) }}" method="post">
                            @method('put')
                            @csrf
                            <label class="block">
                                <span class="text-sm+ font-bold">Seleccione los materiales para esta obra</span>
                                <select
                                x-init="$el._tom = new Tom($el,{plugins: ['caret_position','input_autogrow','remove_button']})"
                                class="mt-1.5 w-full"
                                multiple
                                placeholder="Seleccione los materiales..."
                                autocomplete="off"
                                name="materials[]"
                                >
                                    <option value="" disabled>Seleccione los materiales...</option>
                                    @foreach ($materials as $material)
                                        <option value="{{ $material->id }}"
                                            {{ in_array($material->id, $constructionHasMaterial) ? 'selected' : '' }}
                                        >{{ $material->name }}</option>
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

