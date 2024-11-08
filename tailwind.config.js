/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
            adminPrimary: '#f59b42',
            userPrimary: '#5280f2'
        },
        boxShadow: {
            productCard: "0 8px 24px 0 rgba(16, 24, 40, 0.06)",
          },
    },
  },
  plugins: [],
}

