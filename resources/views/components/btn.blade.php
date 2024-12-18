@if (isset($href))
    <a {{$attributes->merge(['class' => 'button'])}}>
        {{ $slot }}
    </a>
@else
    <button {{$attributes->merge(['type' => 'button', 'class' => 'button'])}}>
        {{ $slot }}
    </button>
@endif
