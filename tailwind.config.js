
/** @type {import('tailwindcss').Config} */
 export default {
    content: ["./src/**/*.{html,js,php}"],
    theme: {
        extend: {
            colors: {
                'gris': '#F0F3F8',
                'bleu': '#0958ce',
                'beige':'#FAE8E0',

            },
            fontFamily: {
                'OpenSans': ['Open sans', 'sans-serif'],
            },
        }
    },
    plugins: [],
}
