@include('admin.partials.__Admin_header')
<x-admin.admin_navbar />

<div class="relative h-screen w-full overflow-y-auto">
    <x-admin.admin_main_nav />
    <x-session_flash />
    <div class="container">
        <h2>Hello</h2>
    </div>
</div>



@include('admin.partials.__admin_footer')
