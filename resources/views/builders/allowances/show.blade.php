<x-main>
    @include('layouts.sidebar-panel.sp-construction')

    @section('content')


    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <h1>VER DETALLES</h1>

        <h2>{{ $construction->name }}</h2>
        @foreach ($construction->work->services as $service)
            <li>{{ $service->name }}</li>
        @endforeach
        {{-- <h2>{{ $construction->work->city->state->country->name }}</h2> --}}
        <hr>
        <h1>MATERIALES</h1>
        @foreach ($construction->materials as $material)
            <li>{{ $material->name }}</li>
        @endforeach

    </main>

    @endsection
</x-main>

