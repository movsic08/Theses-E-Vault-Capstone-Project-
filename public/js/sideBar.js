$(document).ready(function () {
    const sidebarBtn = $("#sidebarBtn");
    const sidebarNav = $("#sidebar-nav");
    const optionNames = $(".hideName");
    const mobileMenu = $("#mobileMenu");
    const removeJustifyCenter = $(".remover-expanded");
    const removeItemsCenter = $(".items-center-remover");

    // Retrieve the isExpanded state from sessionStorage
    var isExpanded = sessionStorage.getItem("isExpanded") === "true";

    if (isExpanded) {
        sidebarBtn.css({
            transform: "rotate(180deg)",
            // transition: "transform 1s",
        });
        sidebarNav.removeClass("w-[4rem]");
        sidebarNav.addClass("w-[10rem]");
        // Replace the fadeIn function with show
        optionNames.show();

        removeItemsCenter.removeClass("items-center");
        sidebarNav.removeClass("items-center");
    } else {
        sidebarBtn.css({
            transform: "rotate(0deg)",
            // transition: "transform 1s",
        });
    }

    sidebarBtn.on("click", function () {
        isExpanded = !isExpanded; // Toggle the flag value
        if (isExpanded) {
            sidebarBtn.css({
                transform: "rotate(0deg)",
                transition: "transform 1s",
            });
            sidebarNav.animate({ width: "10rem" }, 1000, function () {});
            optionNames.fadeIn(900);

            removeItemsCenter.removeClass("items-center");
            sidebarNav.removeClass("items-center");
        } else {
            sidebarBtn.css({
                transform: "rotate(180deg)",
                transition: "transform 1s",
            });
            sidebarNav.animate({ width: "4rem" }, 1000, function () {
                removeItemsCenter.toggleClass("items-center");
                sidebarNav.toggleClass("items-center");
            });
            optionNames.fadeOut(400, function () {
                // Remove optionNames from the document
                optionNames.hide();
            });
        }
        // Store the updated isExpanded state in sessionStorage
        sessionStorage.setItem("isExpanded", isExpanded ? "true" : "false");
        // updateUI(); // Update the UI based on the new isExpanded state
    });

    const showMenuMobile = $("#showMenuMobile");
    const mobileMenuItems = $("#mobileMenuItems");
    const menuMobileRemoverBtn = $("#menuMobileRemoverBtn");

    showMenuMobile.on("click", function () {
        mobileMenuItems.removeClass("hidden");
        showMenuMobile.toggleClass("hidden");
        menuMobileRemoverBtn.removeClass("hidden");
    });
    menuMobileRemoverBtn.on("click", function () {
        mobileMenuItems.toggleClass("hidden");
        showMenuMobile.removeClass("hidden");
        menuMobileRemoverBtn.toggleClass("hidden");
    });

    $("#closeBtnSession").on("click", function () {
        $("#sessionMsg").fadeOut(400);
    });
});

// darkmode logic area
