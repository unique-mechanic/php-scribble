<button {{ $attributes->merge(['type' => 'submit', 'class' => 'button button-danger disabled:opacity-50']) }}>{{ $slot }}</button>
