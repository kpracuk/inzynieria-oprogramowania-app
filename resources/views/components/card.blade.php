@props(['size' => 'normal'])

@php
    $size_class = 'sm:max-w-md';

    switch ($size) {
        case 'large':
            $size_class = 'sm:max-w-5xl px-4 sm:px-6 lg:px-8 ';
            break;
        default:
            break;
    }
@endphp

<div class="{{ $size_class }} mx-auto flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div class="w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
