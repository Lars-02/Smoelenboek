module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            width: {
                '14/12': '120%',
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
