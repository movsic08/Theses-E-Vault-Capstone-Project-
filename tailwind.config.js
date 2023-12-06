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
            focus: {
                outline: ["2px solid #3b82f6", "1px dotted #3b82f6"],
            },
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
                "secondary-color": "#E6CB56",
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
    plugins: [
        function ({ addUtilities }) {
            const newUtilities = {
                ".custom-background": {
                    "background-color": "hsla(240, 100%, 0%, 1)",
                    "background-image":
                        "radial-gradient(at 0% 100%, hsla(264, 63%, 7%, 1) 0px, transparent 50%), " +
                        "radial-gradient(at 98% 3%, hsla(204, 94%, 7%, 1) 0px, transparent 50%), " +
                        "radial-gradient(at 27% 36%, hsla(211, 85%, 8%, 1) 0px, transparent 50%), " +
                        "radial-gradient(at 78% 18%, hsla(218, 95%, 9%, 1) 0px, transparent 50%), " +
                        "radial-gradient(at 0% 50%, hsla(209, 42%, 9%, 1) 0px, transparent 50%), " +
                        "radial-gradient(at 100% 73%, hsla(240, 63%, 6%, 1) 0px, transparent 50%), " +
                        "radial-gradient(at 0% 100%, hsla(225, 73%, 9%, 1) 0px, transparent 50%), " +
                        "radial-gradient(at 70% 79%, hsla(240, 59%, 12%, 1) 0px, transparent 50%), " +
                        "radial-gradient(at 1% 9%, hsla(225, 75%, 9%, 1) 0px, transparent 50%)",
                },
                ".light-background": {
                    "background-color": "hsla(231, 76%, 97%, 1)",
                    "background-image":
                        "radial-gradient(at 13% 80%, hsla(206, 81%, 93%, 1) 0px, transparent 50% ), " +
                        "radial-gradient(at 77% 1%, hsla(200, 77%, 91%, 1) 0px, transparent 50%)," +
                        "radial-gradient(at 22% 37%, hsla(189, 50%, 89%, 1) 0px, transparent 50%)," +
                        "radial-gradient(at 61% 60%, hsla(216, 100%, 82%, 1) 0px, transparent 50%)," +
                        "radial-gradient(at 53% 90%, hsla(204, 80%, 90%, 1) 0px, transparent 50%)," +
                        "radial-gradient(at 0% 52%, hsla(193, 100%, 91%, 1) 0px, transparent 50%)," +
                        "radial-gradient(at 54% 0%, hsla(213, 63%, 81%, 1) 0px, transparent 50%)",
                },
            };
            addUtilities(newUtilities, ["responsive", "hover"]);
        },
    ],
};
