<div>
    <div class="flex items-center justify-between mt-10">
        <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
            {{ __('Lista de supervisiones en ejecución') }}
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
                            {{ __('Supervisión') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center">
                            {{ __('Encargado') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center">
                            {{ __('Tareas') }}
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-center">
                            {{ __('Seguimiento') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allSupervisions as $supervision)
                        <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500" wire:loading.class='opacity-40'>
                            <td class="text-center px-4 py-3 sm:px-5">{{ $loop->iteration }}</td>
                            <td class=" px-4 py-3 sm:px-5">{{ $supervision->name }}</td>
                            <td class=" px-4 py-3 sm:px-5">{{ $supervision->work->user->name }}</td>
                            @if ($supervision->controls()->exists())
                                <td class="text-center text-xs+ px-4 py-3 sm:px-5">
                                    <div>
                                        {{ __('Total Tareas: ') . $supervision->controls->count()}}
                                        {{-- {{ $supervision->controls->completed_at->first() }} --}}
                                    </div>
                                </td>
                            @else
                                <td class="text-center font-bold text-xs italic opacity-40 px-4 py-3 sm:px-5">
                                    {{ __('Sin tareas aún') }}
                                </td>
                            @endif
                            <td class="text-center px-4 py-3 sm:px-5">
                                <div class="flex flex-wrap gap-2 py-1">
                                    @forelse ($supervision->follow_ups as $follow_up)
                                    <a href="{{ Storage::url('followUp/'.$follow_up->image) }}" target="_blank">

                                        <img
                                        class="aspect-square rounded-lg object-cover object-center h-20"
                                        src="{{ Storage::url('followUp/'.$follow_up->image) }}"
                                        {{-- src="https://images.unsplash.com/photo-1566766804468-f07b344cd2d7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDE0fHx8ZW58MHx8fHw%3D&w=1000&q=80" --}}
                                        alt="a" target="_blank"
                                        />
                                    </a>
                                    @empty
                                        <p class="font-bold text-xs italic opacity-40">{{ __('Sin seguimiento realizado...') }}</p>
                                    @endforelse
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="flex justify-center items-center space-x-2">
                                    <span class="h-8 w-8 text-cool-gray-400 text-3xl"><i class="fa-solid fa-inbox"></i></span>
                                    <span class="font-medium py-8 text-cool-gray-400 text-xl">{{ __('Supervisiones no encontradas...') }}</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {!! $allSupervisions->links() !!}
    </div>
</div>
