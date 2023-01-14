@props(['action', 'buttonText' => __('Eliminar')])

<div x-data="{ initial: true, deleting: false }" class="">
    <button x-on:click.prevent="deleting = true; initial = false" x-show="initial"
        x-on:deleting.window="$el.disabled = true" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        class=" h-7 w-7 px-1.5 text-white p-1 rounded disabled:opacity-50">
        <i class="fa-solid fa-trash fa-xl"></i>
    </button>

    <div x-show="deleting" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90" class="flex items-center space-x-3">
        <template x-teleport="#x-teleport-target">
            <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                x-show="deleting" role="dialog" @keydown.window.escape="deleting = false">
                <div class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300"
                    @click="deleting = false" x-show="deleting" x-transition:enter="ease-out"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"></div>
                <div class="relative max-w-lg rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5"
                    x-show="deleting" x-transition:enter="ease-out" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="ease-in"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                    <div class="mt-4">
                        <h2 class="text-2xl text-slate-700 dark:text-navy-100">
                            Eliminar Rol
                        </h2>
                        <p class="mt-2">
                            ¿Está seguro de eliminar el rol?
                        </p>
                        <form x-on:submit="$dispatch('deleting')" method="post" action="{{ $action }}">
                            @csrf
                            @method('delete')

                            <button x-on:click="$el.form.submit()" x-on:deleting.window="$el.disabled = true"
                                {{-- type="submit" --}}
                                class="text-white p-1 rounded bg-error hover:bg-error dark:bg-error dark:hover:bg-error disabled:opacity-50">
                                {{ __('Sí, estoy de acuerdo') }}
                            </button>

                            <button x-on:click.prevent="deleting = false; setTimeout(() => { initial = true }, 150)"
                                x-on:deleting.window="$el.disabled = true"
                                class="text-white p-1 rounded bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 disabled:opacity-50">
                                @lang('No')
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </template>
        {{-- <span class="dark:text-white">@lang('Are you sure?')</span> --}}

        {{-- <form x-on:submit="$dispatch('deleting')" method="post" action="{{ $action }}">
            @csrf
            @method('delete')

            <button x-on:click="$el.form.submit()" x-on:deleting.window="$el.disabled = true" type="submit"
                class="text-white p-1 rounded bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 disabled:opacity-50">
                @lang('Yes')
            </button>

            <button x-on:click.prevent="deleting = false; setTimeout(() => { initial = true }, 150)"
                x-on:deleting.window="$el.disabled = true"
                class="text-white p-1 rounded bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 disabled:opacity-50">
                @lang('No')
            </button>
        </form> --}}
    </div>
</div>
