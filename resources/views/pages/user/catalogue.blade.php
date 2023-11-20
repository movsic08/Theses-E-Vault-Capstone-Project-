<x-app-layout>
    @section('title', 'Catologue')
    <section class="container">
        <div class="p-2">
            <h2 class="text-[1.2rem] font-semibold text-primary-color">Document Types</h2>
            <section
                class="grid w-full grid-cols-1 justify-between gap-2 overflow-x-auto md:grid-cols-2 md:flex-row md:gap-4 lg:grid-cols-4 lg:gap-8 xl:grid-cols-4">
                @foreach ($document_types as $index => $itemDocumentType)
                    @php

                        $bgColors = ['bg-[#78DFFF]', 'bg-[#FFB6F3]', 'bg-[#2DA4CA]', 'bg-[#A7D0DD]'];
                        $itemCount = \App\Models\DocuPost::where('document_type', $itemDocumentType)->count();
                        $svgs = [
                            '<svg viewBox="0 0 377 123" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_1620_218)">
              <path
            d="M0 -0.836672L4.09996 16.66C11.0617 23.5398 25.116 37.2995 38.9871 41.8958C52.9366 46.375 82.0971 26.6214 95.9682 37.9804C109.918 49.4565 117.086 58.7689 130.957 70.245C144.906 81.604 153.629 100.165 167.5 90.8844C181.45 81.7211 195.504 54.2019 209.375 49.6055C223.325 45.1264 237.379 63.2773 251.25 72.5578C265.2 81.7211 279.254 95.4807 293.125 95.4807C307.075 95.4807 321.129 81.7211 335 70.245C348.95 58.886 363.004 49.5177 376.875 49.6055C390.825 49.5177 404.879 58.886 418.75 61.0817C432.7 63.2774 446.754 58.886 460.625 45.0385C474.575 31.3667 488.629 8.23883 502.5 6.04314C516.45 3.84746 530.504 21.9985 544.375 26.6826C558.325 31.3667 572.379 21.9985 586.25 33.5624C600.2 45.1264 614.254 77.037 628.125 74.8413C642.075 72.6456 656.129 35.7581 670 15.2065C683.95 -5.5208 698.004 -9.91217 711.875 -10C725.825 -9.91217 739.879 -5.5208 753.75 8.32666C767.7 21.9985 781.754 45.1263 795.625 51.9183C809.575 58.886 823.629 49.5177 837.5 56.4854C851.45 63.2774 865.504 86.4052 879.375 81.7211C893.325 77.037 907.379 45.1264 921.25 42.7257C935.2 40.4422 949.254 67.9615 963.125 77.1248C977.075 86.4052 991.129 77.037 997.934 72.5578L1005 67.9615V123H998.012C991.05 123 976.996 123 963.125 123C949.175 123 935.121 123 921.25 123C907.3 123 893.246 123 879.375 123C865.425 123 851.371 123 837.5 123C823.55 123 809.496 123 795.625 123C781.675 123 767.621 123 753.75 123C739.8 123 725.746 123 711.875 123C697.925 123 683.871 123 670 123C656.05 123 641.996 123 628.125 123C614.175 123 600.121 123 586.25 123C572.3 123 558.246 123 544.375 123C530.425 123 516.371 123 502.5 123C488.55 123 474.496 123 460.625 123C446.675 123 432.621 123 418.75 123C404.8 123 390.746 123 376.875 123C362.925 123 348.871 123 335 123C321.05 123 306.996 123 293.125 123C279.175 123 265.121 123 251.25 123C237.3 123 223.246 123 209.375 123C195.425 123 181.371 123 167.5 123C153.55 123 139.496 123 125.625 123C111.675 123 97.6211 123 83.75 123C69.8004 123 55.7461 123 41.875 123C27.9254 123 13.8711 123 7.06641 123H0V-0.836672Z"
            fill="url(#paint0_linear_1620_218)" />
         <path opacity="0.9"
            d="M0 96.8L6.98789 83.7C13.9496 70.6 28.0039 44.4 41.875 44.4C55.8246 44.4 69.8789 70.6 83.75 81.526C97.6996 92.3404 111.754 88.1596 125.625 77.15C139.575 66.1404 153.629 48.8596 167.5 44.4C181.45 39.9404 195.504 48.8596 209.375 57.5C223.325 66.1404 237.379 75.0596 251.25 81.526C265.2 88.1596 279.254 92.3404 293.125 96.8C307.075 101.26 321.129 105.44 335 94.626C348.95 83.7 363.004 57.5 376.875 42.226C390.825 26.8404 404.879 22.6596 418.75 18.2C432.7 13.7404 446.754 9.55957 460.625 16.026C474.575 22.6596 488.629 39.9404 502.5 40.024C516.45 39.9404 530.504 22.6596 544.375 11.65C558.325 0.640427 572.379 -3.54043 586.25 9.47596C600.2 22.6596 614.254 53.0404 628.125 57.5C642.075 61.9596 656.129 39.9404 670 24.75C683.95 9.55957 698.004 0.640428 711.875 13.824C725.825 26.8404 739.879 61.9596 753.75 61.876C767.7 61.9596 781.754 26.8404 795.625 11.65C809.575 -3.54042 823.629 0.640426 837.5 0.724043C851.45 0.640426 865.504 -3.54042 879.375 2.92596C893.325 9.55958 907.379 26.8404 921.25 40.024C935.2 53.0404 949.254 61.9596 963.125 53.124C977.075 44.4 991.129 18.2 997.934 5.1L1005 -8V123H998.012C991.05 123 976.996 123 963.125 123C949.175 123 935.121 123 921.25 123C907.3 123 893.246 123 879.375 123C865.425 123 851.371 123 837.5 123C823.55 123 809.496 123 795.625 123C781.675 123 767.621 123 753.75 123C739.8 123 725.746 123 711.875 123C697.925 123 683.871 123 670 123C656.05 123 641.996 123 628.125 123C614.175 123 600.121 123 586.25 123C572.3 123 558.246 123 544.375 123C530.425 123 516.371 123 502.5 123C488.55 123 474.496 123 460.625 123C446.675 123 432.621 123 418.75 123C404.8 123 390.746 123 376.875 123C362.925 123 348.871 123 335 123C321.05 123 306.996 123 293.125 123C279.175 123 265.121 123 251.25 123C237.3 123 223.246 123 209.375 123C195.425 123 181.371 123 167.5 123C153.55 123 139.496 123 125.625 123C111.675 123 97.6211 123 83.75 123C69.8004 123 55.7461 123 41.875 123C27.9254 123 13.8711 123 7.06641 123H0V96.8Z"
            fill="url(#paint1_linear_1620_218)" />
            </g>
            <defs>
            <linearGradient id="paint0_linear_1620_218" x1="0" y1="139.221" x2="0" y2="6.22064"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#3E67F3" />
            <stop offset="1" stop-color="#0BADFF" />
         </linearGradient>
         <linearGradient id="paint1_linear_1620_218" x1="0" y1="123" x2="0" y2="-8" gradientUnits="userSpaceOnUse">
            <stop stop-color="#3E6DF3" />
            <stop offset="1" stop-color="#0BEFFF" />
            </linearGradient>
         <clipPath id="clip0_1620_218">
            <path d="M0 0H377V103C377 114.046 368.046 123 357 123H20C8.95431 123 0 114.046 0 103V0Z" fill="white" />
            </clipPath>
            </defs>
         </svg>
',
                            '<svg viewBox="0 0 377 123" fill="none" xmlns="http://www.w3.org/2000/svg">
             <g clip-path="url(#clip0_1620_257)">
         <path
            d="M0 -0.836672L4.09996 16.66C11.0617 23.5398 25.116 37.2995 38.9871 41.8958C52.9366 46.375 82.0971 26.6214 95.9682 37.9804C109.918 49.4565 117.086 58.7689 130.957 70.245C144.906 81.604 153.629 100.165 167.5 90.8844C181.45 81.7211 195.504 54.2019 209.375 49.6055C223.325 45.1264 237.379 63.2773 251.25 72.5578C265.2 81.7211 279.254 95.4807 293.125 95.4807C307.075 95.4807 321.129 81.7211 335 70.245C348.95 58.886 363.004 49.5177 376.875 49.6055C390.825 49.5177 404.879 58.886 418.75 61.0817C432.7 63.2774 446.754 58.886 460.625 45.0385C474.575 31.3667 488.629 8.23883 502.5 6.04314C516.45 3.84746 530.504 21.9985 544.375 26.6826C558.325 31.3667 572.379 21.9985 586.25 33.5624C600.2 45.1264 614.254 77.037 628.125 74.8413C642.075 72.6456 656.129 35.7581 670 15.2065C683.95 -5.5208 698.004 -9.91217 711.875 -10C725.825 -9.91217 739.879 -5.5208 753.75 8.32666C767.7 21.9985 781.754 45.1263 795.625 51.9183C809.575 58.886 823.629 49.5177 837.5 56.4854C851.45 63.2774 865.504 86.4052 879.375 81.7211C893.325 77.037 907.379 45.1264 921.25 42.7257C935.2 40.4422 949.254 67.9615 963.125 77.1248C977.075 86.4052 991.129 77.037 997.934 72.5578L1005 67.9615V123H998.012C991.05 123 976.996 123 963.125 123C949.175 123 935.121 123 921.25 123C907.3 123 893.246 123 879.375 123C865.425 123 851.371 123 837.5 123C823.55 123 809.496 123 795.625 123C781.675 123 767.621 123 753.75 123C739.8 123 725.746 123 711.875 123C697.925 123 683.871 123 670 123C656.05 123 641.996 123 628.125 123C614.175 123 600.121 123 586.25 123C572.3 123 558.246 123 544.375 123C530.425 123 516.371 123 502.5 123C488.55 123 474.496 123 460.625 123C446.675 123 432.621 123 418.75 123C404.8 123 390.746 123 376.875 123C362.925 123 348.871 123 335 123C321.05 123 306.996 123 293.125 123C279.175 123 265.121 123 251.25 123C237.3 123 223.246 123 209.375 123C195.425 123 181.371 123 167.5 123C153.55 123 139.496 123 125.625 123C111.675 123 97.6211 123 83.75 123C69.8004 123 55.7461 123 41.875 123C27.9254 123 13.8711 123 7.06641 123H0V-0.836672Z"
            fill="url(#paint0_linear_1620_257)" />
            <path opacity="0.9"
            d="M0 96.8L6.98789 83.7C13.9496 70.6 28.0039 44.4 41.875 44.4C55.8246 44.4 69.8789 70.6 83.75 81.526C97.6996 92.3404 111.754 88.1596 125.625 77.15C139.575 66.1404 153.629 48.8596 167.5 44.4C181.45 39.9404 195.504 48.8596 209.375 57.5C223.325 66.1404 237.379 75.0596 251.25 81.526C265.2 88.1596 279.254 92.3404 293.125 96.8C307.075 101.26 321.129 105.44 335 94.626C348.95 83.7 363.004 57.5 376.875 42.226C390.825 26.8404 404.879 22.6596 418.75 18.2C432.7 13.7404 446.754 9.55957 460.625 16.026C474.575 22.6596 488.629 39.9404 502.5 40.024C516.45 39.9404 530.504 22.6596 544.375 11.65C558.325 0.640426 572.379 -3.54043 586.25 9.47596C600.2 22.6596 614.254 53.0404 628.125 57.5C642.075 61.9596 656.129 39.9404 670 24.75C683.95 9.55958 698.004 0.640427 711.875 13.824C725.825 26.8404 739.879 61.9596 753.75 61.876C767.7 61.9596 781.754 26.8404 795.625 11.65C809.575 -3.54043 823.629 0.640426 837.5 0.724043C851.45 0.640426 865.504 -3.54043 879.375 2.92596C893.325 9.55958 907.379 26.8404 921.25 40.024C935.2 53.0404 949.254 61.9596 963.125 53.124C977.075 44.4 991.129 18.2 997.934 5.1L1005 -8V123H998.012C991.05 123 976.996 123 963.125 123C949.175 123 935.121 123 921.25 123C907.3 123 893.246 123 879.375 123C865.425 123 851.371 123 837.5 123C823.55 123 809.496 123 795.625 123C781.675 123 767.621 123 753.75 123C739.8 123 725.746 123 711.875 123C697.925 123 683.871 123 670 123C656.05 123 641.996 123 628.125 123C614.175 123 600.121 123 586.25 123C572.3 123 558.246 123 544.375 123C530.425 123 516.371 123 502.5 123C488.55 123 474.496 123 460.625 123C446.675 123 432.621 123 418.75 123C404.8 123 390.746 123 376.875 123C362.925 123 348.871 123 335 123C321.05 123 306.996 123 293.125 123C279.175 123 265.121 123 251.25 123C237.3 123 223.246 123 209.375 123C195.425 123 181.371 123 167.5 123C153.55 123 139.496 123 125.625 123C111.675 123 97.6211 123 83.75 123C69.8004 123 55.7461 123 41.875 123C27.9254 123 13.8711 123 7.06641 123H0V96.8Z"
            fill="url(#paint1_linear_1620_257)" />
         
            </g>
        <defs>
        <linearGradient id="paint0_linear_1620_257" x1="0" y1="139.221" x2="0" y2="6.22064"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#9A41E0" />
            <stop offset="1" stop-color="#F8B5FE" />
        </linearGradient>
        <linearGradient id="paint1_linear_1620_257" x1="0" y1="123" x2="0" y2="-8" gradientUnits="userSpaceOnUse">
            <stop stop-color="#AB5DD7" />
            <stop offset="1" stop-color="#FEBAF7" />
        </linearGradient>
        <clipPath id="clip0_1620_257">
            <path d="M0 0H377V103C377 114.046 368.046 123 357 123H20C8.95431 123 0 114.046 0 103V0Z" fill="white" />
        </clipPath>
    </defs>
</svg>
',
                            '<svg viewBox="0 0 377 123" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g clip-path="url(#clip0_1620_268)">
        <path
            d="M0 -0.836672L4.09996 16.66C11.0617 23.5398 25.116 37.2995 38.9871 41.8958C52.9366 46.375 82.0971 26.6214 95.9682 37.9804C109.918 49.4565 117.086 58.7689 130.957 70.245C144.906 81.604 153.629 100.165 167.5 90.8844C181.45 81.7211 195.504 54.2019 209.375 49.6055C223.325 45.1264 237.379 63.2773 251.25 72.5578C265.2 81.7211 279.254 95.4807 293.125 95.4807C307.075 95.4807 321.129 81.7211 335 70.245C348.95 58.886 363.004 49.5177 376.875 49.6055C390.825 49.5177 404.879 58.886 418.75 61.0817C432.7 63.2774 446.754 58.886 460.625 45.0385C474.575 31.3667 488.629 8.23883 502.5 6.04314C516.45 3.84746 530.504 21.9985 544.375 26.6826C558.325 31.3667 572.379 21.9985 586.25 33.5624C600.2 45.1264 614.254 77.037 628.125 74.8413C642.075 72.6456 656.129 35.7581 670 15.2065C683.95 -5.5208 698.004 -9.91217 711.875 -10C725.825 -9.91217 739.879 -5.5208 753.75 8.32666C767.7 21.9985 781.754 45.1263 795.625 51.9183C809.575 58.886 823.629 49.5177 837.5 56.4854C851.45 63.2774 865.504 86.4052 879.375 81.7211C893.325 77.037 907.379 45.1264 921.25 42.7257C935.2 40.4422 949.254 67.9615 963.125 77.1248C977.075 86.4052 991.129 77.037 997.934 72.5578L1005 67.9615V123H998.012C991.05 123 976.996 123 963.125 123C949.175 123 935.121 123 921.25 123C907.3 123 893.246 123 879.375 123C865.425 123 851.371 123 837.5 123C823.55 123 809.496 123 795.625 123C781.675 123 767.621 123 753.75 123C739.8 123 725.746 123 711.875 123C697.925 123 683.871 123 670 123C656.05 123 641.996 123 628.125 123C614.175 123 600.121 123 586.25 123C572.3 123 558.246 123 544.375 123C530.425 123 516.371 123 502.5 123C488.55 123 474.496 123 460.625 123C446.675 123 432.621 123 418.75 123C404.8 123 390.746 123 376.875 123C362.925 123 348.871 123 335 123C321.05 123 306.996 123 293.125 123C279.175 123 265.121 123 251.25 123C237.3 123 223.246 123 209.375 123C195.425 123 181.371 123 167.5 123C153.55 123 139.496 123 125.625 123C111.675 123 97.6211 123 83.75 123C69.8004 123 55.7461 123 41.875 123C27.9254 123 13.8711 123 7.06641 123H0V-0.836672Z"
            fill="url(#paint0_linear_1620_268)" />
        <path opacity="0.9"
            d="M0 96.8L6.98789 83.7C13.9496 70.6 28.0039 44.4 41.875 44.4C55.8246 44.4 69.8789 70.6 83.75 81.526C97.6996 92.3404 111.754 88.1596 125.625 77.15C139.575 66.1404 153.629 48.8596 167.5 44.4C181.45 39.9404 195.504 48.8596 209.375 57.5C223.325 66.1404 237.379 75.0596 251.25 81.526C265.2 88.1596 279.254 92.3404 293.125 96.8C307.075 101.26 321.129 105.44 335 94.626C348.95 83.7 363.004 57.5 376.875 42.226C390.825 26.8404 404.879 22.6596 418.75 18.2C432.7 13.7404 446.754 9.55957 460.625 16.026C474.575 22.6596 488.629 39.9404 502.5 40.024C516.45 39.9404 530.504 22.6596 544.375 11.65C558.325 0.640426 572.379 -3.54043 586.25 9.47596C600.2 22.6596 614.254 53.0404 628.125 57.5C642.075 61.9596 656.129 39.9404 670 24.75C683.95 9.55958 698.004 0.640427 711.875 13.824C725.825 26.8404 739.879 61.9596 753.75 61.876C767.7 61.9596 781.754 26.8404 795.625 11.65C809.575 -3.54043 823.629 0.640426 837.5 0.724043C851.45 0.640426 865.504 -3.54043 879.375 2.92596C893.325 9.55958 907.379 26.8404 921.25 40.024C935.2 53.0404 949.254 61.9596 963.125 53.124C977.075 44.4 991.129 18.2 997.934 5.1L1005 -8V123H998.012C991.05 123 976.996 123 963.125 123C949.175 123 935.121 123 921.25 123C907.3 123 893.246 123 879.375 123C865.425 123 851.371 123 837.5 123C823.55 123 809.496 123 795.625 123C781.675 123 767.621 123 753.75 123C739.8 123 725.746 123 711.875 123C697.925 123 683.871 123 670 123C656.05 123 641.996 123 628.125 123C614.175 123 600.121 123 586.25 123C572.3 123 558.246 123 544.375 123C530.425 123 516.371 123 502.5 123C488.55 123 474.496 123 460.625 123C446.675 123 432.621 123 418.75 123C404.8 123 390.746 123 376.875 123C362.925 123 348.871 123 335 123C321.05 123 306.996 123 293.125 123C279.175 123 265.121 123 251.25 123C237.3 123 223.246 123 209.375 123C195.425 123 181.371 123 167.5 123C153.55 123 139.496 123 125.625 123C111.675 123 97.6211 123 83.75 123C69.8004 123 55.7461 123 41.875 123C27.9254 123 13.8711 123 7.06641 123H0V96.8Z"
            fill="url(#paint1_linear_1620_268)" />
    </g>
    <defs>
        <linearGradient id="paint0_linear_1620_268" x1="0" y1="139.221" x2="0" y2="6.22064"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#1F6378" />
            <stop offset="1" stop-color="#00E0FF" />
        </linearGradient>
        <linearGradient id="paint1_linear_1620_268" x1="0" y1="123" x2="0" y2="-8" gradientUnits="userSpaceOnUse">
            <stop stop-color="#048DAB" />
            <stop offset="1" stop-color="#00E6F6" />
        </linearGradient>
        <clipPath id="clip0_1620_268">
            <path d="M0 0H377V103C377 114.046 368.046 123 357 123H20C8.95431 123 0 114.046 0 103V0Z" fill="white" />
        </clipPath>
    </defs>
</svg>
',
                            '<svg viewBox="0 0 377 123" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g clip-path="url(#clip0_1620_279)">
        <path
            d="M0 -0.836672L4.09996 16.66C11.0617 23.5398 25.116 37.2995 38.9871 41.8958C52.9366 46.375 82.0971 26.6214 95.9682 37.9804C109.918 49.4565 117.086 58.7689 130.957 70.245C144.906 81.604 153.629 100.165 167.5 90.8844C181.45 81.7211 195.504 54.2019 209.375 49.6055C223.325 45.1264 237.379 63.2773 251.25 72.5578C265.2 81.7211 279.254 95.4807 293.125 95.4807C307.075 95.4807 321.129 81.7211 335 70.245C348.95 58.886 363.004 49.5177 376.875 49.6055C390.825 49.5177 404.879 58.886 418.75 61.0817C432.7 63.2774 446.754 58.886 460.625 45.0385C474.575 31.3667 488.629 8.23883 502.5 6.04314C516.45 3.84746 530.504 21.9985 544.375 26.6826C558.325 31.3667 572.379 21.9985 586.25 33.5624C600.2 45.1264 614.254 77.037 628.125 74.8413C642.075 72.6456 656.129 35.7581 670 15.2065C683.95 -5.5208 698.004 -9.91217 711.875 -10C725.825 -9.91217 739.879 -5.5208 753.75 8.32666C767.7 21.9985 781.754 45.1263 795.625 51.9183C809.575 58.886 823.629 49.5177 837.5 56.4854C851.45 63.2774 865.504 86.4052 879.375 81.7211C893.325 77.037 907.379 45.1264 921.25 42.7257C935.2 40.4422 949.254 67.9615 963.125 77.1248C977.075 86.4052 991.129 77.037 997.934 72.5578L1005 67.9615V123H998.012C991.05 123 976.996 123 963.125 123C949.175 123 935.121 123 921.25 123C907.3 123 893.246 123 879.375 123C865.425 123 851.371 123 837.5 123C823.55 123 809.496 123 795.625 123C781.675 123 767.621 123 753.75 123C739.8 123 725.746 123 711.875 123C697.925 123 683.871 123 670 123C656.05 123 641.996 123 628.125 123C614.175 123 600.121 123 586.25 123C572.3 123 558.246 123 544.375 123C530.425 123 516.371 123 502.5 123C488.55 123 474.496 123 460.625 123C446.675 123 432.621 123 418.75 123C404.8 123 390.746 123 376.875 123C362.925 123 348.871 123 335 123C321.05 123 306.996 123 293.125 123C279.175 123 265.121 123 251.25 123C237.3 123 223.246 123 209.375 123C195.425 123 181.371 123 167.5 123C153.55 123 139.496 123 125.625 123C111.675 123 97.6211 123 83.75 123C69.8004 123 55.7461 123 41.875 123C27.9254 123 13.8711 123 7.06641 123H0V-0.836672Z"
            fill="url(#paint0_linear_1620_279)" />
        <path opacity="0.9"
            d="M0 96.8L6.98789 83.7C13.9496 70.6 28.0039 44.4 41.875 44.4C55.8246 44.4 69.8789 70.6 83.75 81.526C97.6996 92.3404 111.754 88.1596 125.625 77.15C139.575 66.1404 153.629 48.8596 167.5 44.4C181.45 39.9404 195.504 48.8596 209.375 57.5C223.325 66.1404 237.379 75.0596 251.25 81.526C265.2 88.1596 279.254 92.3404 293.125 96.8C307.075 101.26 321.129 105.44 335 94.626C348.95 83.7 363.004 57.5 376.875 42.226C390.825 26.8404 404.879 22.6596 418.75 18.2C432.7 13.7404 446.754 9.55957 460.625 16.026C474.575 22.6596 488.629 39.9404 502.5 40.024C516.45 39.9404 530.504 22.6596 544.375 11.65C558.325 0.640426 572.379 -3.54043 586.25 9.47596C600.2 22.6596 614.254 53.0404 628.125 57.5C642.075 61.9596 656.129 39.9404 670 24.75C683.95 9.55958 698.004 0.640427 711.875 13.824C725.825 26.8404 739.879 61.9596 753.75 61.876C767.7 61.9596 781.754 26.8404 795.625 11.65C809.575 -3.54043 823.629 0.640426 837.5 0.724043C851.45 0.640426 865.504 -3.54043 879.375 2.92596C893.325 9.55958 907.379 26.8404 921.25 40.024C935.2 53.0404 949.254 61.9596 963.125 53.124C977.075 44.4 991.129 18.2 997.934 5.1L1005 -8V123H998.012C991.05 123 976.996 123 963.125 123C949.175 123 935.121 123 921.25 123C907.3 123 893.246 123 879.375 123C865.425 123 851.371 123 837.5 123C823.55 123 809.496 123 795.625 123C781.675 123 767.621 123 753.75 123C739.8 123 725.746 123 711.875 123C697.925 123 683.871 123 670 123C656.05 123 641.996 123 628.125 123C614.175 123 600.121 123 586.25 123C572.3 123 558.246 123 544.375 123C530.425 123 516.371 123 502.5 123C488.55 123 474.496 123 460.625 123C446.675 123 432.621 123 418.75 123C404.8 123 390.746 123 376.875 123C362.925 123 348.871 123 335 123C321.05 123 306.996 123 293.125 123C279.175 123 265.121 123 251.25 123C237.3 123 223.246 123 209.375 123C195.425 123 181.371 123 167.5 123C153.55 123 139.496 123 125.625 123C111.675 123 97.6211 123 83.75 123C69.8004 123 55.7461 123 41.875 123C27.9254 123 13.8711 123 7.06641 123H0V96.8Z"
            fill="url(#paint1_linear_1620_279)" />
    </g>
    <defs>
        <linearGradient id="paint0_linear_1620_279" x1="0" y1="139.221" x2="0" y2="6.22064"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#2E7F95" />
            <stop offset="1" stop-color="#83D6FA" />
        </linearGradient>
        <linearGradient id="paint1_linear_1620_279" x1="0" y1="123" x2="0" y2="-8" gradientUnits="userSpaceOnUse">
            <stop stop-color="#568898" />
            <stop offset="1" stop-color="#54F4FF" />
        </linearGradient>
        <clipPath id="clip0_1620_279">
            <path d="M0 0H377V103C377 114.046 368.046 123 357 123H20C8.95431 123 0 114.046 0 103V0Z" fill="white" />
        </clipPath>
    </defs>
</svg>
',
                        ];
                    @endphp

                    <div
                        class="{{ $bgColors[$index % count($bgColors)] }} relative mb-3 flex rounded-2xl p-2 drop-shadow-lg">
                        <div class="ml-5 flex flex-grow flex-col gap-2">
                            <h1 class="mt-2 text-[1.5rem] font-bold text-white">{{ $itemDocumentType }}</h1>
                            <a wire:navigate href="{{ route('search-result-page', ['q' => $itemDocumentType]) }}"
                                class="mb-2 mt-8 w-fit rounded-md border border-slate-300 px-3 py-1 font-semibold text-white backdrop-blur-sm">View
                                documents</a>
                        </div>
                        <div
                            class="my-auto ml-2 mr-5 flex h-[3rem] w-[3rem] items-center justify-center rounded-md bg-sky-700 bg-opacity-50 text-white backdrop-blur-sm">
                            <h2 class="p-2 font-semibold">{{ $itemCount }}</h2>
                        </div>
                        <div class="absolute bottom-0 left-0 overflow-hidden -z-10 w-full">
                            {!! $svgs[$index % count($svgs)] !!}
                        </div>

                    </div>
                @endforeach
            </section>

            {{-- <section class="flex w-full gap-3">
                @foreach ($document_types as $itemDocumentType)
                    @php
                        $itemCount = \App\Models\DocuPost::where('document_type', $itemDocumentType)->count();
                    @endphp
                    <div class="my-2 flex w-full items-center rounded-lg bg-white p-2 shadow-lg">
                        <div
                            class="mx-4 flex h-fit w-fit rounded-md bg-blue-500 px-4 py-2 font-semibold text-white drop-shadow-md">
                            {{ $itemCount }}
                        </div>
                        <div class="mr-4">
                            <h1 class="font-bold text-blue-500">{{ $itemDocumentType }}</h1>
                        </div>
                    </div>
                @endforeach
            </section> --}}
            <h2 class="mt-2 text-[1.2rem] font-semibold text-primary-color">Collections</h2>
            <section class="mt-2">
                <div class="grid w-full grid-flow-dense grid-cols-2 gap-4">
                    @foreach ($degree_lists as $itemDegree)
                        @php
                            $itemCount = \App\Models\DocuPost::where('course', $itemDegree)->count();
                        @endphp
                        <div
                            class="col-span-2 flex h-fit w-full items-center gap-2 rounded-lg bg-white p-2 px-3 drop-shadow-md md:col-span-1 md:h-[6rem]">
                            <div
                                class="ml-4 mr-4 flex h-[1rem] w-[1rem] items-center justify-center rounded-lg bg-sky-700 p-6 font-medium text-white">
                                <span> {{ $itemCount }}</span>
                            </div>
                            <div class="flex h-full flex-col justify-center">
                                <h1 class="text-[1.2rem] font-semibold text-sky-700">
                                    {{ $itemDegree }}
                                </h1>
                                <p class="whitespace-wrap text-sm font-light text-gray-500">
                                    Research works submitted to the {{ $itemDegree }}.
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </section>
</x-app-layout>
