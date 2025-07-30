<x-layouts.app>
    @isset($header)
        <div class="container mb-4">
            {{ $header }}
        </div>
    @endisset
    <div class="container">
        {{ $slot }}
    </div>
</x-layouts.app> 