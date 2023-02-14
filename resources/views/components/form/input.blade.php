@props([
    'label',
    'input',
    'error'
])
<x-form {{ $attributes }}>
    <x-slot:nameLabel>{{ $label }}</x-slot:nameLabel>
    <input {{ $input->attributes->class(['form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent'])->merge(['autocomplete' => 'off']) }}
    >
    <div>{{ $error }}</div>
</x-form>