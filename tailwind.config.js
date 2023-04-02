const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/**/**/*.blade.php',
    ],

    theme: {
        extend: {
            aspectRatio: {
                '4/3': '4/3'
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                inter: ['Inter']
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
