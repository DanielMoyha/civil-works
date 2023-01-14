<div>
    <div class="flex items-center justify-between mt-10">
        <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
            {{ __('Lista de estudios en ejecución') }}
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
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                >
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
                            {{ __('Estudio') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            {{ __('Encargado') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center">
                            {{ __('Estudios extra') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center">
                            {{ __('Documentos') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allStudies as $studie)
                        <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500" wire:loading.class='opacity-40'>
                            <td class="text-center px-4 py-3 sm:px-5">{{ $loop->iteration }}</td>
                            <td class=" px-4 py-3 sm:px-5">{{ $studie->name }}</td>
                            <td class=" px-4 py-3 sm:px-5">{{ $studie->work->user->name }}</td>
                            @if ($studie->types()->exists())
                                <td class=" px-4 py-3 sm:px-5">
                                    <div class="flex flex-wrap gap-2 py-1">
                                        @forelse ($studie->types as $type)
                                            <a class="tag rounded-full border border-info/30 bg-info/10 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25 text-tiny">
                                                {{ $type->name }}
                                            </a>
                                        @empty
                                            <p class="font-bold text-xs italic opacity-40">Aún no tiene materiales registrados...</p>
                                        @endforelse
                                    </div>
                                </td>
                            @else
                                <td class="text-center font-bold text-xs italic opacity-40 px-4 py-3 sm:px-5"> {{ __('Sin estudios extras') }}</td>
                            @endif
                            @if ($studie->documents()->exists())
                                <td class="text-center px-4 py-3 sm:px-5">
                                    <div>
                                        {{ $studie->documents->count() }}
                                        <span class="text-xs">@choice('Documento|Documentos', $studie->documents->count())</span>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
                                        @forelse ($studie->documents as $document)
                                            <a class="tag rounded-full border border-secondary/30 bg-secondary/10 text-secondary hover:bg-secondary/20 focus:bg-secondary/20 active:bg-secondary/25" href="{{ asset('uploads') . '/' . $document->file }}" target="_blank">
                                                <span class="line-clamp-1">{{ $document->name }}</span>
                                            </a>
                                        @empty
                                            <td class="text-center font-bold text-xs italic opacity-40 px-4 py-3 sm:px-5"> {{ __('Sin documentos') }}</td>
                                        @endforelse
                                    </div>
                                </td>
                            @else
                                <td class="text-center font-bold text-xs italic opacity-40 px-4 py-3 sm:px-5"> {{ __('Sin documentos') }}</td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="flex justify-center items-center space-x-2">
                                    <span class="h-8 w-8 text-cool-gray-400 text-3xl"><i class="fa-solid fa-inbox"></i></span>
                                    <span class="font-medium py-8 text-cool-gray-400 text-xl">{{ __('Estudios no encontrados...') }}</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {!! $allStudies->links() !!}
    </div>
</div>

