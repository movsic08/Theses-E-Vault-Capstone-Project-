$(document).ready(function () {
    $("#confirmInput").on("input", function () {
        const userInput = $(this).val().trim();
        const $indicator = $("#indicator");

        if (userInput === "DELETE") {
            $("#confirmBTN")
                .removeClass("bg-red-400")
                .addClass("bg-red-800 hover:bg-red-950")
                .removeAttr("disabled");
            $indicator.removeClass("hidden").html("✅"); // Checkmark indicator
        } else {
            $("#confirmBTN")
                .removeClass("bg-red-800 hover:bg-red-950")
                .addClass("bg-red-400")
                .attr("disabled", true);
            if (userInput === "") {
                $indicator.addClass("hidden").html(""); // No indicator if no value
            } else {
                $indicator.removeClass("hidden").html("❌"); // X indicator
            }
        }
    });
});
