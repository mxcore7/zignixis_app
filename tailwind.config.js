/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./app/Http/Livewire/**/*.php",
        "./resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#0F3D91', // Bleu technologique
                    50: '#E6EAF4',
                    100: '#C2CDF0',
                    500: '#0F3D91',
                    600: '#0C3174',
                    900: '#051430',
                },
                secondary: {
                    DEFAULT: '#E67E22', // Orange/Or
                    500: '#E67E22',
                    600: '#D35400',
                },
                accent: {
                    DEFAULT: '#27AE60', // Vert innovation
                    500: '#27AE60',
                },
            },
            fontFamily: {
                sans: ['Inter', 'system-ui', 'sans-serif'],
                display: ['Poppins', 'sans-serif'],
            },
            container: {
                center: true,
                padding: '1rem',
                screens: {
                    sm: '640px',
                    md: '768px',
                    lg: '1024px',
                    xl: '1280px',
                    '2xl': '1536px',
                },
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
