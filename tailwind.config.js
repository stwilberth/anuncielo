import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                amethyst: {
                    50: '#f9f6fe',
                    100: '#f2ebfc',
                    200: '#e7dafa',
                    300: '#d4bdf5',
                    400: '#ba92ee',
                    500: '#975be1',
                    600: '#8949d4',
                    700: '#7537b9',
                    800: '#623198',
                    900: '#51297a',
                    950: '#351259',
                },
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
