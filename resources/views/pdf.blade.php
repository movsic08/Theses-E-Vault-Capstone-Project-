<x-app-layout>

    <p>PDF File: {{ $pdfFile }}</p>

    <div id="pdfData" data-file-path="{{ asset('storage/' . $pdfFile) }}"></div>

    <div class="container relative">
        <div class="" style="height: 100%; width: 100%;">
            {{-- sticky top --}}
            <div class="fixed inset-x-0 bottom-3 z-50 flex w-full items-center justify-center">
                <div
                    class="flex w-fit items-center gap-1 rounded-md bg-slate-100 bg-opacity-70 px-1 outline outline-gray-200 drop-shadow-lg backdrop-blur-lg md:gap-2 md:px-9 md:py-1 lg:gap-3 lg:py-2">
                    <button class="rounded-md bg-primary-color px-2 py-1 font-bold text-white"
                        id="prevPageBtn">Prev</button>
                    <div class="flex items-center text-sm font-bold text-gray-600">
                        <x-label-input class="mr-1 text-sm">Pages</x-label-input>
                        <input type="number" id="pageNumberInput" value="1"
                            class="h-9 w-12 rounded-md border-2 bg-slate-100 px-2 text-center focus:outline-blue-950"
                            min="1" inputmode="numeric">
                        <span class="mx-1">/</span>
                        <span id="totalPages" class="m-2">10</span>
                    </div>
                    {{-- drop down --}}
                    <div x-data="{ isOpen: false, selectedOption: 'Fit to Width' }" class="relative inline-block text-left">
                        <button @click="isOpen = !isOpen" type="button" id="zoomDropdown"
                            class="rounded-lg bg-gray-200 px-1 text-gray-700 shadow-md md:px-2">
                            <span class="text-xs md:text-base" x-text="selectedOption "></span>
                            <svg class="ml-2 hidden h-5 w-5 md:inline-block" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="isOpen" @click.away="isOpen = false"
                            class="absolute right-0 mt-2 w-36 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5"
                            x-bind:style="{ 'bottom': isOpen ? '0' : 'auto' }">
                            <div class="bg-gray-200 py-1" role="menu" aria-orientation="vertical"
                                aria-labelledby="zoomDropdown">
                                <a @click="selectedOption = 'Fit to Page'; isOpen=false;"
                                    class="dropdown-item hover-bg-gray-100 block px-4 py-2 text-sm text-gray-700"
                                    href="#" role="menuitem" id="fitToPage">Fit to Page</a>
                                <a @click="selectedOption = 'Fit to Width'; isOpen=false;"
                                    class="dropdown-item hover-bg-gray-100 block px-4 py-2 text-sm text-gray-700"
                                    href="#" role="menuitem" id="fitToWidth">Fit to Width</a>
                            </div>
                        </div>
                    </div>

                    <button class="rounded-md bg-primary-color px-2 py-1 font-bold text-white"
                        id="nextPageBtn">Next</button>
                </div>
            </div>
            {{-- <div class="sticky right-0 top-0 w-fit rounded-md bg-white bg-opacity-50 drop-shadow-lg backdrop-blur-lg">
                <div class="col-4 col-md-2 dropdown m-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button"  
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Zoom
                    </button>
                    <div class="dropdown-menu" aria-labelledby="zoomDropdown">
                        <a class="dropdown-item" href="#" id="fitToPage">Fit to Page</a>
                        <a class="dropdown-item" href="#" id="fitToWidth">Fit to Width</a>
                    </div>
                </div>
            </div> --}}


            <div class="col-span-12 mt-2 overflow-auto text-center" id="scrollableCanvas">
                <div class="h-full w-auto">
                    <canvas class="mx-auto" id="pdfArea" style="height: auto; width: 100%;"></canvas>
                </div>
            </div>


        </div>
    </div>

    <style>
        /* Hide the up and down spinner controls for the input[type=number] */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Function to change the image size based on the selected option
            function changeImageSize(size) {
                const img = document.getElementById('pdfArea');
                const naturalWidth = img.naturalWidth;
                const naturalHeight = img.naturalHeight;
                if (img) {
                    if (size === 'fitToPage') {
                        img.style.height = '100%';
                        img.style.width = 'auto';
                    } else if (size === 'fitToWidth') {
                        img.style.height = 'auto';
                        img.style.width = '100%';
                    } else if (size === 'zoom50') {
                        img.style.height = (naturalHeight - (naturalHeight * .25)) + 'px';
                        img.style.width = (naturalWidth - (naturalWidth * .25)) + 'px';
                    } else if (size === 'zoom75') {
                        img.style.height = (naturalHeight * 1.16) + 'px';
                        img.style.width = (naturalWidth * 1.16) + 'px';
                    } else if (size === 'zoom100') {
                        img.style.height = (naturalHeight * 1.32) + 'px';
                        img.style.width = (naturalWidth * 1.32) + 'px';
                    } else if (size === 'zoom150') {
                        img.style.height = (naturalHeight * 1.48) + 'px';
                        img.style.width = (naturalWidth * 1.48) + 'px';
                    } else if (size === 'zoom200') {
                        img.style.height = (naturalHeight * 1.64) + 'px';
                        img.style.width = (naturalWidth * 1.64) + 'px';
                    } else if (size === 'zoom300') {
                        img.style.height = (naturalHeight * 1.80) + 'px';
                        img.style.width = (naturalWidth * 1.80) + 'px';
                    } else if (size === 'zoom400') {
                        img.style.height = (naturalHeight * 2) + 'px';
                        img.style.width = (naturalWidth * 2) + 'px';
                    } else {
                        img.style.height = size;
                        img.style.width = 'auto';
                    }
                }
            }

            // Handle dropdown item click events
            $('.dropdown-item').on('click', function(e) {
                e.preventDefault();
                const selectedSize = $(this).attr('id');
                changeImageSize(selectedSize);
            });


        });
    </script>

</x-app-layout>
