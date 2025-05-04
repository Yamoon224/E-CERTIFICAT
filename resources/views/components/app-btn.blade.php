<button {{ $attributes->merge(['type' => 'submit', 'class' => 'md-btn']) }}>
    {{ $slot }}
</button>
