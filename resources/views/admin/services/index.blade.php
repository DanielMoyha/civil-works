@push('styles')
{{-- @vite(['resources/css/app.css']) --}}
@endpush
<x-main>
    @include('layouts.sidebar-panel.sp-services')

    @section('content')
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Servicios') }}</h2>
                <x-separate-vertical></x-separate-vertical>
                <ul class="flex flex-wrap items-center space-x-2">
                    <x-link :href="route('admin.services.index')">{{ __('Servicios') }}</x-link>
                    <li>{{ __('Lista de Servicios') }}</li>
                </ul>
                <div class="lg:w-2/5"></div>
            </div>


            <livewire:services />

        </main>
    @endsection
</x-main>
