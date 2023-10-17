{{-- this is input box --}}
<div class="col-4 col-md-2 text-light flex items-center">
    <input type="number" id="pageNumberInput" value="1" class="form-control w-16 text-center" min="1"
        inputmode="numeric">
    <span class="m-1 mx-2">/</span>
    <span id="totalPages" class="m-2">10</span>
</div>
{{-- Zoom Dropdown --}}
<div class="col-4 col-md-2 dropdown m-2">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="zoomDropdown" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Zoom
    </button>
    <div class="dropdown-menu" aria-labelledby="zoomDropdown">
        <a class="dropdown-item" href="#" id="fitToPage">Fit to Page</a>
        <a class="dropdown-item" href="#" id="fitToWidth">Fit to Width</a>
        {{-- Add more zoom options here --}}
    </div>
</div>
