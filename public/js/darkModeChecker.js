var isDark = sessionStorage.getItem("dark") === "true";

if (!isDark) {
    $("html").removeClass("dark");
} else {
    $("html").addClass("dark");
}

console.log("am i dark?" + isDark);
