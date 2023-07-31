@include('partials.__header')
<x-navbar />

<div class="relative h-screen w-full overflow-y-auto">
    <x-main_nav />
    <div class="flex flex-col space-y-2 bg-orange-700 md:flex-row md:space-y-0">
        <div class="md:w-1/2 md:space-y-3 lg:w-full">
            <h2 class="bg-blue-400 p-12 md:p-36">1st div</h2>
            <h2 class="bg-blue-100 p-12 md:p-36">1st div</h2>
            <h2 class="bg-blue-600 p-12 md:p-36">1st div</h2>
            <!-- Add more content here to test the sticky behavior -->
            <h2 class="bg-blue-200 p-12 md:p-36">1st div</h2>
            <h2 class="bg-blue-300 p-12 md:p-36">1st div</h2>
            <h2 class="bg-blue-500 p-12 md:p-36">1st div</h2>
            <h2 class="bg-blue-800 p-12 md:p-36">1st div</h2>
        </div>
        <div class="md:w-1/2 lg:w-1/4">
            <div class="sticky top-12">
                <h2 class="bg-cyan-700 p-10 md:p-20">2nd div SIDEBAR</h2>
                <h2 class="bg-cyan-600 p-10 md:p-20">3rd div SIDEBAR</h2>
            </div>
        </div>
    </div>
</div>




{{-- <div class="z-40 max-h-screen min-h-screen w-screen min-w-full overflow-x-hidden text-primary-color">
    <div class="shrink-0 overflow-y-auto">
        <x-main_nav /> --}}
{{-- container flex to col and row --}}
{{-- <div class="flex flex-col bg-red-200 md:flex-row"> --}}
{{-- first div --}}
{{-- <div class="container flex-grow space-y-2">
                <div class="w-full bg-blue-500 p-40">
                    <h1>HELLO</h1>
                </div>
                <div class="bg-blue-500 p-40">
                    <h1>HELLO</h1>
                </div>
                <div class="bg-blue-500 p-40">
                    <h1>HELLO</h1>
                </div>
            </div> --}}
{{-- 2nd div --}}
{{-- <div class="container my-4 h-10 flex-grow bg-orange-600 md:sticky md:top-12 md:w-1/4">
                <h2>SIDE</h2>
            </div>
            <div class="container flex-grow space-y-2">
                <div class="w-full bg-blue-500 p-40">
                    <h1>HELLO</h1>
            </div> --}}
{{-- </div>
    </div>
</div> --}}




@include('partials.__footer')
