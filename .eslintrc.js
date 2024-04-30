module.exports = {
  extends: ['prettier', 'eslint:recommended'],
  parser: '@typescript-eslint/parser',
  plugins: ['prettier', '@typescript-eslint'],
  rules: {
    'prettier/prettier': 'warn',
    'no-unused-vars': [
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
  ignores: ['./dist'],
};
