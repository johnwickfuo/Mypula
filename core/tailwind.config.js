/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                orbitron: ['Orbitron', 'sans-serif'],
            },
            backgroundImage: {
                'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
            },
            animation: {
                wiggle: 'wiggle 1s ease-in-out infinite',
            },
            keyframes: {
                wiggle: {
                    '0%, 100%': { transform: 'rotate(-3deg)' },
                    '50%': { transform: 'rotate(3deg)' },
                },
            },
        },
    },
    // Gradient color-stops used in data-driven arrays (home module cards);
    // safelisted so a scanner change can never drop them.
    safelist: [
        'from-pink-500', 'to-fuchsia-600',
        'from-emerald-500', 'to-green-600',
        'from-sky-500', 'to-blue-600',
        'from-amber-500', 'to-orange-600',
        'from-yellow-400', 'to-amber-600',
        'from-indigo-500', 'to-blue-700',
        'from-violet-500', 'to-purple-700',
        'from-yellow-500', 'to-amber-700',
    ],
    plugins: [],
};
