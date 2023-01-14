<div>
    <div class="flex items-center justify-between mt-10">
        <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
            {{ __('Lista de obras civiles') }}
        </h2>
        <div class="flex">
            <div class="flex items-center" x-data="{isInputActive:false}">
                <label class="block">
                    <input
                        x-effect="isInputActive === true && $nextTick(() => { $el.focus()});"
                        :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'"
                        class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200"
                        placeholder="Buscar aquí..."
                        type="search"
                        wire:model='search'
                    />
                </label>
                <button
                    @click="isInputActive = !isInputActive"
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4.5 w-4.5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />
                    </svg>
                </button>
            </div>
            {{-- <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="if(isShowPopper) isShowPopper = false" class="inline-flex">
                <button
                    x-ref="popperRef"
                    @click="isShowPopper = !isShowPopper"
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4.5 w-4.5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                        />
                    </svg>
                </button>
                <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                    <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                        <ul>
                            <li>
                                <form action="{{ route('admin.works.download.excel') }}" method="post" target="_blank">
                                    @csrf
                                    <button
                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >{{ __('Exportar - Excel') }}</
                                    >
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="card mt-1 shadow-xl">
        <div class="is-scrollbar-show min-w-full overflow-x-auto  rounded-lg">
            <table class="is-hoverable w-full text-left">
                <thead>
                    <tr>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center">
                            {{ __('N°') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            {{ __('Nombre de la obra') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center"><i class="fa-solid fa-network-wired"></i>
                            {{ __('Tipo de Obra') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center"><i class="fa-solid fa-user-gear"></i>
                            {{ __('Encargado') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center"><i class="fa-solid fa-earth-americas"></i>
                            {{ __('Dpto. / Ciudad') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center"><i class="fa-solid fa-building"></i>
                            {{ __('Contratante') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center"><i class="fa-solid fa-business-time"></i>
                            {{ __('Duración de la obra') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center"><i class="fa-solid fa-calendar-day"></i>
                            {{ __('Fecha de Inicio') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center"><i class="fa-solid fa-calendar-check"></i>
                            {{ __('Fecha de conclusión') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center"><i class="fa-solid fa-filter"></i>
                            {{ __('Acciones') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($works as $work)
                        <tr class="@if($work->status === 0) bg-error/15 @endif border border-transparent border-b-slate-200 dark:border-b-navy-500" wire:loading.class='opacity-40'>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $work->name }}</td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $work->type_work->name }}</td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $work->user->name }}</td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $work->city->state->name .' / '. $work->city->name ?? '' }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5 text-center">{{ $work->name_contractor }}</td>
                            <td class="text-center">{{ $work->work_duration }} meses</td>
                            <td class="text-center">{{ $work->start_date->format('d-m-Y') }}</td>
                            <td class="text-center">{{ $work->completion_date->format('d-m-Y') }}</td>
                            <td class="flex justify-center items-center gap-2 py-2">
                                @if ($work->status === 0)
                                    <button wire:click="$emit('showAlertEnableWork', {{ $work->id }})" class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90 h-8 w-1">
                                        <i class="fa-solid fa-arrow-rotate-right"></i>
                                    </button>
                                @endif
                                @if ($work->status === 1)
                                    <a href="{{ route('admin.works.show', [$work->id]) }}" class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90 h-8 w-1">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.works.edit', [($work->id)]) }}" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90 h-8 w-1">
                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                    </a>
                                    <button wire:click="$emit('showAlert', {{ $work->id }})" class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90 h-8 w-1">
                                        <i class="fa-solid fa-ban"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">
                                <div class="flex justify-center items-center space-x-2">
                                    <span class="h-8 w-8 text-cool-gray-400 text-3xl"><i class="fa-solid fa-inbox"></i></span>
                                    <span class="font-medium py-8 text-cool-gray-400 text-xl">{{ __('Obras - Trabajos no encontrados...') }}</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div>{!! $works->links() !!}</div>
    </div>
</div>
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> --}}
    <script>
        // alert('g');
        Livewire.on('showAlert', WorkId => {
            Swal.fire({
                title: '¿Desea dar de baja la Obra?',
                text: "Al dar de baja, el encargado de esta obra ya no podrá realizar registros ni actualizaciones a partir de ahora",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, Dar de baja',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Eliminar el rol
                    Livewire.emit('deregistering_work', WorkId);

                    Swal.fire(
                        'Obra dada de baja',
                        'Cambios guardados',
                        'success'
                    )
                }
            });
        });
        Livewire.on('showAlertEnableWork', WorkId => {
            Swal.fire({
                title: '¿Desea Rehabilitar la Obra?',
                text: "Los cambios serán revertidos a una obra normal.",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, Rehabilitar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Eliminar el rol
                    Livewire.emit('enable_work', WorkId);

                    Swal.fire(
                        'Obra Rehabilitada',
                        'Cambios guardados',
                        'success'
                    )
                }
            });
        });

    </script>
@endpush
