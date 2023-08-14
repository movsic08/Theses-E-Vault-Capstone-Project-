@include('partials.__header')
<x-navbar />

<div class="relative h-screen w-full overflow-y-auto">
    <x-main_nav />
    <x-session_flash />
    {{ $slot }}
</div>
@include('partials.__footer')
