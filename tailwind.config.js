/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/views/livewire/*.blade.php",
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
        "./vendor/masmerise/livewire-toaster/resources/views/*.blade.php",
    ],
    theme: {
        extend: {},
    },
    daisyui: {
        themes: [
            {
                mytheme: {
                    primary: "#00812f",
                    secondary: "#00c9ff",
                    accent: "#0000ff",
                    neutral: "#000801",
                    "base-100": "#242329", // Cor do Input
                    "base-200": "#242329", //Cor x-slot
                    info: "#00dfff",
                    success: "#009464",
                    warning: "#ffd700",
                    error: "#ff374b",
                },
            },
        ],
    },
    plugins: [require("daisyui")],
};
