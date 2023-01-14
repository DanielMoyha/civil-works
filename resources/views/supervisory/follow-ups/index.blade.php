<x-main>
    @include('layouts.sidebar-panel.sp-supervision')

    @section('content')
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Supervisión de Obra') }}</h2>
                <x-separate-vertical></x-separate-vertical>
                <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                    <x-link :href="route('supervision.assignments')">{{ __('Seguimientos de obra') }}</x-link>
                    <li>{{ __('Listado de los seguimientos de obras') }}</li>
                </ul>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6">
                @forelse ($followUps as $followUp)
                    <div class="card">
                        <img
                            class="h-72 w-full rounded-lg object-cover object-center"
                            src="{{ Storage::url('followUp/'.$followUp->image) }}"
                            alt="image"
                        />
                        <div class="absolute inset-0 flex h-full w-full flex-col justify-end">
                            <div
                                class="space-y-1.5 rounded-lg bg-gradient-to-t from-[#19213299] via-[#19213266] to-transparent px-4 pb-3 pt-12"
                            >
                                <div class="line-clamp-2">
                                    <a href="#" class="text-base font-medium text-white">
                                        {{ $followUp->description }}
                                    </a>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-xs text-slate-200">
                                        <p class="flex items-center space-x-1">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-3.5 w-3.5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"
                                                />
                                            </svg>
                                            <span class="line-clamp-1">{{ $followUp->created_at }}</span>
                                        </p>
                                        <div class="mx-3 my-0.5 w-px self-stretch bg-white/20"></div>
                                        <p class="shrink-0 text-tiny+">{{ $followUp->created_at->diffForHumans() }}</p>
                                    </div>
                                    {{-- <div class="-mr-1.5 flex">
                                        <button
                                            x-tooltip.secondary="'Like'"
                                            class="btn h-7 w-7 rounded-full p-0 text-secondary-light hover:bg-secondary/20 focus:bg-secondary/20 active:bg-secondary/25 dark:hover:bg-secondary-light/20 dark:focus:bg-secondary-light/20 dark:active:bg-secondary-light/25"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4.5 w-4.5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                                />
                                            </svg>
                                        </button>
                                        <button
                                            x-tooltip="'Save'"
                                            class="btn h-7 w-7 rounded-full p-0 text-navy-100 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4.5 w-4.5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
                                                />
                                            </svg>
                                        </button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="flex justify-center items-center">
                    <h2 class="text-sm+ font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 mt-2">
                        <i class="fa-solid fa-inbox"></i> {{ __('Aún no tiene realizado seguimientos...') }}
                    </h2>
                </div>
                @endforelse
            </div>
        </main>
    @endsection
</x-main>