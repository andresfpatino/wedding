const plugin = require('tailwindcss/plugin')

module.exports = {
    content: ["./*.php", "./*/*.php", "./assets/**/*.js"],

    theme: {
        extend: {
            colors: {
				gray: "#F3F6FD",
				grayDark: "#D6D6D6",
				dark: "#464652",
				blue: "#4F6C8A",
				rosa: "#B7797A",
				paloRosa: "#E3AFB1",
				brown: "#D0947C",
                black: "#000",
                white: "#fff",
            },

            fontFamily: {
				dancing: ['Dancing Script', 'cursive'],
                amatic: ['Amatic SC', 'cursive'],
                openSans: ['Open Sans', 'sans-serif'],
            },
            container: {
                center: true,
            },
            backgroundImage: {
                'paper' : "url('/assets/src/img/background.jpg')",
            },
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        function ({ addComponents }) {
            addComponents({
                ".container": {
                    maxWidth: "100%",
                    "@screen sm": {
                        maxWidth: "540px",
                    },
                    "@screen md": {
                        maxWidth: "720px",
                    },
                    "@screen lg": {
                        maxWidth: "960px",
                    },
                    "@screen xl": {
                        maxWidth: "1140px",
                    },
                },
            });
        },
    ],
};
