/** @type {import('tailwindcss').Config} */
export default {
    mode: "jit",
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins", "Arial", "sans-serif"],
            },
            screens: {
                sm: "480px",
                md: "768px",
                lg: "1024px",
                xl: "1280px",
            },
            spacing: {
                big: "48rem",
            },
            fontWeight: {
                thin: 100,
                "extra-light": 200,
                light: 300,
                normal: 400,
                medium: 500,
                "semi-bold": 600,
                bold: 700,
                "extra-bold": 800,
                black: 900,
            },
            fontStyle: {
                italic: "italic",
                // Add more font styles as needed
            },
            colors: {
                "primary-color": "#0A2647",
                "secondary-color": "#2C74B3",
            },
        },
        container: {
            center: true,
            padding: {
                DEFAULT: "20px",
                md: "50px",
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ["dark"], // Enable dark mode for background colors
            textColor: ["dark"], // Enable dark mode for text colors
            // Add other utility classes here if you want to support dark mode for other properties
        },
    },
    plugins: [],
};
