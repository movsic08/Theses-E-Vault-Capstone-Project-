$(document).ready(function () {
    // Show the content of the "Security" tab by default
    $("#tab-2").removeClass("hidden"); // Remove the 'hidden' class to show the content

    // Hide other tab contents
    $(".tab-content").not("#tab-2").addClass("hidden");

    $(".tab-button").click(function () {
        var tabId = $(this).data("tab");
        $(".tab-content").addClass("hidden"); // Hide all tab contents
        $("#" + tabId).removeClass("hidden"); // Show the clicked tab content

        // Remove the 'active' class from all buttons
        $(".tab-button").removeClass(
            "border-b-4 border-primary-color font-bold",
        );

        // Add the 'active' class to the clicked button
        $(this).addClass("border-b-4 border-primary-color font-bold");
    });
});
