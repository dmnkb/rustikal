module.exports = {
  extends: ['prettier', 'eslint:recommended', 'plugin:@html-eslint/recommended'],
  parser: '@typescript-eslint/parser',
  plugins: ['prettier', 'html', '@html-eslint', '@typescript-eslint'],
  rules: {
    'prettier/prettier': 'warn',
    '@html-eslint/indent': ['error', 2],
    '@typescript-eslint/no-unused-vars': [
      'warn',
      {
        argsIgnorePattern: '^_',
        varsIgnorePattern: '^_',
        caughtErrorsIgnorePattern: '^_',
      },
    ],
  },
  env: {
    browser: true,
    node: true,
  },
  overrides: [
    {
      files: ['*.html', '*.php'],
      parser: '@html-eslint/parser',
      extends: ['plugin:@html-eslint/recommended'],
      rules: {
        '@html-eslint/no-extra-spacing-attrs': 'off',
        '@html-eslint/require-closing-tags': ['warn', { selfClosing: 'always' }],
      },
    },
  ],
};
