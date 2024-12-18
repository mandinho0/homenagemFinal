<button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-md  px-3 py-2 bg-blue-400 text-white ring-1 ring-transparent transition hover:bg-blue-500 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white']) }}>
    {{ $slot }}
</button>
