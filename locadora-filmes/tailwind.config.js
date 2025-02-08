import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
          'primary': '#2563eb',
          'secondary': '#16a34a',
          'danger': '#dc2626',
        },
        spacing: {
          '128': '32rem',
        }
      },
    },
    plugins: [
      require('@tailwindcss/forms'),
    ],
  }
