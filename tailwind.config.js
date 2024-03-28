/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    'components/**/*.htm',
  ],
  theme: {
    extend: {
      backgroundImage: {
        'cookie': 'url(../images/cookie.svg)',
      }
    },
  },
  plugins: [
    require('tailwindcss-breakpoints-inspector'),
  ],
}
