// Wrap the entire script in a function to encapsulate the logic
function setupClipboardCopy() {
    const copyButton = document.getElementById("copyButton");
    const shareInput = document.getElementById("valueBox");

    // Check if the necessary elements are present
    if (copyButton && shareInput) {
        copyButton.addEventListener("click", async () => {
            try {
                if (navigator.clipboard) {
                    await navigator.clipboard.writeText(shareInput.value);
                    console.log("Link copied to clipboard!");
                } else {
                    fallbackCopyTextToClipboard(shareInput.value);
                }
            } catch (err) {
                console.error("Error copying to clipboard:", err);
            }
        });

        function fallbackCopyTextToClipboard(text) {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();

            try {
                document.execCommand("copy");
                console.log("Link copied to clipboard using fallback method!");
            } catch (err) {
                console.error("Error copying to clipboard:", err);
            }

            document.body.removeChild(textArea);
        }
    } else {
        console.error("One or more required elements not found.");
    }
}

// Add an event listener for Livewire navigation
document.addEventListener("livewire:navigated", () => {
    // Call the setup function when the document is ready
    setupClipboardCopy();
    // Re-initialize the Flowbite library or any other logic needed after navigation
    initFlowbite();
});
