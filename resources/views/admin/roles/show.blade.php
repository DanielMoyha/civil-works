@push('styles')
    {{-- @livewireStyles --}}
@endpush
<x-main class="is-sidebar-open">
    @section('sidebar-panel')
        @include('layouts.sidebar-panel.sp-users')
    @endsection

    @section('content')
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">Mostrar Rol</h2>
            </div>

        </main>
    @endsection

    @push('scripts')
        {{-- @livewireScripts --}}
        {{-- @powerGridScripts --}}
    @endpush
</x-main>
