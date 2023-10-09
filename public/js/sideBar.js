$(document).ready(function () {
    const sidebarBtn = $("#sidebarBtn");
    const sidebarNav = $("#sidebar-nav");
    const optionNames = $(".hideName");
    const mobileMenu = $("#mobileMenu");
    const removeJustifyCenter = $(".remover-expanded");
    const removeItemsCenter = $(".items-center-remover ");
    var isExpanded = false; // Initialize the flag to indicate collapsed state

    //mobile version nav
    $("#left-btn").on("click", function () {
        mobileMenu.removeClass("hidden");
        $("#left-btn").toggleClass("hidden");
        $("#menu-hide-btn").removeClass("hidden");
    });
    $("#menu-hide-btn").on("click", function () {
        mobileMenu.toggleClass("hidden");
        $("#menu-hide-btn").toggleClass("hidden");
        $("#left-btn").removeClass("hidden");
    });

    sidebarBtn.on("click", function () {
        if (isExpanded) {
            sidebarBtn.css({
                transform: "rotate(0deg)",
                transition: "transform 2s",
            });
            optionNames.fadeOut(400);
            sidebarNav.animate({ width: "4rem" }, 800);
            sidebarNav.removeClass("items-center");
            sidebarNav.animate({ "align-items": "center" }, 800);
        } else {
            sidebarBtn.css({
                transform: "rotate(180deg)",
                transition: "transform 2s",
            });

            sidebarNav.animate({ width: "10rem" }, 800, function () {});
            optionNames.fadeIn(400);
            sidebarNav.removeClass("items-center");
            sidebarNav.toggleClass("items-start");
            // removeItemsCenter.removeClass("items-center");
        }
        isExpanded = !isExpanded; // Toggle the flag value
    });

    $("#closeBtnSession").on("click", function () {
        $("#sessionMsg").fadeOut(400);
    });

    // var menuLeft = $("#left-btn");
    // menuLeft.on("click", function () {
    //     sidebarNav.removeClass("hidden");
    // });

    // var hideBtn = $("#menu-hide-btn");
    // hideBtn.on("click", function () {
    //     sidebarNav.toggleClass("hidden");
    // });
}); //endline
