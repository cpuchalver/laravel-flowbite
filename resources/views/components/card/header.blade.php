{{-- card/header.blade.php --}}

@aware(["link"])

@if($link)
    <a href="{{ $link }}">
@endif
    <h5 {{ $attributes->class(["card-header"]) }}>
        {{ $slot }}
    </h5>
@if($link)
    </a>
@endif
