<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/logos/logo-eyserges.svg') }}" type="image/x-icon">

        <!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
			rel="stylesheet"
		/>

        <!-- Scripts -->
        @vite(['resources/css/main.css', 'resources/js/main.js'])
    </head>
    <body x-data class="is-header-blur" x-bind="$store.global.documentBody">
        @include('layouts.pre-loader')
        <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
            {{ $slot }}
        </div>
        <div id="x-teleport-target"></div>
		<script>
			window.addEventListener('DOMContentLoaded', () => Alpine.start());
		</script>
    </body>
</html>
