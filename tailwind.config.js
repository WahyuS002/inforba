const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                montserrat: ['Montserrat'],
                dosis: ['Dosis'],
            },
            colors:{
                green:{
                    'light': '#E7FBF1',
                    'dark': '#1DBF73',
                },
                red:{
                    'light': '#FFEDEE',
                    'dark': '#FF6B72',
                },
                violet:{
                    'light': '#9898B2',
                    'middle': '#545481',
                    'dark': '#0D084D',
                },
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
