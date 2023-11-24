class Main {
    constructor() {
        const pdfDataElement = document.getElementById("pdfData");
        const filePath = pdfDataElement.getAttribute("data-file-path");

        this.url = filePath;
        this.pageNum = 1;
        this.numPages = 0;

        this.canvasContainer = document.querySelector("#canvasContainer");
        this.scale = 1.5;

        this.loadPdf();
        this.setupEventListeners();
    }

    async loadPdf() {
        try {
            const pdfDoc = await pdfjsLib.getDocument(this.url).promise;
            this.pdfDoc = pdfDoc;
            this.numPages = pdfDoc.numPages;
            document.getElementById("totalPages").textContent = this.numPages;

            this.renderPage(this.pageNum);
        } catch (error) {
            console.error("Error loading PDF:", error);
            this.handlePdfError();
        }
    }

    async renderPage(num) {
        try {
            // Cancel previous rendering task if it exists
            if (this.renderTask) {
                this.renderTask.cancel();
            }

            const page = await this.pdfDoc.getPage(num);
            const viewport = page.getViewport({ scale: this.scale });

            // Create a new canvas element for each rendering operation
            const canvas = document.createElement("canvas");
            canvas.className = "pdf-canvas"; // Add a class for styling if needed

            if (this.canvasContainer) {
                this.canvasContainer.appendChild(canvas);

                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderContext = {
                    canvasContext: canvas.getContext("2d"),
                    viewport,
                };

                // Save the render task to be able to cancel it later
                this.renderTask = page.render(renderContext);

                await this.renderTask.promise;

                // Additional: Remove previous canvases (optional, depending on your requirements)
                this.removePreviousCanvases();
            } else {
                console.error("Canvas container not found.");
            }
        } catch (error) {
            console.error("Error rendering page:", error);
        }
    }

    // Additional: Remove previous canvases from the container
    removePreviousCanvases() {
        const canvases =
            this.canvasContainer.getElementsByClassName("pdf-canvas");
        Array.from(canvases).forEach((canvas) => {
            canvas.remove();
        });
    }

    handlePdfError() {
        // Handle the case where the PDF file is not found
        const loadingSpinnerText =
            document.getElementById("loadingSpinnerText");
        loadingSpinnerText.innerHTML =
            '<span class="text-lg font-bold text-primary-color">File not found in the database</span>';
    }

    showNextPage() {
        if (this.pageNum >= this.numPages) {
            return;
        }
        this.pageNum++;
        this.renderPage(this.pageNum);
        this.updatePageNumberInputValue();
        this.resetScrollPosition();
    }

    showPrevPage() {
        if (this.pageNum <= 1) {
            return;
        }
        this.pageNum--;
        this.renderPage(this.pageNum);
        this.updatePageNumberInputValue();
        this.resetScrollPosition();
    }

    updatePageNumberInputValue() {
        const pageNumberInput = document.querySelector("#pageNumberInput");
        pageNumberInput.value = this.pageNum;
    }

    setupEventListeners() {
        const nextPageBtn = document.querySelector("#nextPageBtn");
        const prevPageBtn = document.querySelector("#prevPageBtn");

        nextPageBtn.addEventListener("click", () => this.showNextPage());
        prevPageBtn.addEventListener("click", () => this.showPrevPage());

        const pageNumberInput = document.querySelector("#pageNumberInput");
        pageNumberInput.addEventListener("change", () =>
            this.handlePageNumberInput()
        );
    }

    handlePageNumberInput() {
        const pageNumberInput = document.querySelector("#pageNumberInput");
        let newPageNum = parseInt(pageNumberInput.value, 10);
        if (newPageNum >= 1 && newPageNum <= this.numPages) {
            this.pageNum = newPageNum;
            this.renderPage(this.pageNum);
            this.updatePageNumberInputValue();
            this.resetScrollPosition();
        } else {
            // Invalid input, reset to the current page number
            pageNumberInput.value = this.pageNum;
        }
    }

    resetScrollPosition() {
        const scrollableCanvas = document.querySelector(".scrollable-canvas");
        scrollableCanvas.scrollTop = 0;
    }
}

// Additional Script - Assuming Main class is defined in main.js
const main = new Main();
