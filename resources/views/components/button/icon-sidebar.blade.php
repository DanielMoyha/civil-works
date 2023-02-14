<x-button
  {{ $attributes }}
  button-classes="flex items-center justify-center h-11 w-11 rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
>
  {{ $slot }}
</x-button>