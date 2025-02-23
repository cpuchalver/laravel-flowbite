{{-- card.blade.php --}}

<div {{ $attributes->class(["card"]) }}>

    @if($image)
        <img class="rounded-t-lg" src="{{ $image }}" alt="" />
    @endif
    <div class="p-6">
        {{ $slot }}
    </div>
</div>