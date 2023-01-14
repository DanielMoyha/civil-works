<x-main>
    @include('layouts.sidebar-panel.sp-study')

    @section('content')


    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Área de Estudios') }}</h2>
            <x-separate-vertical></x-separate-vertical>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <x-link :href="route('admin.study.index')">{{ __('Estudios') }}</x-link>
                <li>{{ __('Lista de estudios en proceso') }}</li>
            </ul>
        </div>

        <livewire:general-studies />


    </main>

    @endsection
</x-main>

