<x-main>
    @include('layouts.sidebar-panel.sp-study')

    @section('content')


    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Asignaciones') }}</h2>
            <x-separate-vertical></x-separate-vertical>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <x-link :href="route('study.assignments')">{{ __('Asiganciones de obra') }}</x-link>
                <li>{{ __('Lista de asignaciones de estudios de obra') }}</li>
            </ul>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-1 sm:gap-5 lg:grid-cols-2 lg:gap-6">
            @foreach ($works as $work)
                <div class="max-w-xl">
                    <div class="mt-5 flex flex-col space-y-4 sm:space-y-5 lg:space-y-6">
                        <div x-data="{expandedItem:null}" class="flex flex-col space-y-4 sm:space-y-5 lg:space-y-6">
                            <div x-data="accordionItem('item-1')" class="overflow-hidden rounded-lg border border-slate-150 dark:border-navy-500">
                                <div class="flex items-center justify-between bg-slate-150 px-4 py-4 dark:bg-navy-500 sm:px-5">
                                    <div class="flex items-center space-x-3.5 tracking-wide outline-none transition-all">
                                        <div class="avatar h-10 w-10" x-tooltip.on.mouseenter="'{{ $work->city->state->name.' -> '.$work->city->name }}'">
                                            <div class="is-initial rounded-full bg-success uppercase text-white">
                                                {{ $work->city->state->code }}
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-300 italic dark:text-navy-500">
                                                {{ $work->updated_at->diffForHumans() }}
                                                </p>
                                            <p class="text-slate-700 line-clamp-1 dark:text-navy-100">
                                            {{ $work->name }}
                                            </p>
                                            <p class="text-xs text-slate-500 line-clamp-1 dark:text-navy-300">
                                            {{ $work->description }}
                                            </p>
                                            
                                        </div>
                                    </div>
                                    <button
                                        @click="expanded = !expanded"
                                        class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                    >
                                        <i
                                            :class="expanded && '-rotate-180'"
                                            class="fas fa-chevron-down text-sm transition-transform"
                                        ></i>
                                    </button>
                                </div>
                                <div x-collapse x-show="expanded">
                                    <div class="px-4 py-4 sm:px-5">
                                        <p class="text-slate-900 dark:text-navy-200 font-bold pb-2">{{ $work->services->count() }} SERVICIOS:</p>
                                        <p>
                                            @foreach ($work->services as $service)
                                                <div class="space-x-2.5 line-clamp-1 text-slate-600 dark:text-navy-100">
                                                    <i class="fas fa-check fa-sm"></i>
                                                    <span>{{ $service->name }}</span>
                                                </div>
                                            @endforeach
                                        </p>
                                        <div class="mt-4 flex justify-end gap-2">
                                            {{-- <div class="flex flex-wrap -space-x-2">
                                                <div class="avatar h-7 w-7 hover:z-10">
                                                    <img
                                                    class="rounded-full ring ring-white dark:ring-navy-700"
                                                    src="images/avatar/avatar-16.jpg"
                                                    alt="avatar"
                                                    />
                                                </div>

                                                <div class="avatar h-7 w-7 hover:z-10">
                                                    <div
                                                    class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700"
                                                    >
                                                    jd
                                                    </div>
                                                </div>

                                                <div class="avatar h-7 w-7 hover:z-10">
                                                    <img
                                                    class="rounded-full ring ring-white dark:ring-navy-700"
                                                    src="images/avatar/avatar-20.jpg"
                                                    alt="avatar"
                                                    />
                                                </div>

                                                <div class="avatar h-7 w-7 hover:z-10">
                                                    <img
                                                    class="rounded-full ring ring-white dark:ring-navy-700"
                                                    src="images/avatar/avatar-8.jpg"
                                                    alt="avatar"
                                                    />
                                                </div>

                                                <div class="avatar h-7 w-7 hover:z-10">
                                                    <img
                                                    class="rounded-full ring ring-white dark:ring-navy-700"
                                                    src="images/avatar/avatar-5.jpg"
                                                    alt="avatar"
                                                    />
                                                </div>
                                            </div> --}}
                                            {{-- <a href="{{ route('construction.assignments.show', $work->id) }}"
                                            class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 rotate-45"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                >
                                                    <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M7 11l5-5m0 0l5 5m-5-5v12"
                                                    />
                                                </svg>
                                            </a> --}}
                                            <a href="{{ route('study.assignments.show', [$work->study->id]) }}"
                                                class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90"
                                            >
                                                Ver Detalles
                                            </a>
                                            {{-- <a href="#"
                                                class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90"
                                            >
                                                Registrar Materiales
                                            </a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    @endsection
</x-main>

