@push('styles')
    
@endpush
<x-main class="is-sidebar-open">
    @section('sidebar-panel')
        @include('layouts.sidebar-panel.sp-users')
    @endsection

    @section('content')
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            {{-- <div class="my-20">
                PRUEBAS
                @foreach ($users as $user)
                    <ul>
                        <li>{{ $user->name }} => {{ $user->city->name ?? 'Sin ciudad' }}</li>
                    </ul>
                @endforeach
            </div> --}}
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">{{ __('Registrar Usuario') }}</h2>
                <x-separate-vertical></x-separate-vertical>
                <ul class="flex flex-wrap items-center space-x-2">
                    <x-link :href="route('admin.users.index')">Usuarios</x-link>
                    <li>Registrar Nuevo Usuario</li>
                </ul>
            </div>

            <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
                <div class="col-span-12 grid lg:col-span-10">
                    <div class="card">
                        <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                            <div class="flex items-center space-x-2">
                                <div
                                    class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light"
                                >
                                    <i class="fa-solid fa-layer-group"></i>
                                </div>
                                <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">Datos del Usuario</h4>
                            </div>
                        </div>
                        {{-- <form method="POST" action="{{ route('admin.users.store') }}"> --}}
                        
                           
                        @livewire('user-register')

                    </div>
                </div>
            </div>
        </main>
    @endsection

    @push('scripts')

    @endpush
</x-main>
