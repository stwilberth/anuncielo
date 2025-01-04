<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-amethyst-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amethyst-600 focus:bg-amethyst-600 active:bg-amethyst-900 focus:outline-none focus:ring-2 focus:ring-amethyst-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
