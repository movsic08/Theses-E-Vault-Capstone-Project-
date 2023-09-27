class Main {
    // URL to the PDF file
    url = "storage/PDF_uploads/Tirao-2023-09-20-KnIi5MV6UcjG.pdf";
    // Static properties to store PDF information
    static pdfDoc = null;
    static pageNum = 1;
    static numPages = 0;

    constructor() {
        // Configuration options for PDF.js viewer
        this.pdfjsConfig = {
            viewer: {
                textLayer: true, // Enable text layer for text selection and copying
            },
        };

        // Initialize PDF.js with the updated configuration
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.worker.min.js"; // Set the path to the PDF.js worker script

        // Fetch and display the initial PDF data
        this.getData(Main.pageNum);
        Main.updatePageNumberInput();
    }

    getData(pageNum) {
        // Fetch the PDF document
        pdfjsLib.getDocument(this.url).promise.then((res) => {
            console.log(res);
            Main.pdfDoc = res;
            Main.numPages = Main.pdfDoc.numPages;
            document.getElementById("totalPages").textContent = Main.numPages;
            Main.renderPage(pageNum);
        });
    }

    // Render a specific page of the PDF
    static renderPage(num) {
        let canvas = document.querySelector("#pdfArea");
        let ctx = canvas.getContext("2d");

        Main.pdfDoc.getPage(num).then((pageResponse) => {
            // Get the dimensions of the PDF page in points (1 point = 1/72 inch)
            const pageWidth = pageResponse.view[2];
            const pageHeight = pageResponse.view[3];

            // Calculate the canvas size based on the page size
            canvas.width = pageWidth;
            canvas.height = pageHeight;

            const renderCtx = {
                canvasContext: ctx,
                viewport: pageResponse.getViewport({ scale: 1.0 }),
            };

            pageResponse.render(renderCtx);
        });
    }

    // Show the next page of the PDF
    static showNextPage() {
        if (Main.pageNum >= Main.numPages) {
            return;
        }
        Main.pageNum++;
        Main.reRenderCanvas();
        Main.updatePageNumberInputValue();
    }

    // Show the previous page of the PDF
    static showPrevPage() {
        if (Main.pageNum <= 1) {
            return;
        }
        Main.pageNum--;
        Main.reRenderCanvas();
        Main.updatePageNumberInputValue();
    }

    // Delayed re-rendering of the canvas
    static reRenderCanvas() {
        setTimeout(() => {
            Main.renderPage(Main.pageNum);
        }, 500);
    }

    // Update the page number input field
    static updatePageNumberInput() {
        const pageNumberInput = document.querySelector("#pageNumberInput");
        pageNumberInput.value = Main.pageNum;
        pageNumberInput.addEventListener("change", function () {
            let newPageNum = parseInt(this.value, 10);
            if (newPageNum >= 1 && newPageNum <= Main.numPages) {
                Main.pageNum = newPageNum;
                Main.reRenderCanvas();
                resetScrollPosition();
            } else {
                // Invalid input, reset to the current page number
                this.value = Main.pageNum;
            }
        });
    }

    // Update the page number input field value
    static updatePageNumberInputValue() {
        const pageNumberInput = document.querySelector("#pageNumberInput");
        pageNumberInput.value = Main.pageNum;
    }
}

// Function to reset the scroll position to the beginning
function resetScrollPosition() {
    const scrollableCanvas = document.querySelector(".scrollable-canvas");
    scrollableCanvas.scrollTop = 0;
}

// Attach the resetScrollPosition function to the Next and Prev buttons
document
    .querySelector("#nextPageBtn")
    .addEventListener("click", resetScrollPosition);
document
    .querySelector("#prevPageBtn")
    .addEventListener("click", resetScrollPosition);

// Create an instance of the Main class
let main = new Main();
