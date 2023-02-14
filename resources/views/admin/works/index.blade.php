@push('styles')
    
@endpush
<x-main class="is-sidebar-open">
    @section('sidebar-panel')
        @include('layouts.sidebar-panel.sp-works')
    @endsection

    @section('content')
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Trabajos - Obras') }}</h2>
                <div
                    x-data="usePopper({placement:'bottom-start',offset:4})"
                    @click.outside="if(isShowPopper) isShowPopper = false"
                    class="inline-flex">
                    <button
                        x-ref="popperRef"
                        @click="isShowPopper = !isShowPopper"
                        class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                    >
                        <i class="fas fa-chevron-down"></i>
                    </button>

                    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                        <div
                            class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700"
                        >
                            <ul>
                                <li>
                                    <a
                                        href="{{ route('admin.works.create') }}"
                                        class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="mt-px h-4.5 w-4.5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span>{{ __(' Nueva Obra') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('admin.works.download.excel') }}" method="post" target="_blank">
                                        @csrf
                                        <button
                                            class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="mt-px h-4.5 w-4.5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
                                                />
                                            </svg>
                                            <span>{{ __('Exportar Obras') }}</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <x-separate-vertical></x-separate-vertical>
                <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                    <x-link :href="route('admin.works.index')">{{ __('Obras') }}</x-link>
                    <li>{{ __('Lista de Obras') }}</li>
                </ul>
            </div>

            <livewire:works />

            {{-- <div>
                @foreach ($works as $work)
                    <p>Nombre del trabajo: {{ $work->name }}</p>
                    <p>SERVICIOS:</p>
                    @foreach ($work->works as $work)
                        <li>{{ $work->name }}</li>
                    @endforeach
                    <p>CONSULTORES ASOCIADOS:</p>
                    @foreach ($work->associate_consultants as $associate_consultant)
                        <li>{{ $associate_consultant->name }} => {{ $associate_consultant->pivot->percentage_participation }}%</li>
                    @endforeach
                @endforeach
            </div> --}}
            @if (session('status') === 'work-created')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                >
                <div x-init="$notification({text:'Datos guardados exitosamente!',variant:'success',position:'right-top',duration:2200})"></div>
                </p>
            @endif
            @if (session('status') === 'work-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                >
                <div x-init="$notification({text:'Datos actualizados exitosamente!',variant:'success',position:'right-top',duration:2200})"></div>
                </p>
            @endif
        </main>

    @endsection
</x-main>

