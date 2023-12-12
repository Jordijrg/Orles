/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./App/**/*.html",
    "./App/**/*.php",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      maxWidth: {
        '1/2': '70%',
      },
      maxHeight: {
        '128': '15rem',
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require('tailwindcss-animated')

  ],
}
