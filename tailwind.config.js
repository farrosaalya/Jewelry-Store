import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'
import colors from 'tailwindcss/colors'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/filament/**/*.blade.php',
        './resources/views/**/*.blade.php',
        './resources/views/filament/**/*.blade.php',
        './resources/css/**/*.css',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: {
                    50: '#E7E9EF',
                    100: '#C2C9D6',
                    200: '#9AA5BB',
                    300: '#7281A0',
                    400: '#4F648C',
                    500: '#2C4875',
                    600: '#1A325E',
                    700: '#0D2147',
                    800: '#061332',
                    900: '#02081D',
                },
                success: colors.emerald,
                warning: colors.orange,
                gold: {
                    50: '#FDF9E7',
                    100: '#FCF3CF',
                    200: '#F9E79F',
                    300: '#F7DA6F',
                    400: '#F4CE3F',
                    500: '#F1C40F',
                    600: '#C19D0C',
                    700: '#917609',
                    800: '#614E06',
                    900: '#302703',
                },
                navy: {
                    50: '#E7E9EF',
                    100: '#C2C9D6',
                    200: '#9AA5BB',
                    300: '#7281A0',
                    400: '#4F648C',
                    500: '#2C4875',
                    600: '#1A325E',
                    700: '#0D2147',
                    800: '#061332',
                    900: '#02081D',
                }
            },
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
                'playfair': ['"Playfair Display"', 'serif'],
                'inter': ['Inter', 'sans-serif'],
            },
        },
    },
    plugins: [
        forms,
        typography,
        require('@tailwindcss/aspect-ratio'),
    ],
} 