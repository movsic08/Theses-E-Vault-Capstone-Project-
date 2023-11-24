<div>
    <x-session_flash />

    <h2>{{ $pdfFileDecrpted }}</h2>
    @if ($PDFlocked)
        <div class="w-full">
            <div class="flex w-full items-center justify-center">
                <div class="w-[20rem] rounded-md bg-white p-4 drop-shadow-lg">
                    <h2 class="md:text2xl text-center text-lg font-extrabold text-primary-color">PDF IS LOCKED</h2>
                    <div class="my-1 rounded-md border border-blue-300 bg-blue-100 p-2 text-blue-950">
                        <p class="text-xs font-light">If you don't know where to find the generated key for you,
                            you can find it in the view document page. Just click on generate key and paste it here to unlock</p>
                    </div>
                    <form action="" wire:submit.prevent='unlockPDFForm'>
                        <x-label-input>Enter the generated key</x-label-input>
                        <x-input-field wire:model.live='key_input' placeholder='Key here' />
                        @error('key_input')
                            <small class="text-red-500">{{ $message }}</small>
                            <br>
                        @enderror

                        <input type="submit" value="Enter"
                            class="mt-1 w-fit cursor-pointer rounded-md bg-blue-700 px-2 py-1 text-white duration-500 ease-in-out hover:bg-primary-color">
                    </form>
                </div>
            </div>
        </div>
    @endif
    <section x-data="{ pdfViewer: false, fileNotFound: false }" x-show="pdfViewer" x-on:open-pdf.window="pdfViewer = true; fileNotFound = false" x wire:ignore>
        <div id="pdfData" data-file-path="{{ asset('storage/' . decrypt($this->pdfFile)) }}"></div>
        <div class="container relative">
            <div class="" style="height: 100%; width: 100%;">
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
                        <div x-data="{ isOpen: false, selectedOption: 'Fit to Width' }" class="relative inline-block text-left">
                            <button @click="isOpen = !isOpen" type="button" id="zoomDropdown"
                                class="rounded-lg bg-gray-200 px-1 text-gray-700 shadow-md md:px-2">
                                <span class="text-xs md:text-base" x-text="selectedOption "></span>
                                <svg class="ml-2 hidden h-5 w-5 md:inline-block" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7">
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

                <div class="col-span-12 mt-2 overflow-auto text-center" id="scrollableCanvas">
                    <div class="h-full w-auto">
                        <div class="flex items-center justify-center h-full absolute top-0 left-0 w-full"
                            id="loadingSpinnerText">
                            <span x-show="fileNotFound" id="loadingText" class="text-lg font-bold text-primary-color">File not found in the database</span>
                            <span x-show="!fileNotFound" id="loadingText" class="text-lg font-bold text-primary-color">Loading</span>
                            <span id="loadingDot" class="animate-dots">.</span>
                        </div>
                        <canvas class="mx-auto" id="pdfArea" style="height: auto; width: 100%;"></canvas>
                    </div>
                </div>

            </div>
        </div>

        <style>
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            input[type=number] {
                -moz-appearance: textfield;
            }

            #loadingSpinnerText {
                background-color: rgba(255, 255, 255, 0.8);
                z-index: 1000;
            }

            #loadingSpinnerText span {
                margin-right: 0.5rem;
            }

            .animate-dots {
                animation: blink 1s infinite;
            }

            @keyframes blink {
                50% {
                    opacity: 0;
                }
            }
        </style>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        <script>
            // Function to handle the dot animation
            function animateDots() {
                const loadingDot = document.getElementById('loadingDot');
                let dotCount = 0;
                const interval = setInterval(function () {
                    loadingDot.textContent = '.'.repeat(dotCount % 4); // Repeat dots 0, 1, 2, 3
                    dotCount++;

                    if (dotCount > 3) {
                        clearInterval(interval); // Stop the animation after four dots
                    }
                }, 500); // Adjust the interval as needed
            }

            // Get the PDF document
            const pdfDocPromise = pdfjsLib.getDocument('{{ asset('storage/' . decrypt($this->pdfFile)) }}').promise;

            // Call the dot animation function after rendering the PDF
            pdfDocPromise.then(function (pdfDoc) {
                animateDots();
                // Render the first page
                renderPage(pdfDoc, 1);
            }).catch(function (error) {
                console.error('Error loading PDF:', error);
                const pdfViewerElement = document.querySelector('[x-data="{ pdfViewer: false, fileNotFound: false }"]');
                if (pdfViewerElement) {
                    pdfViewerElement.fileNotFound = true;
                }
            });

            // Function to render a specific page
            function renderPage(pdfDoc, pageNum) {
                const canvas = document.getElementById('pdfArea');
                const ctx = canvas.getContext('2d');

                // Fetch the specified page
                pdfDoc.getPage(pageNum).then(function(page) {
                    const viewport = page.getViewport({ scale: 1.5 });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render the page content on the canvas
                    const renderContext = {
                        canvasContext: ctx,
                        viewport: viewport
                    };
                    page.render(renderContext);
                });
            }

            
        </script>

        {!! $pdfViewerContent !!}

    </section>

</div>
