@include('admin.partials.__admin_header')
<x-admin.admin_navbar />
<div class="relative h-screen w-full overflow-y-auto">
    <x-admin.admin_main_nav />
    <x-session_flash />
    {{-- @dd(auth()->user()) --}}

    {{ $slot }}

</div>





@include('admin.partials.__admin_footer')
