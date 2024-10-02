/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./app/Modules/**/*.blade.php",
    "./node_modules/flowbite/**/*.js",
    "./resources/*"
  ],
  theme: {
    extend: {
        fontFamily: {
            sans: ['Mona-Sans-Light', 'sans-serif'],
        },
        colors: {
            // 'crystawall-dark': "#121212",
            'crystawall-dark': "#000",
            'crystawall-blue': '#72BBEF',
            'crystawall-outline': '#D9D9D9',
            'crystawall-light': '#CCCCCC',
            'crystawall-hero-hr': '#313131',
        },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
