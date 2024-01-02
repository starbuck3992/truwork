module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*{.js,.ts,.vue}',
    ],
    darkMode: 'class', // or 'media' or 'class'
    theme: {
        extend: {
            transitionDuration: {
                '2000': '2000ms',
                '3000': '3000ms',
                '4000': '4000ms',
            },
            zIndex: {
                '75': '75',
                '100': '100',
            },
            height: {
                '128': '32rem',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
    ],
}
