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
        primary: {
          light: '#60A5FA',  // azul claro
          DEFAULT: '#3B82F6', // azul base
          dark: '#1E40AF',   // azul oscuro
        },
        secondary: {
          light: '#A78BFA',  // morado claro
          DEFAULT: '#8B5CF6', // morado base
          dark: '#5B21B6',   // morado oscuro
        },
        success: {
          light: '#BBF7D0',
          DEFAULT: '#22C55E',
          dark: '#166534',
        },
        warning: {
          light: '#FEF3C7',
          DEFAULT: '#FACC15',
          dark: '#A16207',
        },
        danger: {
          light: '#FECACA',
          DEFAULT: '#EF4444',
          dark: '#991B1B',
        },
      },
    },
  },
  plugins: [],
}
