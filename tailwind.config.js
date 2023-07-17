/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./www/Views/**/*.{tpl,view,ptl}.php"],
    theme: {
        fontFamily: {
            urbanist: ['Urbanist', 'serif'],
            serif: ['Raleway', 'sans-serif'],
        },
        extend: {},
    },
    plugins: [
        require("daisyui"),
    ]
}

