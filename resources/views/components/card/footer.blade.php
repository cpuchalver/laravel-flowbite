{{-- card/header.blade.php --}}

@aware(["link"])

<div {{ $attributes->class(["card-footer"]) }}>
    {{ $slot }}
</div>