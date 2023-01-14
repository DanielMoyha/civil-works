<x-main>
    @include('layouts.sidebar-panel.sp-supervision')

    @section('content')


    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Área de Supervisión') }}</h2>
            <x-separate-vertical></x-separate-vertical>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <x-link :href="route('admin.supervision.index')">{{ __('Supervisiones') }}</x-link>
                <li>{{ __('Seguimiento de proyectos de supervisión') }}</li>
            </ul>
        </div>

        <livewire:general-supervisions />


    </main>

    @endsection
</x-main>

