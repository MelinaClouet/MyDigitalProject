/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors:{
                'beige': '#FAE8E0',
                'orangeClair': '#F8B59C',
                'orange': '#FD6D2F',
                'violet': '#9C84C2'
            },
            fontFamily: {
                'OpenSans': ['Open sans', 'sans-serif'],
                'Roboto': ['Roboto', 'sans-serif'],
                'Poppins': ['Poppins', 'sans-serif'],
                'Montserrat': ['Montserrat', 'sans-serif'],
                'Caramel': ['Caramel', 'cursive'],
                'custom': ['Edu NSW ACT Foundation', 'serif'],
            },
        },
    },
    plugins: [],
}
