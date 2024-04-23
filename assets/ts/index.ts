import gsap from 'gsap';

document.addEventListener('DOMContentLoaded', (_event) => {
  console.log('DOM fully loaded and parsed');

  gsap.to('.mask', { height: 0, ease: 'circ.inOut', duration: 1, delay: 0.5 });

  const words = document.querySelectorAll('h1 > span > span');

  gsap.from(words, {
    duration: 0.5,
    opacity: 0,
    delay: 2,
    y: 30,
    ease: 'power2.out',
    stagger: {
      each: 0.01,
      from: 'start',
    },
  });
});
