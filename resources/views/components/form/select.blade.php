@props([
    'label',
    'error'
])
<x-form {{ $attributes }}>
    <x-slot:nameLabel>{{ $label }}</x-slot:nameLabel>
    {{ $slot }}
    {{-- <select {{ $selectInput->attributes->class(['mt-1.5 w-full']) }} placeholder="Seleccione una opción..."
    >
        <option value>{{ __('Seleccione una opción') }}</option>
    </select> --}}
    <div>{{ $error }}</div>
</x-form>