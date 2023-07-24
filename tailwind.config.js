import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

// module.exports = {
//     darkMode: 'class',
//     content: [
//         "./resources/**/*.blade.php",
//         // "resources/views/components/sidebar.blade.php",
//         // "resources/views/components/guest-navbar.blade.php",
//         // "resources/views/welcome.blade.php",
//     ],
//     theme: {
//         extend: {},
//     },
//     plugins: [],
// }

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        "./resources/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
