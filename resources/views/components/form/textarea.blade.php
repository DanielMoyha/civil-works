@props([
    'label',
    'textarea',
    'error'
])
<x-form {{ $attributes }}>
    <x-slot:nameLabel>{{ $label }}</x-slot:nameLabel>
    <div class="mt-1.5 w-full">
        <textarea
        {{ $textarea->attributes->class(['form-textarea w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent'])->merge(['autocomplete' => 'off', 'rows' => '4']) }}
        ></textarea>
    </div>
    <div>{{ $error }}</div>
</x-form>