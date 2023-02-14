<x-main>
    @include('layouts.sidebar-panel.sp-supervision')

    @section('content')
        @if (session('status') === 'followUp-created')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
            <div x-init="$notification({ text: 'Datos guardados exitosamente!', variant: 'success', position: 'right-top', duration: 2200 })"></div>
            </p>
        @endif
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
                                <div class="line-clamp-2">
                                    <a href="{{ route('supervision.assignments.show', [$followUp->supervision]) }}" class="text-xs lowercase font-medium italic opacity-75 text-white">
                                        {{ $followUp->supervision->name }}
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
                                                stroke-width="1.5"
                                                stroke="currentColor">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"
                                                />
                                            </svg>
                                            <span class="line-clamp-1">{{ $followUp->created_at->format('d-m-Y') }}</span>
                                        </p>
                                        <div class="mx-3 my-0.5 w-px self-stretch bg-white/20"></div>
                                        <p class="shrink-0 text-tiny+">{{ $followUp->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="-mr-1.5 flex">
                                        <form action="{{ route('supervision.destroy', [$followUp->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button
                                            x-tooltip.error="'Borrar'"
                                            onclick="return confirm('¿Está Seguro?')"
                                            class="btn h-7 w-7 rounded-full p-0 text-error hover:bg-secondary/20 focus:bg-secondary/20 active:bg-secondary/25 dark:hover:bg-secondary-light/20 dark:focus:bg-secondary-light/20 dark:active:bg-secondary-light/25"
                                        >
                                        <i class="fa-solid fa-trash-arrow-up"></i>
                                        </button>
                                        </form>
                                    </div>
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