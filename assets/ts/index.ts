import '../styles/index.scss';

const STAGGER_EASING = 'cubic-bezier(0.2, 0.6, 0.2, 1)';
const FADE_EASING = 'cubic-bezier(0.22, 0.7, 0.2, 1)';

// MARK: Stagger Text
const getStaggerText = (el: HTMLElement): string => {
  const rawHtml = el.innerHTML;
  const normalizedHtml = rawHtml.replace(/<br\s*\/?>/gi, '\n');
  const temp = document.createElement('div');
  temp.innerHTML = normalizedHtml;
  return (temp.textContent ?? '').trim();
};

const splitTokens = (text: string): string[] => text.split(/(\s+)/);

const animateStaggerChar = (span: HTMLElement, delay: number, duration: number) => {
  span.animate(
    [
      { opacity: 0, transform: 'translateY(0.6em)' },
      { opacity: 1, transform: 'translateY(0)' },
    ],
    {
      duration,
      delay,
      easing: STAGGER_EASING,
      fill: 'both',
    },
  );
};

const appendLineBreaks = (token: string, frag: DocumentFragment, hasContent: boolean): boolean => {
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
  return hasContent;
};

const buildStaggerFragment = (
  text: string,
  baseDelay: number,
  perCharDelay: number,
  duration: number,
): DocumentFragment => {
  const frag = document.createDocumentFragment();
  const tokens = splitTokens(text);
  let index = 0;
  let hasContent = false;

  tokens.forEach((token) => {
    if (token === '') return;

    if (token.indexOf('\n') !== -1) {
      hasContent = appendLineBreaks(token, frag, hasContent);
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
      animateStaggerChar(span, baseDelay + index * perCharDelay, duration);
      index += 1;
      word.appendChild(span);
    }

    frag.appendChild(word);
    hasContent = true;
  });

  return frag;
};

const setupStagger = () => {
  const elements = document.querySelectorAll<HTMLElement>('[data-stagger]');
  if (!elements.length) return;

  elements.forEach((el) => {
    if (el.dataset.staggered === 'true') return;

    const text = getStaggerText(el);
    el.textContent = '';
    el.dataset.staggered = 'true';

    const baseDelay = Number(el.dataset.staggerDelay ?? '0');
    const perCharDelay = Number(el.dataset.staggerSpeed ?? '55');
    const duration = Number(el.dataset.staggerDuration ?? '650');

    el.appendChild(buildStaggerFragment(text, baseDelay, perCharDelay, duration));
  });
};

// MARK: Fade-In
const applyReducedFade = (el: HTMLElement) => {
  el.style.transform = 'translateY(0)';
  el.style.opacity = '1';
  el.style.clipPath = 'inset(0 0 0 0)';
};

const animateFadeIn = (el: HTMLElement, delay: number, duration: number) => {
  el.animate(
    [
      { opacity: 0, transform: 'translateY(110%)', clipPath: 'inset(0 0 100% 0)' },
      { opacity: 1, transform: 'translateY(0)', clipPath: 'inset(0 0 0 0)' },
    ],
    {
      duration,
      delay,
      easing: FADE_EASING,
      fill: 'both',
    },
  );
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
      applyReducedFade(el);
      return;
    }

    animateFadeIn(el, delay, duration);
  });
};

// MARK: Boot
document.addEventListener('DOMContentLoaded', (_event) => {
  setupStagger();
  setupFadeIn();
});
