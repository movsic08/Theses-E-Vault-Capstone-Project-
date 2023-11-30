// console.log("hola");
// // Icons
// if (!window.darkmodeSwitch) {
//     let darkmodeSwitch = document.getElementById("darkmodeSwitch");
//     window.darkmodeSwitch = darkmodeSwitch;
// }

// // Text
// if (!window.modeType) {
//     let modeType = document.getElementById("modeType");
//     window.modeType = modeType; // Corrected this line
// }

// // Theme Vars
// if (!window.userTheme) {
//     let userTheme = localStorage.getItem("theme");
//     window.userTheme = userTheme;
// }

// if (!window.systemTheme) {
//     let systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
//     window.systemTheme = systemTheme;
// }

// // Icon and Text Toggling
// if (!window.iconToggle) {
//     window.iconToggle = () => {
//         let currentSrc = darkmodeSwitch.getAttribute("src");
//         let newSrc = currentSrc.includes("icon-moon.svg")
//             ? darkmodeSwitch.getAttribute("data-sun-src")
//             : darkmodeSwitch.getAttribute("data-moon-src");

//         let newText = currentSrc.includes("icon-moon.svg") ? "Light" : "Dark";

//         darkmodeSwitch.setAttribute("src", newSrc);
//         window.modeType.innerText = newText; // Update the text
//     };
// }

// // Initial Theme Check
// if (!window.themeCheck) {
//     window.themeCheck = () => {
//         if (
//             window.userTheme === "dark" ||
//             (!window.userTheme && window.systemTheme)
//         ) {
//             document.documentElement.classList.add("dark");
//             darkmodeSwitch.setAttribute(
//                 "src",
//                 darkmodeSwitch.getAttribute("data-sun-src")
//             );
//             window.modeType.innerText = "Light"; // Set text to "Light"
//             return;
//         }

//         darkmodeSwitch.setAttribute(
//             "src",
//             darkmodeSwitch.getAttribute("data-moon-src")
//         );
//         window.modeType.innerText = "Dark"; // Set text to "Dark"
//     };
// }

// // Manual Theme Switch
// if (!window.themeSwitch) {
//     window.themeSwitch = () => {
//         if (document.documentElement.classList.contains("dark")) {
//             document.documentElement.classList.remove("dark");
//             localStorage.setItem("theme", "light");
//             window.iconToggle();
//             return;
//         }

//         document.documentElement.classList.add("dark");
//         localStorage.setItem("theme", "dark");
//         window.iconToggle();
//     };
// }

// // Call theme switch on clicking buttons
// if (!window.themeSwitchListenersAdded) {
//     darkmodeSwitch.addEventListener("click", () => {
//         window.themeSwitch();
//     });

//     window.themeSwitchListenersAdded = true;
// }

// // Invoke theme check on initial load
// themeCheck();

// Icons
const sunIcon = document.querySelector(".sun");
const moonIcon = document.querySelector(".moon");

// Theme Vars
const userTheme = localStorage.getItem("theme");
const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

// Icon Toggling
const iconToggle = () => {
    moonIcon.classList.toggle("display-none");
    sunIcon.classList.toggle("display-none");
};

// Initial Theme Check
const themeCheck = () => {
    if (userTheme === "dark" || (!userTheme && systemTheme)) {
        document.documentElement.classList.add("dark");
        moonIcon.classList.add("display-none");
        return;
    }

    sunIcon.classList.add("display-none");
};

// Manual Theme Switch
const themeSwitch = () => {
    if (document.documentElement.classList.contains("dark")) {
        document.documentElement.classList.remove("dark");
        localStorage.setItem("theme", "light");
        iconToggle();
        return;
    }

    document.documentElement.classList.add("dark");
    localStorage.setItem("theme", "dark"); // Fixed typo in the storage key
    iconToggle();
};

// Call theme switch on clicking buttons
sunIcon.addEventListener("click", () => {
    themeSwitch();
});

moonIcon.addEventListener("click", () => {
    themeSwitch();
});

// Invoke theme check on initial load
themeCheck();
