/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  theme: {
    extend: {
      colors: {
        "dark-berry": "#2C1A32"
      }
    },
  },
  plugins: [require('daisyui')],
  daisyui: {
    prefix: 'kuncie-'
  }
}
