<x-main>
    @include('layouts.sidebar-panel.sp-supervision')

    @section('content')
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Control de Supervisión') }}</h2>
                <x-separate-vertical></x-separate-vertical>
                <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                    <x-link :href="route('supervision.assignments')">{{ __('Asiganciones de obra') }}</x-link>
                    <x-link :href="route('supervision.assignments.show', [$supervision->id])">{{ __('Obra designada') }}</x-link>
                    <li>{{ __('Tareas de cumplimiento de obra') }}</li>
                </ul>
            </div>

            {{-- <h2>Nombre de obra: {{ $supervision->name }}</h2>
            @foreach ($supervision->work->services as $service)
                <li>{{ $service->name }}</li>
            @endforeach --}}
            {{-- <h2>{{ $supervision->work->city->state->country->name }}</h2> --}}
            @livewire('create-task', ['supervision_id' => $supervision->id])
            @livewire('edit-task', ['supervision_id' => $supervision->id])

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-4">
                @livewire('tasks', ['supervision_id' => $supervision->id])
                @livewire('completed-tasks', ['supervision_id' => $supervision->id])
            </div>
        </main>
    @endsection
</x-main>