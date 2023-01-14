@push('styles')
@vite(['resources/css/app.css'])
{{-- @livewireStyles --}}
@powerGridStyles
@endpush
<x-main class="is-sidebar-open">
    @section('sidebar-panel')
        @include('layouts.sidebar-panel.sp-users')
    @endsection

    @section('content')
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Usuarios') }}</h2>
                <x-separate-vertical></x-separate-vertical>
                <ul class="flex flex-wrap items-center space-x-2">
                    <x-link :href="route('admin.users.index')">Usuarios</x-link>
                    <li>Lista de Usuarios</li>
                </ul>
                <div class="lg:w-2/5"></div>
                    <a href="{{ route('admin.users.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">Registrar Nuevo</a>
            </div>

            <livewire:user-table />

            @if (session('status') === 'role-assigned')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                >
                <div x-init="$notification({text:'Datos guardados exitosamente!',variant:'success',position:'right-top',duration:2200})"></div>
                </p>
            @endif
            @if (session('status') === 'user-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                >
                <div x-init="$notification({text:'Datos actualizados exitosamente!',variant:'success',position:'right-top',duration:2200})"></div>
                </p>
            @endif
        </main>
    @endsection

    @push('scripts')
        {{-- @livewireScripts --}}
        {{-- @powerGridScripts --}}
    @endpush
</x-main>
