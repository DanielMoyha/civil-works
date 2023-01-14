<!--LAYOUT MAIN-->
<x-body x-data="" x-bind="$store.global.documentBody" {{ $attributes }}>

    @include('layouts.pre-loader')

    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
        @include('layouts.sidebar')

        @include('layouts.header')

        @include('layouts.search-bar')

        @include('layouts.right-sidebar')

        <!-- Main Content Wrapper -->
        @yield('content')
    </div>
    <!--
        This is a place for Alpine.js Teleport feature
        @see https://alpinejs.dev/directives/teleport
      -->
    <div id="x-teleport-target"></div>
    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
</x-body>
