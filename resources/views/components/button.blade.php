<button {{ $attributes->merge(['type' => 'submit', 'class' => 'hero-btn']) }}>
    {{ $slot }}
</button>
