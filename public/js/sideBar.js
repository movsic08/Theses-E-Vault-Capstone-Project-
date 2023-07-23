$(document).ready(function () {
    var sidebarBtn = $("#sidebarBtn");
    var sidebarNav = $("#sidebar-nav");
    var optionNames = $(".hideName");
    var isExpanded = true; // Initialize the flag to indicate collapsed state
  
    sidebarBtn.on("click", function () {
      if (isExpanded) {
        optionNames.fadeOut(400);
        sidebarNav.animate({ width: "3.5rem" }, 800);
        sidebarBtn.css({
          transform: "rotate(0deg)",
          transition: "transform 1s",
        });
      } else {
        sidebarBtn.css({
          transform: "rotate(180deg)",
          transition: "transform 1s",
        });
        sidebarNav.animate({ width: "10rem" }, 400, function () {});
        optionNames.fadeIn(1300);
      }
      isExpanded = !isExpanded; // Toggle the flag value
    });
  });
  