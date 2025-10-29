/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require("@tailwindcss/forms"),
    require("daisyui"),
  ],
  daisyui: {
    themes: ["business", "dark", "light"], // estilo fintech Astropay
  },
};
