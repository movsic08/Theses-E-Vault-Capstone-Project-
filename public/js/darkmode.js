// Icons
if (!window.darkmodeSwitch) {
    const darkmodeSwitch = document.getElementById("darkmodeSwitch");
    window.darkmodeSwitch = darkmodeSwitch;
}

// Text
if (!window.modeType) {
    const modeType = document.getElementById("modeType");
    window.modeType = modeType; // Corrected this line
}

// Theme Vars
if (!window.userTheme) {
    const userTheme = localStorage.getItem("theme");
    window.userTheme = userTheme;
}

if (!window.systemTheme) {
    const systemTheme = window.matchMedia(
        "(prefers-color-scheme: dark)"
    ).matches;
    window.systemTheme = systemTheme;
}

// Icon and Text Toggling
if (!window.iconToggle) {
    window.iconToggle = () => {
        const currentSrc = darkmodeSwitch.getAttribute("src");
        const newSrc = currentSrc.includes("icon-moon.svg")
            ? darkmodeSwitch.getAttribute("data-sun-src")
            : darkmodeSwitch.getAttribute("data-moon-src");

        const newText = currentSrc.includes("icon-moon.svg") ? "Light" : "Dark";

        darkmodeSwitch.setAttribute("src", newSrc);
        window.modeType.innerText = newText; // Update the text
    };
}

// Initial Theme Check
if (!window.themeCheck) {
    window.themeCheck = () => {
        if (
            window.userTheme === "dark" ||
            (!window.userTheme && window.systemTheme)
        ) {
            document.documentElement.classList.add("dark");
            darkmodeSwitch.setAttribute(
                "src",
                darkmodeSwitch.getAttribute("data-sun-src")
            );
            window.modeType.innerText = "Light"; // Set text to "Light"
            return;
        }

        darkmodeSwitch.setAttribute(
            "src",
            darkmodeSwitch.getAttribute("data-moon-src")
        );
        window.modeType.innerText = "Dark"; // Set text to "Dark"
    };
}

// Manual Theme Switch
if (!window.themeSwitch) {
    window.themeSwitch = () => {
        if (document.documentElement.classList.contains("dark")) {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("theme", "light");
            window.iconToggle();
            return;
        }

        document.documentElement.classList.add("dark");
        localStorage.setItem("theme", "dark");
        window.iconToggle();
    };
}

// Call theme switch on clicking buttons
if (!window.themeSwitchListenersAdded) {
    darkmodeSwitch.addEventListener("click", () => {
        window.themeSwitch();
    });

    window.themeSwitchListenersAdded = true;
}

// Invoke theme check on initial load
themeCheck();
