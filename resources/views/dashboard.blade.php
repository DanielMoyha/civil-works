@push('styles')
    <style>
    progress::-webkit-progress-value {
        /* background: #5F5AF6; */
        background: #0EA5E9;
    }
    .highcharts-figure {
        min-width: 310px;
        max-width: 800px;
        /* margin: 1em auto; */
    }
    </style>
@endpush
<x-main>
    @section('sidebar-panel')
        <div class="sidebar-panel">
            <div class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750">
                <!-- Sidebar Panel Header -->
                <div class="flex h-18 w-full items-center justify-between pl-4 pr-1">
                    <p class="text-base tracking-wider text-slate-800 dark:text-navy-100">
                        Dashboards
                    </p>
                    <button @click="$store.global.isSidebarExpanded = false"
                        class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                </div>

                <!-- Sidebar Panel Body -->
                <div x-data="{ expandedItem: null }" class="h-[calc(100%-4.5rem)] overflow-x-hidden pb-6"
                    x-init="$el._x_simplebar = new SimpleBar($el);">
                    <ul class="flex flex-1 flex-col px-4 font-inter">
                        <li>
                            <a x-data="navLink" href="{{ route('dashboard') }}"
                                :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                    'text-slate-500 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50'"
                                class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                                Panel de Control - Principal
                            </a>
                        </li>
                        <li>
                            <a x-data="navLink" href="{{ route('dashboard.works') }}"
                                :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                    'text-slate-500 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50'"
                                class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                                Panel de Control - Obras
                            </a>
                        </li>
                    </ul>
                    <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        <main class="main-content w-full  pb-8">
            @if(auth()->user()->can('all.managerial'))
                @php \Carbon\Carbon::setlocale(config('app.locale')); @endphp

                {{-- <h1>DASHBOARD ADMIN</h1> --}}
                {{-- @foreach ($users as $user)
                    <span>{{ $user->name }} -> {{ $user->getRoleNames()->first() ?? 'Sin Rol' }}</span>
                    <span>{{ $user->name }} -> {{ $user->roles->first()->id ?? '' }}</span>
                @endforeach --}}
                <div class="mt-4 grid grid-cols-12 gap-4 px-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
                    <div class="col-span-12 lg:col-span-8">
                        <figure class="highcharts-figure">
                            <div id="containerUsers" class="rounded-md"></div>
                        </figure>
                        {{-- <div class="card shadow-lg w-full">
                        </div> --}}
                        {{-- <div class="flex flex-col sm:flex-row sm:space-x-7">
                            <div class="w-auto">
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-span-12 lg:col-span-4">
                        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-5 lg:grid-cols-2">
                            <a href="{{ route('admin.users.index') }}" class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                                <div class="flex justify-between space-x-1">
                                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">{{ $allUsers->count() }}</p>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-error"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                        />
                                    </svg>
                                </div>
                                <p class="mt-1 text-xs+">Total de Usuarios</p>
                            </a>
                            <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                                <div class="flex justify-between">
                                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">{{ $roleConstruction->count() }}</p>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-5 h-5 text-secondary">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" 
                                        />
                                    </svg>
                                </div>
                                <p class="mt-1 text-xs+">Área Construcción</p>
                            </div>
                            <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                                <div class="flex justify-between">
                                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">{{ $roleStudy->count() }}</p>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-5 h-5 text-warning">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z"
                                        />
                                    </svg>
                                </div>
                                <p class="mt-1 text-xs+">Área Estudios</p>
                            </div>
                            <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                                <div class="flex justify-between">
                                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">{{ $roleSupervision->count() }}</p>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-info"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"
                                        />
                                    </svg>
                                </div>
                                <p class="mt-1 text-xs+">Área Supervisión</p>
                            </div>
                            <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                                <div class="flex justify-between space-x-1">
                                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">{{ $usersActive->count() }}</p>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-success"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
                                        />
                                    </svg>
                                </div>
                                <p class="mt-1 text-xs+">Usuarios Activos</p>
                            </div>
                            <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                                <div class="flex justify-between">
                                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">{{ $usersInactive->count() }}</p>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-5 w-5 text-error"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                </div>
                                <p class="mt-1 text-xs+">Usuarios Inactivos</p>
                            </div>
                            {{-- <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                                <div class="flex justify-between">
                                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">{{ $usersInactive->count() }}</p>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-5 w-5 text-error"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                </div>
                                <p class="mt-1 text-xs+">Roles Actuales</p>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card col-span-12 lg:col-span-8">
                        <div class="flex items-center justify-between py-3 px-4">
                            <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">{{ __('Estado de las Obras') }}</h2>
                            <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                <span class="font-bold text-lg">{{ \App\Models\Work::all()->count() }}</span>
                                {{ __(' Obras en Total') }}
                            </h2>
                            {{-- <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="if(isShowPopper)  isShowPopper = false" class="inline-flex">
                                <button
                                    x-ref="popperRef"
                                    @click="isShowPopper = !isShowPopper"
                                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                                        />
                                    </svg>
                                </button>

                                <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                    <div
                                        class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700"
                                    >
                                        <ul>
                                            <li>
                                                <a
                                                    href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                    >Action</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                    href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                    >Another Action</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                    href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                    >Something else</a
                                                >
                                            </li>
                                        </ul>
                                        <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                        <ul>
                                            <li>
                                                <a
                                                    href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                    >Separated Link</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="grid grid-cols-1 gap-y-4 pb-3 sm:grid-cols-3">
                            <div class="flex flex-col justify-between border-4 border-transparent border-l-info px-4">
                                <div>
                                    <p class="text-base font-medium text-slate-600 dark:text-navy-100">{{ __('Supervisión') }}</p>
                                    <p class="text-xs text-slate-400 dark:text-navy-300">{{ __('Obras de supervisión') }}</p>
                                    <a href="{{ route('admin.supervision.index') }}" class="badge mt-2 bg-info/10 text-info dark:bg-info/15">
                                        {{ __('Ver más') }}
                                    </a>
                                </div>
                                <div>
                                    <div class="mt-8">
                                        <p class="font-inter">
                                            <span class="text-2xl font-medium text-slate-600 dark:text-navy-100">
                                                {{ __('Total: ').$supervisions->count() }}
                                            </span>
                                        </p>
                                        <p class="mt-1 pb-3 text-xs">
                                            {{ __('Último registro: ') }}
                                            @if ($lastSupervision)
                                                <span>{{ $lastSupervision->created_at->translatedFormat('j F, Y') }}</span>
                                            @else
                                                <span class=" text-xs">---</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="mt-8 flex items-center justify-between space-x-1">
                                        <p class="text-xs">{{ __('Últimas asignaciones:') }}</p>
                                        <div class="flex -space-x-3">
                                            @forelse ($usersSupervision as $supervision)
                                                @php
                                                    $words = explode(' ', $supervision->user->name, 2);
                                                    $acronym = '';
                                                    foreach ($words as $w) {
                                                        $acronym .= mb_substr($w, 0, 1);
                                                    }
                                                @endphp
                                                <div class="avatar h-8 w-8 hover:z-10">
                                                    <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700" x-tooltip.placement.bottom="'{{ $supervision->user->name }}'">
                                                        {{ $acronym }}
                                                    </div>
                                                </div>
                                            @empty
                                                <p>---</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col justify-between border-4 border-transparent border-l-secondary px-4">
                                <div>
                                    <p class="text-base font-medium text-slate-600 dark:text-navy-100">{{ __('Construcción') }}</p>
                                    <p class="text-xs text-slate-400 dark:text-navy-300">{{ __('Obras de construcción') }}</p>
                                    <a href="{{ route('admin.construction.index') }}" class="badge mt-2 bg-secondary/10 text-secondary dark:bg-secondary-light/15 dark:text-secondary-light">
                                        {{ __('Ver más') }}
                                    </a>
                                </div>
                                <div>
                                    <div class="mt-8">
                                        <p class="font-inter">
                                            <span class="text-2xl font-medium text-slate-600 dark:text-navy-100">
                                                {{ __('Total: ').$constructions->count() }}
                                            </span>
                                        </p>
                                        <p class="mt-1 pb-3 text-xs">
                                            {{ __('Último registro: ') }}
                                            @if ($lastConstruction)
                                                <span>{{ $lastConstruction->created_at->translatedFormat('j F, Y') }}</span>
                                            @else
                                                <span class=" text-xs">---</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="mt-8 flex items-center justify-between space-x-1">
                                        <p class="text-xs">{{ __('Últimas asignaciones:') }}</p>
                                        <div class="flex -space-x-3">
                                            @forelse ($usersConstruction as $constrution)
                                                @php
                                                    $words = explode(' ', $constrution->user->name, 2);
                                                    $acronym = '';
                                                    foreach ($words as $w) {
                                                        $acronym .= mb_substr($w, 0, 1);
                                                    }
                                                @endphp
                                                <div class="avatar h-8 w-8 hover:z-10">
                                                    <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700" x-tooltip.placement.bottom="'{{ $constrution->user->name }}'">
                                                        {{ $acronym }}
                                                    </div>
                                                </div>
                                            @empty
                                                <p>---</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col justify-between border-4 border-transparent border-l-warning px-4">
                                <div>
                                    <p class="text-base font-medium text-slate-600 dark:text-navy-100">{{ __('Estudios') }}</p>
                                    <p class="text-xs text-slate-400 dark:text-navy-300">{{ __('Estudios a obras') }}</p>
                                    <div class="mt-2 flex space-x-1.5">
                                        <a href="{{ route('admin.study.index') }}" class="badge bg-warning/10 text-warning dark:bg-warning/15">
                                            {{ __('Ver más') }}
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <div class="mt-8">
                                        <p class="font-inter">
                                            <span class="text-2xl font-medium text-slate-600 dark:text-navy-100">
                                                {{ __('Total: ').$studies->count() }}
                                            </span>
                                        </p>
                                        <p class="mt-1 pb-3 text-xs">
                                            {{ __('Último registro: ') }}
                                            @if ($lastStudy)
                                                <span>{{ $lastStudy->created_at->translatedFormat('j F, Y') }}</span>
                                            @else
                                                <span class=" text-xs">---</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="mt-8 flex items-center justify-between space-x-1">
                                        <p class="text-xs">{{ __('Últimas asignaciones:') }}</p>
                                        <div class="flex -space-x-3">
                                            @forelse ($usersStudy as $study)
                                                @php
                                                    $words = explode(' ', $study->user->name, 2);
                                                    $acronym = '';
                                                    foreach ($words as $w) {
                                                        $acronym .= mb_substr($w, 0, 1);
                                                    }
                                                @endphp
                                                <div class="avatar h-8 w-8 hover:z-10">
                                                    <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700" x-tooltip.placement.bottom="'{{ $study->user->name }}'">
                                                        {{ $acronym }}
                                                    </div>
                                                </div>
                                            @empty
                                            <p>---</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-4">
                        <div class="flex items-center justify-between">
                            <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">{{ __('Obras realizadas por departamento') }}</h2>
                        </div>
                        {{-- <div class="mt-3">
                            <p>
                                <span class="text-3xl text-slate-700 dark:text-navy-100">{{ \App\Models\Work::all()->count() }}</span>
                            </p>
                            <p class="text-xs+">Obras en total</p>
                        </div> --}}
                        <div class="mt-4 flex flex-col space-y-2">
                            @foreach ($worksForDepartaments as $departament)
                                <div>
                                    <div class="flex justify-between">
                                        <p class="text-xs+">{{ $departament->name }}</p>
                                        <p class="text-xs+">{{ $departament->cities->count() }} / {{ \App\Models\Work::all()->count() }}</p>
                                    </div>
                                    <div>
                                        <progress class="progress w-full rounded-full h-2 bg-slate-500 dark:bg-navy-400" max="{{ \App\Models\Work::all()->count() }}" value="{{ $departament->cities->count() }}"></progress>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @push('scripts')
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    {{-- <script src="https://code.highcharts.com/modules/series-label.js"></script> --}}
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                    <script>
                        var users = {{ Js::from($users) }};
                        let year = new Date().getFullYear();
                        console.log(users)
                        // var users = <?php echo json_encode($users)?>;
                        Highcharts.chart('containerUsers', {
                            chart: {
                                type: 'areaspline',
                                styledMode: false,
                                events: {
                                    load() {
                                        const chart = this;
                                        chart.showLoading('<i class="fa fa-spinner fa-spin px-2"></i>Cargando Gráfica');
                                        setTimeout(function() {
                                        chart.hideLoading();
                                        }, 1500);
                                    }
                                    }
                            },
                            lang: {
                                viewFullscreen: "Ver en pantalla completa",
                                printChart: "Imprimir Gráfico",
                                downloadPNG: "Descargar en PNG",
                                downloadJPEG: "Descargar en JPEG",
                                downloadPDF: "Descargar en PDF",
                                downloadSVG: "Descargar en SVG",
                                downloadCSV: "Descarga CSV",
                                downloadXLS: "Descargar en Excel",
                                viewData: "Ver en Tabla",
                            },
                            credits: {
                                enabled: true,
                                text: "EYSERGES S.R.L.",
                                href: "#"
                            },
                            exporting: {
                                csv: {
                                    columnHeaderFormatter: function(item, key) {
                                        if (!item || item instanceof Highcharts.Axis) {
                                            return 'Meses'
                                        } else {
                                            return item.name;
                                        }
                                    }
                                },
                                buttons: {
                                    contextButton: {
                                        menuItems:
                                        [
                                            // {
                                            //     textKey: 'printChart',
                                            //     onclick: function () {
                                            //         this.print();
                                            //     }
                                            // }, {
                                            // separator: true
                                            // },
                                            {
                                                textKey: 'downloadPNG',
                                                onclick: function () {
                                                    this.exportChart();
                                                }
                                            }, {
                                                textKey: 'downloadJPEG',
                                                onclick: function () {
                                                    this.exportChart({
                                                        type: 'image/jpeg'
                                                    });
                                                }
                                            }, {
                                                separator: true
                                            },
                                            {
                                                textKey: 'downloadPDF',
                                                onclick: function () {
                                                    this.exportChart({
                                                        type: 'application/pdf'
                                                    });
                                                }
                                            }, {
                                                textKey: 'downloadXLS',
                                                onclick: function () {
                                                    this.downloadXLS();
                                                }
                                            }
                                        ]
                                    }
                                }
                            },
                            title: {
                                text: `Usuarios Registrados Mensualmente de la gestión ${year}`
                            },
                            subtitle: {
                                text: 'Fuente: Estudios y Servicios de Gestión'
                            },
                            yAxis: {
                                title: {
                                    text: '{{ __("Número de Usuarios") }}'
                                }
                            },
                            xAxis: {
                                categories: [
                                    'Enero', 'Febrero', 'Marzo',
                                    'Abril', 'Mayo', 'Junio',
                                    'Julio', 'Agosto', 'Septiembre',
                                    'Octubre', 'Noviembre', 'Diciembre'
                                ]
                            },
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom',
                                enabled: true,
                                floating: false,
            
                                // layout: 'vertical',
                                // align: 'left',
                                // verticalAlign: 'top',
                                // enabled: true,
                                // x: 60,
                                // y: 65,
                                // floating: false,
                            },
                            plotOptions: {
                                series: {
                                    //label: {
                                        //connectorAllowed: false
                                    //},
                                    //pointStart: 2010*/
                                    allowPointSelect: true,
                                }
                            },
                            series: [
                                {
                                    name: 'Usuarios', // se desactiva con enabled: false, de legend
                                    data: users,
                                    color: '#0EA5E9'
                                },
                            ],
                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }
                        });
                    </script>
                @endpush
            @endif
            @if(auth()->user()->can('all.construction'))
                <div class="mt-4 grid grid-cols-12 gap-4 px-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
                    <div class="col-span-12 lg:col-span-9">
                        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Panel de Control - Construcción') }}</h2>
                    </div>

                    <div class="col-span-12 lg:col-span-12">
                        <figure class="highcharts-figure">
                            <div id="assignmentsConstruction"></div>
                            <p class="highcharts-description">
                                Gráfico de columnas básico donde muestra la cantidad de asignaciones que usted tuvo durante toda la gestión del {{ now()->year }}, tomando como métrica el progreso de su trabajo durante cada mes de acuerdo al rol que corresponde.
                                Los meses que no tiene representación gráfica pueden significar que ese mes usted no recibió asignaciones o que aún falta llegar a dicho mes del año.
                            </p>
                        </figure>
                    </div>
                </div>
                @push('scripts')
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    {{-- <script src="https://code.highcharts.com/modules/series-label.js"></script> --}}
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                    <script>
                        var worksAssignmentsConstruction = {{ Js::from($worksAssignmentsConstruction) }};
                        let year = new Date().getFullYear();
                        console.log(worksAssignmentsConstruction);
                        Highcharts.chart('assignmentsConstruction', {
                            chart: {
                                type: 'column',
                                styledMode: false,
                                events: {
                                    load() {
                                        const chart = this;
                                        chart.showLoading('<i class="fa fa-spinner fa-spin px-2"></i>Cargando Gráfica');
                                        setTimeout(function() {
                                        chart.hideLoading();
                                        }, 1500);
                                    }
                                }
                            },
                            lang: {
                                viewFullscreen: "Ver en pantalla completa",
                                printChart: "Imprimir Gráfico",
                                downloadPNG: "Descargar en PNG",
                                downloadJPEG: "Descargar en JPEG",
                                downloadPDF: "Descargar en PDF",
                                downloadSVG: "Descargar en SVG",
                                downloadCSV: "Descarga CSV",
                                downloadXLS: "Descargar en Excel",
                                viewData: "Ver en Tabla",
                            },
                            credits: {
                                enabled: true,
                                text: "EYSERGES S.R.L.",
                                href: "#"
                            },
                            exporting: {
                                csv: {
                                    columnHeaderFormatter: function(item, key) {
                                        if (!item || item instanceof Highcharts.Axis) {
                                            return 'Meses'
                                        } else {
                                            return item.name;
                                        }
                                    }
                                },
                                buttons: {
                                    contextButton: {
                                        menuItems:
                                        [
                                            // {
                                            //     textKey: 'printChart',
                                            //     onclick: function () {
                                            //         this.print();
                                            //     }
                                            // }, {
                                            // separator: true
                                            // },
                                            {
                                                textKey: 'downloadPNG',
                                                onclick: function () {
                                                    this.exportChart();
                                                }
                                            }, {
                                                textKey: 'downloadJPEG',
                                                onclick: function () {
                                                    this.exportChart({
                                                        type: 'image/jpeg'
                                                    });
                                                }
                                            }, {
                                                separator: true
                                            },
                                            {
                                                textKey: 'downloadPDF',
                                                onclick: function () {
                                                    this.exportChart({
                                                        type: 'application/pdf'
                                                    });
                                                }
                                            }, {
                                                textKey: 'downloadXLS',
                                                onclick: function () {
                                                    this.downloadXLS();
                                                }
                                            }
                                        ]
                                    }
                                }
                            },
                            title: {
                                text: `Mis Obras Designadas Mensualmente, ${year}`
                            },
                            subtitle: {
                                text: 'Fuente: EYSERGES S.R.L.'
                            },
                            xAxis: {
                                categories: [
                                        'Enero', 'Febrero', 'Marzo',
                                        'Abril', 'Mayo', 'Junio',
                                        'Julio', 'Agosto', 'Septiembre',
                                        'Octubre', 'Noviembre', 'Diciembre'
                                    ],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Número de Obras asignadas'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">Construcciones: </td>' +
                                    '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Obras de Construcción',
                                data: worksAssignmentsConstruction

                            }],
                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }
                        });
                    </script>
                @endpush
            @endif
            @if(auth()->user()->can('all.study'))
                <div class="mt-4 grid grid-cols-12 gap-4 px-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
                    <div class="col-span-12 lg:col-span-9">
                        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Panel de Control - Estudios') }}</h2>
                    </div>

                    <div class="col-span-12 lg:col-span-12">
                        <figure class="highcharts-figure">
                            <div id="assignmentsStudy"></div>
                            <p class="highcharts-description">
                                Gráfico de columnas básico donde muestra la cantidad de asignaciones que usted tuvo durante toda la gestión del {{ now()->year }}, tomando como métrica el progreso de su trabajo durante cada mes de acuerdo al rol que corresponde.
                                Los meses que no tiene representación gráfica pueden significar que ese mes usted no recibió asignaciones o que aún falta llegar a dicho mes del año.
                            </p>
                        </figure>
                    </div>
                </div>
                @push('scripts')
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    {{-- <script src="https://code.highcharts.com/modules/series-label.js"></script> --}}
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                    <script>
                        var worksAssignmentsStudy = {{ Js::from($worksAssignmentsStudy) }};
                        let year = new Date().getFullYear();
                        console.log(worksAssignmentsStudy);
                        Highcharts.chart('assignmentsStudy', {
                            chart: {
                                type: 'column',
                                styledMode: false,
                                events: {
                                    load() {
                                        const chart = this;
                                        chart.showLoading('<i class="fa fa-spinner fa-spin px-2"></i>Cargando Gráfica');
                                        setTimeout(function() {
                                        chart.hideLoading();
                                        }, 1500);
                                    }
                                }
                            },
                            lang: {
                                viewFullscreen: "Ver en pantalla completa",
                                printChart: "Imprimir Gráfico",
                                downloadPNG: "Descargar en PNG",
                                downloadJPEG: "Descargar en JPEG",
                                downloadPDF: "Descargar en PDF",
                                downloadSVG: "Descargar en SVG",
                                downloadCSV: "Descarga CSV",
                                downloadXLS: "Descargar en Excel",
                                viewData: "Ver en Tabla",
                            },
                            credits: {
                                enabled: true,
                                text: "EYSERGES S.R.L.",
                                href: "#"
                            },
                            exporting: {
                                csv: {
                                    columnHeaderFormatter: function(item, key) {
                                        if (!item || item instanceof Highcharts.Axis) {
                                            return 'Meses'
                                        } else {
                                            return item.name;
                                        }
                                    }
                                },
                                buttons: {
                                    contextButton: {
                                        menuItems:
                                        [
                                            // {
                                            //     textKey: 'printChart',
                                            //     onclick: function () {
                                            //         this.print();
                                            //     }
                                            // }, {
                                            // separator: true
                                            // },
                                            {
                                                textKey: 'downloadPNG',
                                                onclick: function () {
                                                    this.exportChart();
                                                }
                                            }, {
                                                textKey: 'downloadJPEG',
                                                onclick: function () {
                                                    this.exportChart({
                                                        type: 'image/jpeg'
                                                    });
                                                }
                                            }, {
                                                separator: true
                                            },
                                            {
                                                textKey: 'downloadPDF',
                                                onclick: function () {
                                                    this.exportChart({
                                                        type: 'application/pdf'
                                                    });
                                                }
                                            }, {
                                                textKey: 'downloadXLS',
                                                onclick: function () {
                                                    this.downloadXLS();
                                                }
                                            }
                                        ]
                                    }
                                }
                            },
                            title: {
                                text: `Mis Obras Designadas Mensualmente, ${year}`
                            },
                            subtitle: {
                                text: 'Fuente: EYSERGES S.R.L.'
                            },
                            xAxis: {
                                categories: [
                                        'Enero', 'Febrero', 'Marzo',
                                        'Abril', 'Mayo', 'Junio',
                                        'Julio', 'Agosto', 'Septiembre',
                                        'Octubre', 'Noviembre', 'Diciembre'
                                    ],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Número de Obras asignadas'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">Estudios: </td>' +
                                    '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Estudios de Obra',
                                data: worksAssignmentsStudy

                            }],
                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }
                        });
                    </script>
                @endpush
            @endif
            @if(auth()->user()->can('all.supervision'))
                <div class="mt-4 grid grid-cols-12 gap-4 px-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
                    <div class="col-span-12 lg:col-span-9">
                        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Panel de Control - Supervisión') }}</h2>
                    </div>

                    <div class="col-span-12 lg:col-span-12">
                        <figure class="highcharts-figure">
                            <div id="assignmentsSupervision"></div>
                            <p class="highcharts-description">
                                Gráfico de columnas básico donde muestra la cantidad de asignaciones que usted tuvo durante toda la gestión del {{ now()->year }}, tomando como métrica el progreso de su trabajo durante cada mes de acuerdo al rol que corresponde.
                                Los meses que no tiene representación gráfica pueden significar que ese mes usted no recibió asignaciones o que aún falta llegar a dicho mes del año.
                            </p>
                        </figure>
                    </div>
                </div>
                @push('scripts')
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    {{-- <script src="https://code.highcharts.com/modules/series-label.js"></script> --}}
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                    <script>
                        var worksAssignmentsSupervision = {{ Js::from($worksAssignmentsSupervision) }};
                        let year = new Date().getFullYear();
                        console.log(worksAssignmentsSupervision);
                        Highcharts.chart('assignmentsSupervision', {
                            chart: {
                                type: 'column',
                                styledMode: false,
                                events: {
                                    load() {
                                        const chart = this;
                                        chart.showLoading('<i class="fa fa-spinner fa-spin px-2"></i>Cargando Gráfica');
                                        setTimeout(function() {
                                        chart.hideLoading();
                                        }, 1500);
                                    }
                                    }
                            },
                            lang: {
                                viewFullscreen: "Ver en pantalla completa",
                                printChart: "Imprimir Gráfico",
                                downloadPNG: "Descargar en PNG",
                                downloadJPEG: "Descargar en JPEG",
                                downloadPDF: "Descargar en PDF",
                                downloadSVG: "Descargar en SVG",
                                downloadCSV: "Descarga CSV",
                                downloadXLS: "Descargar en Excel",
                                viewData: "Ver en Tabla",
                            },
                            credits: {
                                enabled: true,
                                text: "EYSERGES S.R.L.",
                                href: "#"
                            },
                            exporting: {
                                csv: {
                                    columnHeaderFormatter: function(item, key) {
                                        if (!item || item instanceof Highcharts.Axis) {
                                            return 'Meses'
                                        } else {
                                            return item.name;
                                        }
                                    }
                                },
                                buttons: {
                                    contextButton: {
                                        menuItems:
                                        [
                                            // {
                                            //     textKey: 'printChart',
                                            //     onclick: function () {
                                            //         this.print();
                                            //     }
                                            // }, {
                                            // separator: true
                                            // },
                                            {
                                                textKey: 'downloadPNG',
                                                onclick: function () {
                                                    this.exportChart();
                                                }
                                            }, {
                                                textKey: 'downloadJPEG',
                                                onclick: function () {
                                                    this.exportChart({
                                                        type: 'image/jpeg'
                                                    });
                                                }
                                            }, {
                                                separator: true
                                            },
                                            {
                                                textKey: 'downloadPDF',
                                                onclick: function () {
                                                    this.exportChart({
                                                        type: 'application/pdf'
                                                    });
                                                }
                                            }, {
                                                textKey: 'downloadXLS',
                                                onclick: function () {
                                                    this.downloadXLS();
                                                }
                                            }
                                        ]
                                    }
                                }
                            },
                            title: {
                                text: `Mis Obras Designadas Mensualmente, ${year}`
                            },
                            subtitle: {
                                text: 'Fuente: EYSERGES S.R.L.'
                            },
                            xAxis: {
                                categories: [
                                        'Enero', 'Febrero', 'Marzo',
                                        'Abril', 'Mayo', 'Junio',
                                        'Julio', 'Agosto', 'Septiembre',
                                        'Octubre', 'Noviembre', 'Diciembre'
                                    ],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Número de Obras asignadas'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">Supervisiones: </td>' +
                                    '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Supervisión de Obras',
                                data: worksAssignmentsSupervision

                            }],
                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }
                        });
                    </script>
                @endpush
            @endif
        </main>
    @endsection
</x-main>