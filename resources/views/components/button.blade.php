<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-green-600 rounded-md font-semibold text-xs text-white tracking-widest hover:bg-green-500 active:bg-green-700 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>