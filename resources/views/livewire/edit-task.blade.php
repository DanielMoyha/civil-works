<div>
    @if(! empty($task))
    <form wire:submit.prevent="submit">
        <input wire:model="supervision_id" type="hidden" value="{{ $supervision->id }}" name="supervision_id" >
        <label class="gap-4 grid grid-cols-1 sm:grid-cols-12 my-3">
            <div class="sm:col-span-4">
                <span>Nombre de la Tarea</span>
                <span class="relative mt-1.5 flex ">
                    <input
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Describa la tarea a realizar..."
                        type="text"
                        wire:model="description"
                    />
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                    >
                        <i class="fa-solid fa-list-check"></i>
                    </span>
                </span>
            </div>
            <div class="flex items-end sm:col-span-2">
                <button type="submit" class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90 ">Actualizar</button>
            </div>
        </label>
        <div>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
    </form>
    @endif
</div>