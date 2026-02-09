import '../styles/index.scss';

const onInit = () => {
  const staggeredElements = document.querySelectorAll<HTMLElement>('[data-stagger]');
  if (!staggeredElements.length) return;

  staggeredElements.forEach((el) => {
    if (el.dataset.staggered === 'true') return;

    const rawHtml = el.innerHTML;
    const normalizedHtml = rawHtml.replace(/<br\s*\/?>/gi, '\n');
    const temp = document.createElement('div');
    temp.innerHTML = normalizedHtml;
    const text = (temp.textContent ?? '').trim();
    el.textContent = '';
    el.dataset.staggered = 'true';

    const baseDelay = Number(el.dataset.staggerDelay ?? '0');
    const perCharDelay = Number(el.dataset.staggerSpeed ?? '55');
    const duration = Number(el.dataset.staggerDuration ?? '650');
    const frag = document.createDocumentFragment();
    let index = 0;

    const tokens = text.split(/(\s+)/);
    let hasContent = false;

    tokens.forEach((token) => {
      if (token === '') return;

      if (token.indexOf('\n') !== -1) {
        const parts = token.split('\n');
        parts.forEach((part, partIndex) => {
          if (part !== '') {
            frag.appendChild(document.createTextNode(part));
            if (part.trim() !== '') hasContent = true;
          }
          if (partIndex < parts.length - 1 && hasContent) {
            frag.appendChild(document.createElement('br'));
            hasContent = false;
          }
        });
        return;
      }

      if (token.trim() === '') {
        frag.appendChild(document.createTextNode(token));
        return;
      }

      const word = document.createElement('span');
      word.style.display = 'inline-block';

      for (const ch of token) {
        const span = document.createElement('span');
        span.textContent = ch;
        span.style.display = 'inline-block';
        span.style.willChange = 'transform, opacity';

        span.animate(
          [
            { opacity: 0, transform: 'translateY(0.6em)' },
            { opacity: 1, transform: 'translateY(0)' },
          ],
          {
            duration,
            delay: baseDelay + index * perCharDelay,
            easing: 'cubic-bezier(0.2, 0.6, 0.2, 1)',
            fill: 'both',
          },
        );
        index += 1;

        word.appendChild(span);
      }

      frag.appendChild(word);
      hasContent = true;
    });

    el.appendChild(frag);
  });
};

const setupFadeIn = () => {
  const elements = document.querySelectorAll<HTMLElement>('[data-fade-in]');
  if (!elements.length) return;

  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  elements.forEach((el) => {
    const delay = Number(el.dataset.fadeDelay ?? '0');
    const duration = Number(el.dataset.fadeDuration ?? '720');

    el.style.display = 'inline-block';
    el.style.willChange = 'transform, opacity, clip-path';
    el.style.clipPath = 'inset(0 0 100% 0)';

    if (prefersReduced) {
      el.style.transform = 'translateY(0)';
      el.style.opacity = '1';
      el.style.clipPath = 'inset(0 0 0 0)';
      return;
    }

    el.animate(
      [
        { opacity: 0, transform: 'translateY(110%)', clipPath: 'inset(0 0 100% 0)' },
        { opacity: 1, transform: 'translateY(0)', clipPath: 'inset(0 0 0 0)' },
      ],
      {
        duration,
        delay,
        easing: 'cubic-bezier(0.22, 0.7, 0.2, 1)',
        fill: 'both',
      },
    );
  });
};

document.addEventListener('DOMContentLoaded', (_event) => {
  onInit();
  setupFadeIn();
});
