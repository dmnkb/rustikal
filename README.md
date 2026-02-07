# Rustikal WordPress Theme (WiP 🛠)

Rustikal (German for rustic, as in "made in a plain and simple fashion.") is a fairly simple WordPress theme that aims to enable **fast deployment** of **simple client websites** on **low-cost hosters**.

### Motivation

As someone who originally came from WordPress theme development and then became a full-time React/Next.JS developer, I was looking for a simple way to build websites without <s>getStaticProps</s> bloat™️.

This theme should feel like coming home without having to give up all the good things you've come to know and love over the years working with fancier technologies. I think the cool guys call it “battery included".

TODOs:

- [x] Embed status quo into underscores (https://underscores.me/)
- [ ] Consider including sharp image optimization (https://sharp.pixelplumbing.com/)

## Development Workflow

### Dev (Vite)

1. Install dependencies:
   ```bash
   pnpm install
   ```
2. Start the dev server:
   ```bash
   pnpm dev
   ```
   This writes `.vite/dev-server` and runs Vite at `http://localhost:5173`.

WordPress will detect the dev server and load:

- `@vite/client`
- `/assets/ts/index.ts` (which imports `assets/styles/index.scss`)

### Build / Production

1. Build assets:

   ```bash
   pnpm run build
   ```

   This removes `.vite/dev-server` and generates:
   - `dist/assets/*.js`
   - `dist/assets/*.css`
   - `dist/manifest.json`

2. Deploy the theme with the `dist/` folder included.

### Fallback Behavior

If `dist/manifest.json` is missing, the theme falls back to the first `dist/assets/*.js` and `dist/assets/*.css` files it finds.

## Auto-Formatting (PHP)

This repo uses PSR-12 formatting for PHP, wired for VS Code.

### Tools

- `php-cs-fixer` for formatting
- `phpcs` for linting (PSR-12 rules)
- `phpstan` for basic static analysis (level 1)

### VS Code Setup

Recommended extensions are listed in `.vscode/extensions.json`.  
Formatting on save is configured in `.vscode/settings.json` and uses `php-cs-fixer`.

### Install & Run

```bash
composer install
composer run fix:php
composer run lint:php
composer run stan
```
