@props([
    'nameLabel',
])
<label {{ $attributes->class(['block']) }}>
    <span {{ $nameLabel->attributes->class(['font-medium text-slate-600 dark:text-navy-100']) }}>
        {{ $nameLabel }}
    </span>
    {{ $slot }}
</label>