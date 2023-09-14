<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" def />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{ asset('icons/logo.svg') }}" type="image/x-icon">
    @stack('livewire:scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="{{ asset('js/jQuery.js') }}"></script>
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.3/dist/cdn.min.js"></script> --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>@yield('title', 'Thesis Kiosk')</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <style>
        #nprogress .bar {
            height: 0.2rem;
            width: $glow-width;
            max-width: 100%;
            float: right;

        }

        #nprogress::before,
        #nprogress::after {
            content: '';
            display: block;
            position: relative;
            border-radius: 0px 2px 2px 0px;
        }

        #nprogress::before {
            background: transparent;
            box-shadow: 0px 0px $glow-radius $bar-color, 0px 0px $glow-radius $glow-color;
            z-index: -5;
        }

        #nprogress::after {
            background: linear-gradient(to right, $background-color 0%, transparent 100%);
            height:calc(100% + #{$glow-radius} + #{$glow-radius});
            width:calc(100% + #{$glow-radius});
            top: (-$glow-radius);
            left: (-$glow-radius);
            z-index: -3;
        }
    </style>
</head>

{{-- <body class="gradient-bg-light custom-scrollbar m-0 flex p-0 font-poppins">
    <x-sidebar />
    <div class="flex w-full max-w-full flex-col">
        <x-navbar />
        <section class="container flex h-full w-full items-center justify-center bg-blue-300">
            <div class="">
                <h2 class="bg-blue-900 p-20 text-white">Content for the first section</h2>
            </div>
        </section>
        <section class="container flex h-full w-full items-center justify-center bg-blue-300">
            <div class="">
                <h2 class="bg-blue-900 p-20 text-white">Content for the first section</h2>
            </div>
        </section>

    </div>
    @livewireScripts

</body> --}}

<body class="gradient-bg-light custom-scrollbar font-poppins">
    <nav class="fixed z-30 h-10 w-full bg-blue-500">
        <h1 class="p-4"> I am nav bar</h1>
    </nav>
    <div class="pt-10">
        <aside class="fixed left-0 top-0 z-20 h-full w-20 bg-gray-500">
            <div class="pt-10">
                <h1> Iam side bar</h1>
            </div>
        </aside>
        <div class="relative h-full w-full overflow-y-auto bg-orange-300">
            <main>
                <div class="container px-4 py-4">
                    <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
                        <!-- Main widget -->
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6 2xl:col-span-2">
                            <div class="mb-4 flex items-center justify-between">
                                <div class="flex-shrink-0">
                                    <span
                                        class="text-xl font-bold leading-none text-gray-900 dark:text-white sm:text-2xl">$45,385</span>
                                    <h3 class="text-base font-light text-gray-500 dark:text-gray-400">Sales this week
                                    </h3>
                                </div>
                                <div
                                    class="flex flex-1 items-center justify-end text-base font-medium text-green-500 dark:text-green-400">
                                    12.5%
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div id="main-chart" style="min-height: 435px;">
                                <div id="apexchartsmwk8b1pp"
                                    class="apexcharts-canvas apexchartsmwk8b1pp apexcharts-theme-light"
                                    style="width: 876px; height: 420px;"><svg id="SvgjsSvg2925" width="876"
                                        height="420" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                        class="apexcharts-svg apexcharts-zoomable hovering-zoom"
                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                        style="background: transparent;">
                                        <foreignObject x="0" y="0" width="876" height="420">
                                            <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                                xmlns="http://www.w3.org/1999/xhtml"
                                                style="inset: auto 0px 1px; position: absolute; max-height: 210px;">
                                                <div class="apexcharts-legend-series" rel="1"
                                                    seriesname="Revenue" data:collapsed="false"
                                                    style="margin: 2px 10px;"><span class="apexcharts-legend-marker"
                                                        rel="1" data:collapsed="false"
                                                        style="background: rgb(26, 86, 219); color: rgb(26, 86, 219); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                        class="apexcharts-legend-text" rel="1" i="0"
                                                        data:default-text="Revenue" data:collapsed="false"
                                                        style="color: rgb(107, 114, 128); font-size: 14px; font-weight: 500; font-family: Inter, sans-serif;">Revenue</span>
                                                </div>
                                                <div class="apexcharts-legend-series" rel="2"
                                                    seriesname="Revenuexxpreviousxperiodx" data:collapsed="false"
                                                    style="margin: 2px 10px;"><span class="apexcharts-legend-marker"
                                                        rel="2" data:collapsed="false"
                                                        style="background: rgb(253, 186, 140); color: rgb(253, 186, 140); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                        class="apexcharts-legend-text" rel="2" i="1"
                                                        data:default-text="Revenue%20(previous%20period)"
                                                        data:collapsed="false"
                                                        style="color: rgb(107, 114, 128); font-size: 14px; font-weight: 500; font-family: Inter, sans-serif;">Revenue
                                                        (previous period)</span></div>
                                            </div>
                                            <style type="text/css">
                                                .apexcharts-legend {
                                                    display: flex;
                                                    overflow: auto;
                                                    padding: 0 10px;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom,
                                                .apexcharts-legend.apx-legend-position-top {
                                                    flex-wrap: wrap
                                                }

                                                .apexcharts-legend.apx-legend-position-right,
                                                .apexcharts-legend.apx-legend-position-left {
                                                    flex-direction: column;
                                                    bottom: 0;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                .apexcharts-legend.apx-legend-position-right,
                                                .apexcharts-legend.apx-legend-position-left {
                                                    justify-content: flex-start;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                    justify-content: center;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                    justify-content: flex-end;
                                                }

                                                .apexcharts-legend-series {
                                                    cursor: pointer;
                                                    line-height: normal;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                                                .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                                    display: flex;
                                                    align-items: center;
                                                }

                                                .apexcharts-legend-text {
                                                    position: relative;
                                                    font-size: 14px;
                                                }

                                                .apexcharts-legend-text *,
                                                .apexcharts-legend-marker * {
                                                    pointer-events: none;
                                                }

                                                .apexcharts-legend-marker {
                                                    position: relative;
                                                    display: inline-block;
                                                    cursor: pointer;
                                                    margin-right: 3px;
                                                    border-style: solid;
                                                }

                                                .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                                .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                                    display: inline-block;
                                                }

                                                .apexcharts-legend-series.apexcharts-no-click {
                                                    cursor: auto;
                                                }

                                                .apexcharts-legend .apexcharts-hidden-zero-series,
                                                .apexcharts-legend .apexcharts-hidden-null-series {
                                                    display: none !important;
                                                }

                                                .apexcharts-inactive-legend {
                                                    opacity: 0.45;
                                                }
                                            </style>
                                        </foreignObject>
                                        <g id="SvgjsG2927" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(93.80859375, 30)">
                                            <defs id="SvgjsDefs2926">
                                                <clipPath id="gridRectMaskmwk8b1pp">
                                                    <rect id="SvgjsRect2933" width="756.709888458252" height="314.685"
                                                        x="-4" y="-2" rx="0" ry="0"
                                                        opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskmwk8b1pp"></clipPath>
                                                <clipPath id="nonForecastMaskmwk8b1pp"></clipPath>
                                                <clipPath id="gridRectMarkerMaskmwk8b1pp">
                                                    <rect id="SvgjsRect2934" width="772.709888458252"
                                                        height="334.685" x="-12" y="-12"
                                                        rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                                <linearGradient id="SvgjsLinearGradient2952" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop2953" stop-opacity="0.45"
                                                        stop-color="rgba(26,86,219,0.45)" offset="0"></stop>
                                                    <stop id="SvgjsStop2954" stop-opacity="0"
                                                        stop-color="rgba(141,171,237,0)" offset="1"></stop>
                                                    <stop id="SvgjsStop2955" stop-opacity="0"
                                                        stop-color="rgba(141,171,237,0)" offset="1"></stop>
                                                </linearGradient>
                                                <linearGradient id="SvgjsLinearGradient2974" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop2975" stop-opacity="0.45"
                                                        stop-color="rgba(253,186,140,0.45)" offset="0"></stop>
                                                    <stop id="SvgjsStop2976" stop-opacity="0"
                                                        stop-color="rgba(254,221,198,0)" offset="1"></stop>
                                                    <stop id="SvgjsStop2977" stop-opacity="0"
                                                        stop-color="rgba(254,221,198,0)" offset="1"></stop>
                                                </linearGradient>
                                            </defs>
                                            <line id="SvgjsLine2932" x1="498.6399256388346" y1="0"
                                                x2="498.6399256388346" y2="310.685" stroke="#f3f4f6"
                                                stroke-dasharray="10" stroke-linecap="butt"
                                                class="apexcharts-xcrosshairs" x="498.6399256388346" y="0"
                                                width="1" height="310.685" fill="#b1b9c4" filter="none"
                                                fill-opacity="0.9" stroke-width="1"></line>
                                            <g id="SvgjsG2980" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG2981" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -4)"><text id="SvgjsText2983"
                                                        font-family="Inter, sans-serif" x="0" y="339.685"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="14px" font-weight="500" fill="#6b7280"
                                                        class="apexcharts-text apexcharts-xaxis-label"
                                                        style="font-family: Inter, sans-serif;">
                                                        <tspan id="SvgjsTspan2984">01 Feb</tspan>
                                                        <title>01 Feb</title>
                                                    </text><text id="SvgjsText2986" font-family="Inter, sans-serif"
                                                        x="124.78498140970865" y="339.685" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="14px" font-weight="500"
                                                        fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label"
                                                        style="font-family: Inter, sans-serif;">
                                                        <tspan id="SvgjsTspan2987">02 Feb</tspan>
                                                        <title>02 Feb</title>
                                                    </text><text id="SvgjsText2989" font-family="Inter, sans-serif"
                                                        x="249.56996281941733" y="339.685" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="14px" font-weight="500"
                                                        fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label"
                                                        style="font-family: Inter, sans-serif;">
                                                        <tspan id="SvgjsTspan2990">03 Feb</tspan>
                                                        <title>03 Feb</title>
                                                    </text><text id="SvgjsText2992" font-family="Inter, sans-serif"
                                                        x="374.35494422912603" y="339.685" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="14px" font-weight="500"
                                                        fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label"
                                                        style="font-family: Inter, sans-serif;">
                                                        <tspan id="SvgjsTspan2993">04 Feb</tspan>
                                                        <title>04 Feb</title>
                                                    </text><text id="SvgjsText2995" font-family="Inter, sans-serif"
                                                        x="499.13992563883465" y="339.685" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="14px" font-weight="500"
                                                        fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label"
                                                        style="font-family: Inter, sans-serif;">
                                                        <tspan id="SvgjsTspan2996">05 Feb</tspan>
                                                        <title>05 Feb</title>
                                                    </text><text id="SvgjsText2998" font-family="Inter, sans-serif"
                                                        x="623.9249070485432" y="339.685" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="14px" font-weight="500"
                                                        fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label"
                                                        style="font-family: Inter, sans-serif;">
                                                        <tspan id="SvgjsTspan2999">06 Feb</tspan>
                                                        <title>06 Feb</title>
                                                    </text><text id="SvgjsText3001" font-family="Inter, sans-serif"
                                                        x="748.7098884582518" y="339.685" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="14px" font-weight="500"
                                                        fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label"
                                                        style="font-family: Inter, sans-serif;">
                                                        <tspan id="SvgjsTspan3002">07 Feb</tspan>
                                                        <title>07 Feb</title>
                                                    </text></g>
                                                <line id="SvgjsLine3003" x1="0" y1="311.685"
                                                    x2="748.709888458252" y2="311.685" stroke="#f3f4f6"
                                                    stroke-dasharray="0" stroke-width="1" stroke-linecap="butt">
                                                </line>
                                            </g>
                                            <g id="SvgjsG3016" class="apexcharts-grid">
                                                <g id="SvgjsG3017" class="apexcharts-gridlines-horizontal">
                                                    <line id="SvgjsLine3026" x1="0" y1="0"
                                                        x2="748.709888458252" y2="0" stroke="#f3f4f6"
                                                        stroke-dasharray="1" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine3027" x1="0" y1="77.67125"
                                                        x2="748.709888458252" y2="77.67125" stroke="#f3f4f6"
                                                        stroke-dasharray="1" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine3028" x1="0" y1="155.3425"
                                                        x2="748.709888458252" y2="155.3425" stroke="#f3f4f6"
                                                        stroke-dasharray="1" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine3029" x1="0" y1="233.01375000000002"
                                                        x2="748.709888458252" y2="233.01375000000002"
                                                        stroke="#f3f4f6" stroke-dasharray="1" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine3030" x1="0" y1="310.685"
                                                        x2="748.709888458252" y2="310.685" stroke="#f3f4f6"
                                                        stroke-dasharray="1" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG3018" class="apexcharts-gridlines-vertical"></g>
                                                <line id="SvgjsLine3019" x1="0" y1="311.685"
                                                    x2="0" y2="317.685" stroke="#f3f4f6"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine3020" x1="124.78498140970866" y1="311.685"
                                                    x2="124.78498140970866" y2="317.685" stroke="#f3f4f6"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine3021" x1="249.56996281941733" y1="311.685"
                                                    x2="249.56996281941733" y2="317.685" stroke="#f3f4f6"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine3022" x1="374.354944229126" y1="311.685"
                                                    x2="374.354944229126" y2="317.685" stroke="#f3f4f6"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine3023" x1="499.13992563883465" y1="311.685"
                                                    x2="499.13992563883465" y2="317.685" stroke="#f3f4f6"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine3024" x1="623.9249070485433" y1="311.685"
                                                    x2="623.9249070485433" y2="317.685" stroke="#f3f4f6"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine3025" x1="748.709888458252" y1="311.685"
                                                    x2="748.709888458252" y2="317.685" stroke="#f3f4f6"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine3032" x1="0" y1="310.685"
                                                    x2="748.709888458252" y2="310.685" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                <line id="SvgjsLine3031" x1="0" y1="1"
                                                    x2="0" y2="310.685" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG2935" class="apexcharts-area-series apexcharts-plot-series">
                                                <g id="SvgjsG2936" class="apexcharts-series" seriesName="Revenue"
                                                    data:longestSeries="true" rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath2956"
                                                        d="M0 310.685L0 172.43017499999996C43.674743493398026 172.43017499999996 81.11023791631062 226.02333750000025 124.78498140970865 226.02333750000025C168.4597249031067 226.02333750000025 205.8952193260193 250.1014250000003 249.5699628194173 250.1014250000003C293.2447063128153 250.1014250000003 330.68020073572796 106.4096125000001 374.354944229126 106.4096125000001C418.029687722524 106.4096125000001 455.4651821454366 172.43017499999996 499.1399256388346 172.43017499999996C542.8146691322327 172.43017499999996 580.2501635551453 211.26580000000013 623.9249070485432 211.26580000000013C667.5996505419413 211.26580000000013 705.0351449648539 288.93705 748.709888458252 288.93705C748.709888458252 288.93705 748.709888458252 288.93705 748.709888458252 310.685M748.709888458252 288.93705L748.709888458252 288.93705 "
                                                        fill="url(#SvgjsLinearGradient2952)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-area" index="0"
                                                        clip-path="url(#gridRectMaskmwk8b1pp)"
                                                        pathTo="M 0 310.685L 0 172.43017499999996C 43.674743493398026 172.43017499999996 81.11023791631062 226.02333750000025 124.78498140970865 226.02333750000025C 168.4597249031067 226.02333750000025 205.8952193260193 250.1014250000003 249.5699628194173 250.1014250000003C 293.2447063128153 250.1014250000003 330.68020073572796 106.4096125000001 374.354944229126 106.4096125000001C 418.029687722524 106.4096125000001 455.4651821454366 172.43017499999996 499.1399256388346 172.43017499999996C 542.8146691322327 172.43017499999996 580.2501635551453 211.26580000000013 623.9249070485432 211.26580000000013C 667.5996505419413 211.26580000000013 705.0351449648539 288.93705 748.709888458252 288.93705C 748.709888458252 288.93705 748.709888458252 288.93705 748.709888458252 310.685M 748.709888458252 288.93705z"
                                                        pathFrom="M 0 310.685L 0 172.43017499999996C 43.674743493398026 172.43017499999996 81.11023791631062 226.02333750000025 124.78498140970865 226.02333750000025C 168.4597249031067 226.02333750000025 205.8952193260193 250.1014250000003 249.5699628194173 250.1014250000003C 293.2447063128153 250.1014250000003 330.68020073572796 106.4096125000001 374.354944229126 106.4096125000001C 418.029687722524 106.4096125000001 455.4651821454366 172.43017499999996 499.1399256388346 172.43017499999996C 542.8146691322327 172.43017499999996 580.2501635551453 211.26580000000013 623.9249070485432 211.26580000000013C 667.5996505419413 211.26580000000013 705.0351449648539 288.93705 748.709888458252 288.93705C 748.709888458252 288.93705 748.709888458252 288.93705 748.709888458252 310.685M 748.709888458252 288.93705z">
                                                    </path>
                                                    <path id="SvgjsPath2957"
                                                        d="M0 172.43017499999996C43.674743493398026 172.43017499999996 81.11023791631062 226.02333750000025 124.78498140970865 226.02333750000025C168.4597249031067 226.02333750000025 205.8952193260193 250.1014250000003 249.5699628194173 250.1014250000003C293.2447063128153 250.1014250000003 330.68020073572796 106.4096125000001 374.354944229126 106.4096125000001C418.029687722524 106.4096125000001 455.4651821454366 172.43017499999996 499.1399256388346 172.43017499999996C542.8146691322327 172.43017499999996 580.2501635551453 211.26580000000013 623.9249070485432 211.26580000000013C667.5996505419413 211.26580000000013 705.0351449648539 288.93705 748.709888458252 288.93705 "
                                                        fill="none" fill-opacity="1" stroke="#1a56db"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="4"
                                                        stroke-dasharray="0" class="apexcharts-area" index="0"
                                                        clip-path="url(#gridRectMaskmwk8b1pp)"
                                                        pathTo="M 0 172.43017499999996C 43.674743493398026 172.43017499999996 81.11023791631062 226.02333750000025 124.78498140970865 226.02333750000025C 168.4597249031067 226.02333750000025 205.8952193260193 250.1014250000003 249.5699628194173 250.1014250000003C 293.2447063128153 250.1014250000003 330.68020073572796 106.4096125000001 374.354944229126 106.4096125000001C 418.029687722524 106.4096125000001 455.4651821454366 172.43017499999996 499.1399256388346 172.43017499999996C 542.8146691322327 172.43017499999996 580.2501635551453 211.26580000000013 623.9249070485432 211.26580000000013C 667.5996505419413 211.26580000000013 705.0351449648539 288.93705 748.709888458252 288.93705"
                                                        pathFrom="M 0 172.43017499999996C 43.674743493398026 172.43017499999996 81.11023791631062 226.02333750000025 124.78498140970865 226.02333750000025C 168.4597249031067 226.02333750000025 205.8952193260193 250.1014250000003 249.5699628194173 250.1014250000003C 293.2447063128153 250.1014250000003 330.68020073572796 106.4096125000001 374.354944229126 106.4096125000001C 418.029687722524 106.4096125000001 455.4651821454366 172.43017499999996 499.1399256388346 172.43017499999996C 542.8146691322327 172.43017499999996 580.2501635551453 211.26580000000013 623.9249070485432 211.26580000000013C 667.5996505419413 211.26580000000013 705.0351449648539 288.93705 748.709888458252 288.93705">
                                                    </path>
                                                    <g id="SvgjsG2937" class="apexcharts-series-markers-wrap"
                                                        data:realIndex="0">
                                                        <g id="SvgjsG2939" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskmwk8b1pp)">
                                                            <circle id="SvgjsCircle2940" r="5"
                                                                cx="0" cy="172.43017499999996"
                                                                class="apexcharts-marker no-pointer-events wfiue8iau"
                                                                stroke="#ffffff" fill="#1a56db" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9" rel="0"
                                                                j="0" index="0"
                                                                default-marker-size="5"></circle>
                                                            <circle id="SvgjsCircle2941" r="5"
                                                                cx="124.78498140970865" cy="226.02333750000025"
                                                                class="apexcharts-marker no-pointer-events wce4z9wp5"
                                                                stroke="#ffffff" fill="#1a56db" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9" rel="1"
                                                                j="1" index="0"
                                                                default-marker-size="5"></circle>
                                                        </g>
                                                        <g id="SvgjsG2942" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskmwk8b1pp)">
                                                            <circle id="SvgjsCircle2943" r="5"
                                                                cx="249.5699628194173" cy="250.1014250000003"
                                                                class="apexcharts-marker no-pointer-events w7mgzm7x8"
                                                                stroke="#ffffff" fill="#1a56db" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9" rel="2"
                                                                j="2" index="0"
                                                                default-marker-size="5"></circle>
                                                        </g>
                                                        <g id="SvgjsG2944" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskmwk8b1pp)">
                                                            <circle id="SvgjsCircle2945" r="5"
                                                                cx="374.354944229126" cy="106.4096125000001"
                                                                class="apexcharts-marker no-pointer-events w9uj539h7"
                                                                stroke="#ffffff" fill="#1a56db" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9" rel="3"
                                                                j="3" index="0"
                                                                default-marker-size="5"></circle>
                                                        </g>
                                                        <g id="SvgjsG2946" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskmwk8b1pp)">
                                                            <circle id="SvgjsCircle2947" r="5"
                                                                cx="499.1399256388346" cy="172.43017499999996"
                                                                class="apexcharts-marker no-pointer-events wgbl6dj4yf"
                                                                stroke="#ffffff" fill="#1a56db" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9" rel="4"
                                                                j="4" index="0"
                                                                default-marker-size="5"></circle>
                                                        </g>
                                                        <g id="SvgjsG2948" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskmwk8b1pp)">
                                                            <circle id="SvgjsCircle2949" r="5"
                                                                cx="623.9249070485432" cy="211.26580000000013"
                                                                class="apexcharts-marker no-pointer-events we4302yy5"
                                                                stroke="#ffffff" fill="#1a56db" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9" rel="5"
                                                                j="5" index="0"
                                                                default-marker-size="5"></circle>
                                                        </g>
                                                        <g id="SvgjsG2950" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskmwk8b1pp)">
                                                            <circle id="SvgjsCircle2951" r="5"
                                                                cx="748.709888458252" cy="288.93705"
                                                                class="apexcharts-marker no-pointer-events w6xlgrexg"
                                                                stroke="#ffffff" fill="#1a56db" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9" rel="6"
                                                                j="6" index="0"
                                                                default-marker-size="5"></circle>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG2958" class="apexcharts-series"
                                                    seriesName="Revenuexxpreviousxperiodx" data:longestSeries="true"
                                                    rel="2" data:realIndex="1">
                                                    <path id="SvgjsPath2978"
                                                        d="M0 310.685L0 94.75892500000009C43.674743493398026 94.75892500000009 81.11023791631062 29.126718750000236 124.78498140970865 29.126718750000236C168.4597249031067 29.126718750000236 205.8952193260193 146.0219500000003 249.5699628194173 146.0219500000003C293.2447063128153 146.0219500000003 330.68020073572796 172.43017499999996 374.354944229126 172.43017499999996C418.029687722524 172.43017499999996 455.4651821454366 83.10823750000009 499.1399256388346 83.10823750000009C542.8146691322327 83.10823750000009 580.2501635551453 17.087675000000218 623.9249070485432 17.087675000000218C667.5996505419413 17.087675000000218 705.0351449648539 71.45755000000008 748.709888458252 71.45755000000008C748.709888458252 71.45755000000008 748.709888458252 71.45755000000008 748.709888458252 310.685M748.709888458252 71.45755000000008L748.709888458252 71.45755000000008 "
                                                        fill="url(#SvgjsLinearGradient2974)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-area" index="1"
                                                        clip-path="url(#gridRectMaskmwk8b1pp)"
                                                        pathTo="M 0 310.685L 0 94.75892500000009C 43.674743493398026 94.75892500000009 81.11023791631062 29.126718750000236 124.78498140970865 29.126718750000236C 168.4597249031067 29.126718750000236 205.8952193260193 146.0219500000003 249.5699628194173 146.0219500000003C 293.2447063128153 146.0219500000003 330.68020073572796 172.43017499999996 374.354944229126 172.43017499999996C 418.029687722524 172.43017499999996 455.4651821454366 83.10823750000009 499.1399256388346 83.10823750000009C 542.8146691322327 83.10823750000009 580.2501635551453 17.087675000000218 623.9249070485432 17.087675000000218C 667.5996505419413 17.087675000000218 705.0351449648539 71.45755000000008 748.709888458252 71.45755000000008C 748.709888458252 71.45755000000008 748.709888458252 71.45755000000008 748.709888458252 310.685M 748.709888458252 71.45755000000008z"
                                                        pathFrom="M 0 310.685L 0 94.75892500000009C 43.674743493398026 94.75892500000009 81.11023791631062 29.126718750000236 124.78498140970865 29.126718750000236C 168.4597249031067 29.126718750000236 205.8952193260193 146.0219500000003 249.5699628194173 146.0219500000003C 293.2447063128153 146.0219500000003 330.68020073572796 172.43017499999996 374.354944229126 172.43017499999996C 418.029687722524 172.43017499999996 455.4651821454366 83.10823750000009 499.1399256388346 83.10823750000009C 542.8146691322327 83.10823750000009 580.2501635551453 17.087675000000218 623.9249070485432 17.087675000000218C 667.5996505419413 17.087675000000218 705.0351449648539 71.45755000000008 748.709888458252 71.45755000000008C 748.709888458252 71.45755000000008 748.709888458252 71.45755000000008 748.709888458252 310.685M 748.709888458252 71.45755000000008z">
                                                    </path>
                                                    <path id="SvgjsPath2979"
                                                        d="M0 94.75892500000009C43.674743493398026 94.75892500000009 81.11023791631062 29.126718750000236 124.78498140970865 29.126718750000236C168.4597249031067 29.126718750000236 205.8952193260193 146.0219500000003 249.5699628194173 146.0219500000003C293.2447063128153 146.0219500000003 330.68020073572796 172.43017499999996 374.354944229126 172.43017499999996C418.029687722524 172.43017499999996 455.4651821454366 83.10823750000009 499.1399256388346 83.10823750000009C542.8146691322327 83.10823750000009 580.2501635551453 17.087675000000218 623.9249070485432 17.087675000000218C667.5996505419413 17.087675000000218 705.0351449648539 71.45755000000008 748.709888458252 71.45755000000008 "
                                                        fill="none" fill-opacity="1" stroke="#fdba8c"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="4"
                                                        stroke-dasharray="0" class="apexcharts-area" index="1"
                                                        clip-path="url(#gridRectMaskmwk8b1pp)"
                                                        pathTo="M 0 94.75892500000009C 43.674743493398026 94.75892500000009 81.11023791631062 29.126718750000236 124.78498140970865 29.126718750000236C 168.4597249031067 29.126718750000236 205.8952193260193 146.0219500000003 249.5699628194173 146.0219500000003C 293.2447063128153 146.0219500000003 330.68020073572796 172.43017499999996 374.354944229126 172.43017499999996C 418.029687722524 172.43017499999996 455.4651821454366 83.10823750000009 499.1399256388346 83.10823750000009C 542.8146691322327 83.10823750000009 580.2501635551453 17.087675000000218 623.9249070485432 17.087675000000218C 667.5996505419413 17.087675000000218 705.0351449648539 71.45755000000008 748.709888458252 71.45755000000008"
                                                        pathFrom="M 0 94.75892500000009C 43.674743493398026 94.75892500000009 81.11023791631062 29.126718750000236 124.78498140970865 29.126718750000236C 168.4597249031067 29.126718750000236 205.8952193260193 146.0219500000003 249.5699628194173 146.0219500000003C 293.2447063128153 146.0219500000003 330.68020073572796 172.43017499999996 374.354944229126 172.43017499999996C 418.029687722524 172.43017499999996 455.4651821454366 83.10823750000009 499.1399256388346 83.10823750000009C 542.8146691322327 83.10823750000009 580.2501635551453 17.087675000000218 623.9249070485432 17.087675000000218C 667.5996505419413 17.087675000000218 705.0351449648539 71.45755000000008 748.709888458252 71.45755000000008">
                                                    </path>
                                                    <g id="SvgjsG2959" class="apexcharts-series-markers-wrap"
                                                        data:realIndex="1">
                                                        <g id="SvgjsG2961" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskmwk8b1pp)">
                                                            <circle id="SvgjsCircle2962" r="5"
                                                                cx="0" cy="94.75892500000009"
                                                                class="apexcharts-marker no-pointer-events wkplwq357k"
                                                                stroke="#ffffff" fill="#fdba8c" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9" rel="0"
                                                                j="0" index="1"
                                                                default-marker-size="5"></circle>
                                                            <circle id="SvgjsCircle2963" r="5"
                                                                cx="124.78498140970865" cy="29.126718750000236"
                                                                class="apexcharts-marker no-pointer-events wtr5eqxga"
                                                                stroke="#ffffff" fill="#fdba8c" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9" rel="1"
                                                                j="1" index="1"
                                                                default-marker-size="5"></circle>
                                                        </g>
                                                        <g id="SvgjsG2964" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskmwk8b1pp)">
                                                            <circle id="SvgjsCircle2965" r="5"
                                                                cx="249.5699628194173" cy="146.0219500000003"
                                                                class="apexcharts-marker no-pointer-events wcx1bxpxb"
                                                                stroke="#ffffff" fill="#fdba8c" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9" rel="2"
                                                                j="2" index="1"
                                                                default-marker-size="5"></circle>
                                                        </g>
                                                        <g id="SvgjsG2966" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskmwk8b1pp)">
                                                            <circle id="SvgjsCircle2967" r="5"
                                                                cx="374.354944229126" cy="172.43017499999996"
                                                                class="apexcharts-marker no-pointer-events wkywr5j1a"
                                                                stroke="#ffffff" fill="#fdba8c" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9" rel="3"
                                                                j="3" index="1"
                                                                default-marker-size="5"></circle>
                                                        </g>
                                                        <g id="SvgjsG2968" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskmwk8b1pp)">
                                                            <circle id="SvgjsCircle2969" r="5"
                                                                cx="499.1399256388346" cy="83.10823750000009"
                                                                class="apexcharts-marker no-pointer-events wp2nxn2yk"
                                                                stroke="#ffffff" fill="#fdba8c" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9" rel="4"
                                                                j="4" index="1"
                                                                default-marker-size="5"></circle>
                                                        </g>
                                                        <g id="SvgjsG2970" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskmwk8b1pp)">
                                                            <circle id="SvgjsCircle2971" r="5"
                                                                cx="623.9249070485432" cy="17.087675000000218"
                                                                class="apexcharts-marker no-pointer-events wkjjpq59t"
                                                                stroke="#ffffff" fill="#fdba8c" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9" rel="5"
                                                                j="5" index="1"
                                                                default-marker-size="5"></circle>
                                                        </g>
                                                        <g id="SvgjsG2972" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskmwk8b1pp)">
                                                            <circle id="SvgjsCircle2973" r="5"
                                                                cx="748.709888458252" cy="71.45755000000008"
                                                                class="apexcharts-marker no-pointer-events w0pdn578g"
                                                                stroke="#ffffff" fill="#fdba8c" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9" rel="6"
                                                                j="6" index="1"
                                                                default-marker-size="5"></circle>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG2938" class="apexcharts-datalabels" data:realIndex="0">
                                                </g>
                                                <g id="SvgjsG2960" class="apexcharts-datalabels" data:realIndex="1">
                                                </g>
                                            </g>
                                            <line id="SvgjsLine3033" x1="0" y1="0"
                                                x2="748.709888458252" y2="0" stroke="#b6b6b6"
                                                stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine3034" x1="0" y1="0"
                                                x2="748.709888458252" y2="0" stroke-dasharray="0"
                                                stroke-width="0" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG3035" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG3036" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG3037" class="apexcharts-point-annotations"></g>
                                            <rect id="SvgjsRect3038" width="0" height="0" x="0"
                                                y="0" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"
                                                class="apexcharts-zoom-rect"></rect>
                                            <rect id="SvgjsRect3039" width="0" height="0" x="0"
                                                y="0" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"
                                                class="apexcharts-selection-rect"></rect>
                                        </g>
                                        <rect id="SvgjsRect2931" width="0" height="0" x="0"
                                            y="0" rx="0" ry="0" opacity="1"
                                            stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe">
                                        </rect>
                                        <g id="SvgjsG3004" class="apexcharts-yaxis" rel="0"
                                            transform="translate(40.80859375, 0)">
                                            <g id="SvgjsG3005" class="apexcharts-yaxis-texts-g"><text
                                                    id="SvgjsText3006" font-family="Inter, sans-serif" x="20"
                                                    y="31.4" text-anchor="end" dominant-baseline="auto"
                                                    font-size="14px" font-weight="500" fill="#6b7280"
                                                    class="apexcharts-text apexcharts-yaxis-label"
                                                    style="font-family: Inter, sans-serif;">
                                                    <tspan id="SvgjsTspan3007">$6800</tspan>
                                                    <title>$6800</title>
                                                </text><text id="SvgjsText3008" font-family="Inter, sans-serif"
                                                    x="20" y="109.07125" text-anchor="end"
                                                    dominant-baseline="auto" font-size="14px" font-weight="500"
                                                    fill="#6b7280" class="apexcharts-text apexcharts-yaxis-label"
                                                    style="font-family: Inter, sans-serif;">
                                                    <tspan id="SvgjsTspan3009">$6600</tspan>
                                                    <title>$6600</title>
                                                </text><text id="SvgjsText3010" font-family="Inter, sans-serif"
                                                    x="20" y="186.7425" text-anchor="end"
                                                    dominant-baseline="auto" font-size="14px" font-weight="500"
                                                    fill="#6b7280" class="apexcharts-text apexcharts-yaxis-label"
                                                    style="font-family: Inter, sans-serif;">
                                                    <tspan id="SvgjsTspan3011">$6400</tspan>
                                                    <title>$6400</title>
                                                </text><text id="SvgjsText3012" font-family="Inter, sans-serif"
                                                    x="20" y="264.41375" text-anchor="end"
                                                    dominant-baseline="auto" font-size="14px" font-weight="500"
                                                    fill="#6b7280" class="apexcharts-text apexcharts-yaxis-label"
                                                    style="font-family: Inter, sans-serif;">
                                                    <tspan id="SvgjsTspan3013">$6200</tspan>
                                                    <title>$6200</title>
                                                </text><text id="SvgjsText3014" font-family="Inter, sans-serif"
                                                    x="20" y="342.085" text-anchor="end"
                                                    dominant-baseline="auto" font-size="14px" font-weight="500"
                                                    fill="#6b7280" class="apexcharts-text apexcharts-yaxis-label"
                                                    style="font-family: Inter, sans-serif;">
                                                    <tspan id="SvgjsTspan3015">$6000</tspan>
                                                    <title>$6000</title>
                                                </text></g>
                                        </g>
                                        <g id="SvgjsG2928" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-tooltip apexcharts-theme-light"
                                        style="left: 309.472px; top: 87.1082px;">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: Inter, sans-serif; font-size: 14px;">05 Feb</div>
                                        <div class="apexcharts-tooltip-series-group apexcharts-active"
                                            style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(26, 86, 219);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Inter, sans-serif; font-size: 14px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label">Revenue: </span><span
                                                        class="apexcharts-tooltip-text-y-value">$6356</span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group apexcharts-active"
                                            style="order: 2; display: flex;"><span class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(253, 186, 140);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Inter, sans-serif; font-size: 14px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label">Revenue (previous
                                                        period): </span><span
                                                        class="apexcharts-tooltip-text-y-value">$6586</span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"
                                        style="left: 556.306px; top: 342.685px;">
                                        <div class="apexcharts-xaxistooltip-text"
                                            style="font-family: Inter, sans-serif; font-size: 12px; min-width: 52.2954px;">
                                            05 Feb</div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div
                                class="mt-4 flex items-center justify-between border-t border-gray-200 pt-3 dark:border-gray-700 sm:pt-6">
                                <div>
                                    <button
                                        class="inline-flex items-center rounded-lg p-2 text-center text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                                        type="button" data-dropdown-toggle="weekly-sales-dropdown">Last 7 days <svg
                                            class="ml-2 h-4 w-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg></button>
                                    <!-- Dropdown menu -->
                                    <div class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded bg-white text-base shadow dark:divide-gray-600 dark:bg-gray-700"
                                        id="weekly-sales-dropdown"
                                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(355px, 707.5px);"
                                        data-popper-placement="bottom">
                                        <div class="px-4 py-3" role="none">
                                            <p class="truncate text-sm font-medium text-gray-900 dark:text-white"
                                                role="none">
                                                Sep 16, 2021 - Sep 22, 2021
                                            </p>
                                        </div>
                                        <ul class="py-1" role="none">
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    role="menuitem">Yesterday</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    role="menuitem">Today</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    role="menuitem">Last 7 days</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    role="menuitem">Last 30 days</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    role="menuitem">Last 90 days</a>
                                            </li>
                                        </ul>
                                        <div class="py-1" role="none">
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                                role="menuitem">Custom...</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="#"
                                        class="text-primary-700 dark:text-primary-500 inline-flex items-center rounded-lg p-2 text-xs font-medium uppercase hover:bg-gray-100 dark:hover:bg-gray-700 sm:text-sm">
                                        Sales Report
                                        <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--Tabs widget -->
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                            <h3 class="mb-4 flex items-center text-lg font-semibold text-gray-900 dark:text-white">
                                Statistics this month
                                <button data-popover-target="popover-description" data-popover-placement="bottom-end"
                                    type="button"><svg class="ml-2 h-4 w-4 text-gray-400 hover:text-gray-500"
                                        aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd"></path>
                                    </svg><span class="sr-only">Show information</span></button>
                            </h3>
                            <div data-popover="" id="popover-description" role="tooltip"
                                class="invisible absolute z-10 inline-block w-72 rounded-lg border border-gray-200 bg-white text-sm font-light text-gray-500 opacity-0 shadow-sm transition-opacity duration-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400"
                                style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-242.5px, 81.25px);"
                                data-popper-placement="bottom-end">
                                <div class="space-y-2 p-3">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Statistics</h3>
                                    <p>Statistics is a branch of applied mathematics that involves the collection,
                                        description, analysis, and inference of conclusions from quantitative data.</p>
                                    <a href="#"
                                        class="text-primary-600 dark:text-primary-500 dark:hover:text-primary-600 hover:text-primary-700 flex items-center font-medium">Read
                                        more <svg class="ml-1 h-4 w-4" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg></a>
                                </div>
                                <div data-popper-arrow=""
                                    style="position: absolute; left: 0px; transform: translate(270px, 0px);"></div>
                            </div>
                            <div class="sm:hidden">
                                <label for="tabs" class="sr-only">Select tab</label>
                                <select id="tabs"
                                    class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-t-lg border-0 border-b border-gray-200 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
                                    <option>Statistics</option>
                                    <option>Services</option>
                                    <option>FAQ</option>
                                </select>
                            </div>
                            <ul class="hidden divide-x divide-gray-200 rounded-lg text-center text-sm font-medium text-gray-500 dark:divide-gray-600 dark:text-gray-400 sm:flex"
                                id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                                <li class="w-full">
                                    <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab"
                                        aria-controls="faq" aria-selected="true"
                                        class="inline-block w-full rounded-tl-lg border-blue-600 bg-gray-50 p-4 text-blue-600 hover:bg-gray-100 hover:text-blue-600 focus:outline-none dark:border-blue-500 dark:bg-gray-700 dark:text-blue-500 dark:hover:bg-gray-600 dark:hover:text-blue-500">Top
                                        products</button>
                                </li>
                                <li class="w-full">
                                    <button id="about-tab" data-tabs-target="#about" type="button" role="tab"
                                        aria-controls="about" aria-selected="false"
                                        class="inline-block w-full rounded-tr-lg border-gray-100 bg-gray-50 p-4 text-gray-500 hover:border-gray-300 hover:bg-gray-100 hover:text-gray-600 focus:outline-none dark:border-gray-700 dark:border-transparent dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-gray-300">Top
                                        Customers</button>
                                </li>
                            </ul>
                            <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                                <div class="pt-4" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center justify-between">
                                                <div class="flex min-w-0 items-center">
                                                    <img class="h-10 w-10 flex-shrink-0"
                                                        src="https://flowbite-admin-dashboard.vercel.app/images/products/iphone.png"
                                                        alt="imac image">
                                                    <div class="ml-3">
                                                        <p class="truncate font-medium text-gray-900 dark:text-white">
                                                            iPhone 14 Pro
                                                        </p>
                                                        <div
                                                            class="flex flex-1 items-center justify-end text-sm text-green-500 dark:text-green-400">
                                                            <svg class="h-4 w-4" fill="currentColor"
                                                                viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                aria-hidden="true">
                                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                                    d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z">
                                                                </path>
                                                            </svg>
                                                            2.5%
                                                            <span class="ml-2 text-gray-500">vs last month</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    $445,467
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center justify-between">
                                                <div class="flex min-w-0 items-center">
                                                    <img class="h-10 w-10 flex-shrink-0"
                                                        src="https://flowbite-admin-dashboard.vercel.app/images/products/imac.png"
                                                        alt="imac image">
                                                    <div class="ml-3">
                                                        <p class="truncate font-medium text-gray-900 dark:text-white">
                                                            Apple iMac 27"
                                                        </p>
                                                        <div
                                                            class="flex flex-1 items-center justify-end text-sm text-green-500 dark:text-green-400">
                                                            <svg class="h-4 w-4" fill="currentColor"
                                                                viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                aria-hidden="true">
                                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                                    d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z">
                                                                </path>
                                                            </svg>
                                                            12.5%
                                                            <span class="ml-2 text-gray-500">vs last month</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    $256,982
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center justify-between">
                                                <div class="flex min-w-0 items-center">
                                                    <img class="h-10 w-10 flex-shrink-0"
                                                        src="https://flowbite-admin-dashboard.vercel.app/images/products/watch.png"
                                                        alt="watch image">
                                                    <div class="ml-3">
                                                        <p class="truncate font-medium text-gray-900 dark:text-white">
                                                            Apple Watch SE
                                                        </p>
                                                        <div
                                                            class="flex flex-1 items-center justify-end text-sm text-red-600 dark:text-red-500">
                                                            <svg class="h-4 w-4" fill="currentColor"
                                                                viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                aria-hidden="true">
                                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                                    d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z">
                                                                </path>
                                                            </svg>
                                                            1.35%
                                                            <span class="ml-2 text-gray-500">vs last month</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    $201,869
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center justify-between">
                                                <div class="flex min-w-0 items-center">
                                                    <img class="h-10 w-10 flex-shrink-0"
                                                        src="https://flowbite-admin-dashboard.vercel.app/images/products/ipad.png"
                                                        alt="ipad image">
                                                    <div class="ml-3">
                                                        <p class="truncate font-medium text-gray-900 dark:text-white">
                                                            Apple iPad Air
                                                        </p>
                                                        <div
                                                            class="flex flex-1 items-center justify-end text-sm text-green-500 dark:text-green-400">
                                                            <svg class="h-4 w-4" fill="currentColor"
                                                                viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                aria-hidden="true">
                                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                                    d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z">
                                                                </path>
                                                            </svg>
                                                            12.5%
                                                            <span class="ml-2 text-gray-500">vs last month</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    $103,967
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center justify-between">
                                                <div class="flex min-w-0 items-center">
                                                    <img class="h-10 w-10 flex-shrink-0"
                                                        src="https://flowbite-admin-dashboard.vercel.app/images/products/imac.png"
                                                        alt="imac image">
                                                    <div class="ml-3">
                                                        <p class="truncate font-medium text-gray-900 dark:text-white">
                                                            Apple iMac 24"
                                                        </p>
                                                        <div
                                                            class="flex flex-1 items-center justify-end text-sm text-red-600 dark:text-red-500">
                                                            <svg class="h-4 w-4" fill="currentColor"
                                                                viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                aria-hidden="true">
                                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                                    d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z">
                                                                </path>
                                                            </svg>
                                                            2%
                                                            <span class="ml-2 text-gray-500">vs last month</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    $98,543
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="hidden pt-4" id="about" role="tabpanel"
                                    aria-labelledby="about-tab">
                                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0">
                                                    <img class="h-8 w-8 rounded-full"
                                                        src="https://flowbite-admin-dashboard.vercel.app/images/users/neil-sims.png"
                                                        alt="Neil image">
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <p class="truncate font-medium text-gray-900 dark:text-white">
                                                        Neil Sims
                                                    </p>
                                                    <p class="truncate text-sm text-gray-500 dark:text-gray-400">
                                                        email@flowbite.com
                                                    </p>
                                                </div>
                                                <div
                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    $3320
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0">
                                                    <img class="h-8 w-8 rounded-full"
                                                        src="https://flowbite-admin-dashboard.vercel.app/images/users/bonnie-green.png"
                                                        alt="Neil image">
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <p class="truncate font-medium text-gray-900 dark:text-white">
                                                        Bonnie Green
                                                    </p>
                                                    <p class="truncate text-sm text-gray-500 dark:text-gray-400">
                                                        email@flowbite.com
                                                    </p>
                                                </div>
                                                <div
                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    $2467
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0">
                                                    <img class="h-8 w-8 rounded-full"
                                                        src="https://flowbite-admin-dashboard.vercel.app/images/users/michael-gough.png"
                                                        alt="Neil image">
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <p class="truncate font-medium text-gray-900 dark:text-white">
                                                        Michael Gough
                                                    </p>
                                                    <p class="truncate text-sm text-gray-500 dark:text-gray-400">
                                                        email@flowbite.com
                                                    </p>
                                                </div>
                                                <div
                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    $2235
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0">
                                                    <img class="h-8 w-8 rounded-full"
                                                        src="https://flowbite-admin-dashboard.vercel.app/images/users/thomas-lean.png"
                                                        alt="Neil image">
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <p class="truncate font-medium text-gray-900 dark:text-white">
                                                        Thomes Lean
                                                    </p>
                                                    <p class="truncate text-sm text-gray-500 dark:text-gray-400">
                                                        email@flowbite.com
                                                    </p>
                                                </div>
                                                <div
                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    $1842
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0">
                                                    <img class="h-8 w-8 rounded-full"
                                                        src="https://flowbite-admin-dashboard.vercel.app/images/users/lana-byrd.png"
                                                        alt="Neil image">
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <p class="truncate font-medium text-gray-900 dark:text-white">
                                                        Lana Byrd
                                                    </p>
                                                    <p class="truncate text-sm text-gray-500 dark:text-gray-400">
                                                        email@flowbite.com
                                                    </p>
                                                </div>
                                                <div
                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    $1044
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div
                                class="mt-5 flex items-center justify-between border-t border-gray-200 pt-3 dark:border-gray-700 sm:pt-6">
                                <div>
                                    <button
                                        class="inline-flex items-center rounded-lg p-2 text-center text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                                        type="button" data-dropdown-toggle="stats-dropdown">Last 7 days <svg
                                            class="ml-2 h-4 w-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg></button>
                                    <!-- Dropdown menu -->
                                    <div class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded bg-white text-base shadow dark:divide-gray-600 dark:bg-gray-700"
                                        id="stats-dropdown"
                                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(1297.5px, 702.5px);"
                                        data-popper-placement="bottom">
                                        <div class="px-4 py-3" role="none">
                                            <p class="truncate text-sm font-medium text-gray-900 dark:text-white"
                                                role="none">
                                                Sep 16, 2021 - Sep 22, 2021
                                            </p>
                                        </div>
                                        <ul class="py-1" role="none">
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    role="menuitem">Yesterday</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    role="menuitem">Today</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    role="menuitem">Last 7 days</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    role="menuitem">Last 30 days</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    role="menuitem">Last 90 days</a>
                                            </li>
                                        </ul>
                                        <div class="py-1" role="none">
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                                role="menuitem">Custom...</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="#"
                                        class="text-primary-700 dark:text-primary-500 inline-flex items-center rounded-lg p-2 text-xs font-medium uppercase hover:bg-gray-100 dark:hover:bg-gray-700 sm:text-sm">
                                        Full Report
                                        <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
