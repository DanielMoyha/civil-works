@push('styles')
    <style>
        input[type=file]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #084cdf;
            padding: 7px 15px;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #4F46E5;
        }
    </style>
@endpush
<x-main>
    @include('layouts.sidebar-panel.sp-study')

    @section('content')

        @if (session('status') === 'upload-document')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2200)">
            <div x-init="$notification({ text: 'Documentos subidos correctamente!', variant: 'success', position: 'right-top', duration: 2200 })"></div>
            </p>
        @endif
        @if (session('status') === 'upload-document-error')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2200)">
            <div x-init="$notification({ text: 'Ocurrió un Error!', variant: 'error', position: 'right-top', duration: 2200 })"></div>
            </p>
        @endif
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Cargar Documentos') }}</h2>
                <x-separate-vertical></x-separate-vertical>
                <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                    <x-link :href="route('study.assignments')">{{ __('Documentos') }}</x-link>
                    <li>{{ __('Documentos de los estudios de obra') }}</li>
                </ul>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-1">

                <div class="card p-5">
                    <div class="flex justify-between items-center gap-4">
                        <h2 class="font-bold text-sm+ uppercase">Detalles de la obra</h2>

                        <div>
                            <a href="{{ route('study.assignments.show', [$study->id]) }}"
                                class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90"
                            >
                            <i class="fa-solid fa-circle-plus mr-2"></i> Estudios Adicionales
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
                        <form method="POST" action="{{ route('study.studies.upload.documents.store', [$study->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $study->id }}" name="study_id">
                            {{-- <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100">{{ __('Nombre') }}</span>
                                <input type="text" name="name">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </label> --}}
                            <label class="block">
                                <p class="font-medium text-slate-600 dark:text-navy-100">{{ __('Seleccione los documentos correspondientes ') }} <p class="text-sm italic opacity-50">{{ __('(csv, xls, pdf, docx) Max: 2MB') }}</p></p>
                                <input type="file" name="files[]" multiple accept=".doc,.docx,.pdf,.csv,.xls,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="mt-2">
                                <x-input-error :messages="$errors->get('files')" class="mt-2" />
                            </label>
                            <button class="btn bg-success font-medium text-white hover:bg-success-focus hover:shadow-lg hover:shadow-success/50 focus:bg-success-focus focus:shadow-lg focus:shadow-success/50 active:bg-success-focus/90 mt-4">
                                {{ __('Guardar') }}
                            </button>
                        </form>
                    </div>
                    <div class="card p-5 mt-10">
                        <h2 class="font-bold text-sm+ uppercase">{{ __('Documentos subidos para esta obra') }}</h2>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-4">
                            @forelse ($documents as $document)
                                <div>
                                    <a href="{{ asset('uploads') . '/' . $document->file }}" target="_blank">
                                        <img src="{{ asset('assets/images/icons/documentFile.png') }}" alt="" width="40" height="40">
                                        <span class="line-clamp-1">{{ $document->name }}</span>
                                    </a>
                                </div>
                                {{-- <iframe src="{{ asset('uploads') . '/' . $document->file }}" height="200" width="300"></iframe> --}}
                                {{-- <li>{{ $document->file }}</li> --}}
                            
                            @empty
                            <div class="flex justify-center items-center gap-3">
                                <p class="mt-2 italic font-bold text-sm+"><i class="fa-solid fa-inbox"></i> Este estudio aún no tiene documentos subidos</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div>
                
            </div>
        </main>

    @endsection
</x-main>

