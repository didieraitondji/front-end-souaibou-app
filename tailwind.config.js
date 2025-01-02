/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.html",
    "./*.php",
    "./src/**/*.html",
    "./src/**/*.php",
    "./*.js",
    "./src/**/*.js",
    "./admin/**/*.html",
    "./admin/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        yellow: "#FFD700",
        blue: "#0047AB",
        green: "#008000",
        gray: "#A9A9A9",
      },
      fontFamily: {
        poppins: ["Grille sans", "Poppins", "sans-serif"],
      },
    },
  },
  plugins: [],
};
