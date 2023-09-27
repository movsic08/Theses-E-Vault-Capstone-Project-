<x-app-layout>


    <body class="mt-5 text-center antialiased">
        <div class="container text-center">
            <h2 class="display-4">Pdf Viewer</h2>
        </div>

        <div class="container">
            <div class="row justify-content-md-center m-3 p-3">
                <div class="col-md-12 scrollable-canvas mb-3">
                    <canvas id="pdfArea" class="pdfArea mx-auto"></canvas>
                </div>
                <div class="col-12 col-md-9 d-flex justify-content-center">
                    <button class="btn btn-primary col-4 col-md-2 m-2" id="prevPageBtn" onclick="Main.showPrevPage()">
                        Prev
                    </button>
                    <button class="btn btn-info col-4 col-md-2 m-2" id="nextPageBtn" onclick="Main.showNextPage()">
                        Next
                    </button>
                    <div class="col-4 col-md-3 d-flex align-items-center">
                        <input type="number" id="pageNumberInput" class="form-control" min="1">
                        <span class="m-1 mx-2">/</span>
                        <span id="totalPages" class="m-2">10</span>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.worker.min.js"
            integrity="sha512-S9Dwzi4TCjPQkxlaXsqQLj2gXUjPZk4HBzE7zWU6Itc1r2RNmlBrVLH4EsYQrdnzLgvkN8P7l9SCru+2I4rZwg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</x-app-layout>
