<div>
    <p class="text-base font-medium text-slate-600 dark:text-navy-50 mb-1">{{ __('Tareas Pendientes') }}</p>
    <div class="card px-4 pt-2 pb-4">
        @forelse($tasks as $key => $task)
            <div class="border-b border-slate-150 py-3 dark:border-navy-500">
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <label class="flex">
                        <input
                            type="checkbox"
                            @click.stop
                            wire:click="taskCompleted({{$task->id}})"
                            class="form-checkbox is-outline h-5 w-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                        />
                    </label>
                    <h2 class="cursor-pointer text-slate-600 line-clamp-1 dark:text-navy-100">{{ $task->description }}</h2>
                </div>
                <div class="mt-1 flex items-end justify-between">
                    <div class="flex flex-wrap items-center font-inter text-xs">
                        <p>{{ $task->created_at->diffForHumans() }}</p>
                        <div class="m-1.5 w-px self-stretch bg-slate-200 dark:bg-navy-500"></div>
                        <span class="flex items-center space-x-1">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-3.5 w-3.5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                />
                            </svg>
                            <span>{{ $task->created_at->format('H:i') }}</span>
                        </span>
                        <div class="m-1.5 w-px self-stretch bg-slate-200 dark:bg-navy-500"></div>
                        <div class="badge space-x-2.5 px-1 text-warning text-xs">
                            <div class="h-2 w-2 rounded-full bg-current"></div>
                            <span>{{ __('Pendiente') }}</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-1">
                        <button x-data="{isImportant:false}" @click.stop="isImportant =! isImportant" class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" wire:click="editTask({{$task->id}})">
                            <i class="fa-solid fa-marker"></i>
                        </button>

                        <div class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" wire:click="deleteTask({{$task->id}})">
                            <i class="fa-solid fa-circle-minus text-error"></i>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        <div class="content-center grid h-full justify-center">
            <h2 class="text-sm+ font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 mt-2">
                <i class="fa-solid fa-inbox"></i> {{ __('Aún no tiene tareas registradas') }}
            </h2>
        </div>
        @endforelse
    </div>
</div>
