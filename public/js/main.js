class Main {
    constructor() {
        const pdfDataElement = document.getElementById("pdfData");
        const filePath = pdfDataElement.getAttribute("data-file-path");

        this.url = filePath;
        this.pageNum = 1;
        this.numPages = 0;

        this.canvas = document.querySelector("#pdfArea");
        this.ctx = this.canvas.getContext("2d");
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
        }
    }

    async renderPage(num) {
        try {
            const page = await this.pdfDoc.getPage(num);
            const viewport = page.getViewport({ scale: this.scale });
            this.canvas.height = viewport.height;
            this.canvas.width = viewport.width;
            const renderContext = {
                canvasContext: this.ctx,
                viewport,
            };
            await page.render(renderContext);
        } catch (error) {
            console.error("Error rendering page:", error);
        }
    }

    showNextPage() {
        if (this.pageNum >= this.numPages) {
            return;
        }
        this.pageNum++;
        this.renderPage(this.pageNum);
        this.updatePageNumberInputValue();
    }

    showPrevPage() {
        if (this.pageNum <= 1) {
            return;
        }
        this.pageNum--;
        this.renderPage(this.pageNum);
        this.updatePageNumberInputValue();
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
        } else {
            // Invalid input, reset to the current page number
            pageNumberInput.value = this.pageNum;
        }
    }
}

// Create an instance of the Main class
const main = new Main();
