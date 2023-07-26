$(document).ready(function () {
    var sidebarBtn = $("#sidebarBtn");
    var sidebarNav = $("#sidebar-nav");
    var optionNames = $(".hideName");
    var isExpanded = false; // Initialize the flag to indicate collapsed state

    sidebarBtn.on("click", function () {
        if (isExpanded) {
            sidebarBtn.css({
                transform: "rotate(0deg)",
                transition: "transform 2s",
            });
            optionNames.fadeOut(400);
            sidebarNav.animate({ width: "3.5rem" }, 800);
        } else {
            sidebarBtn.css({
                transform: "rotate(180deg)",
                transition: "transform 2s",
            });
            sidebarNav.animate({ width: "10rem" }, 400, function () {});
            optionNames.fadeIn(1300);
        }
        isExpanded = !isExpanded; // Toggle the flag value
    });

    var menuLeft = $("#left-btn");
    menuLeft.on("click", function () {
        sidebarNav.removeClass("hidden");
    });

    var hideBtn = $("#menu-hide-btn");
    hideBtn.on("click", function () {
        sidebarNav.toggleClass("hidden");
    });


  
    
    
    
    

    
}); //endline
