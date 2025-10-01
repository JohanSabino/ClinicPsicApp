module.exports = {
    env: {
        browser: true,
        es2021: true,
        node: true
    },
    extends: [
        'eslint:recommended'
    ],
    parserOptions: {
        ecmaVersion: 12,
        sourceType: 'module'
    },
    rules: {
        // Indentación y formato
        'indent': ['error', 4],
        'quotes': ['error', 'single'],
        'semi': ['error', 'always'],
        
        // Variables y nomenclatura
        'no-unused-vars': 'error',
        'camelcase': 'error',
        'prefer-const': 'error',
        'no-var': 'error',
        
        // Mejores prácticas
        'no-console': 'warn',
        'no-debugger': 'error',
        'no-alert': 'warn',
        
        // Espaciado y formato
        'space-before-blocks': 'error',
        'space-in-parens': ['error', 'never'],
        'object-curly-spacing': ['error', 'always'],
        'array-bracket-spacing': ['error', 'never'],
        
        // Funciones
        'func-style': ['error', 'declaration'],
        'prefer-arrow-callback': 'error',
        
        // Comentarios
        'spaced-comment': ['error', 'always']
    },
    globals: {
        // Variables globales de Laravel/Blade
        'axios': 'readonly',
        'Alpine': 'readonly',
        'Livewire': 'readonly'
    }
};