$(document).ready(function () {
    const sidebarBtn = $("#sidebarBtn");
    const sidebarNav = $("#sidebar-nav");
    const optionNames = $(".hideName");
    const mobileMenu = $("#mobileMenu");
    const removeJustifyCenter = $(".remover-expanded");
    const removeItemsCenter = $(".items-center-remover");

    const darkModeButton = $("#darkmode");
    console.log("status is = " + sessionStorage.getItem("dark"));

    darkModeButton.on("click", function () {
        isDark = !isDark;
        sessionStorage.setItem("dark", isDark ? "true" : "false");
        if (!isDark) {
            $("html").removeClass("dark");
            // $("body").addClass("gradient-bg-light");
            // $("body").css({
            //     "background-color": "",
            //     "background-image": "",
            // });
        } else {
            $("html").addClass("dark");
            // $("body").removeClass("gradient-bg-light");
            // $("body").css({
            //     "background-color": "hsla(240, 100%, 0%, 1)",
            //     "background-image":
            //         "radial-gradient(at 0% 100%, hsla(264, 63%, 7%, 1) 0px, transparent 50%), radial-gradient(at 98% 3%, hsla(204, 94%, 7%, 1) 0px, transparent 50%), radial-gradient(at 27% 36%, hsla(211, 85%, 8%, 1) 0px, transparent 50%), radial-gradient(at 78% 18%, hsla(218, 95%, 9%, 1) 0px, transparent 50%), radial-gradient(at 0% 50%, hsla(209, 42%, 9%, 1) 0px, transparent 50%), radial-gradient(at 100% 73%, hsla(240, 63%, 6%, 1) 0px, transparent 50%), radial-gradient(at 0% 100%, hsla(225, 73%, 9%, 1) 0px, transparent 50%), radial-gradient(at 70% 79%, hsla(240, 59%, 12%, 1) 0px, transparent 50%), radial-gradient(at 1% 9%, hsla(225, 75%, 9%, 1) 0px, transparent 50%)",
            // });
        }

        console.log(sessionStorage.getItem("dark"));
    });

    // Retrieve the isExpanded state from sessionStorage
    var isExpanded = sessionStorage.getItem("isExpanded") === "true";

    if (isExpanded) {
        sidebarBtn.css({
            transform: "rotate(180deg)",
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
