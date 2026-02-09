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
    const perCharDelay = Number(el.dataset.staggerSpeed ?? '40');
    const duration = Number(el.dataset.staggerDuration ?? '500');
    const frag = document.createDocumentFragment();
    let index = 0;

    const tokens = text.split(/(\s+)/);
    let hasContent = false;

    tokens.forEach((token) => {
      if (token === '') return;

      if (token.indexOf('\n') !== -1) {
        const normalized = token.split('\n').join(' ');
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

document.addEventListener('DOMContentLoaded', (_event) => {
  onInit();
});
