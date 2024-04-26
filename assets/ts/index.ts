import gsap from 'gsap';

const animate = () => {
  gsap.to('.mask', { height: 0, ease: 'circ.inOut', duration: 1, delay: 0.5 });

  const headlineWords = document.querySelectorAll('h1 > span > span');

  gsap.from(headlineWords, {
    duration: 0.5,
    opacity: 0,
    delay: 0.5,
    y: 30,
    ease: 'power2.out',
    stagger: {
      each: 0.01,
      from: 'start',
    },
  });

  const heroSpecs = document.querySelectorAll('.container.specs > div');

  gsap.from(heroSpecs, {
    duration: 1,
    opacity: 0,
    delay: 0.75,
    y: 30,
    ease: 'power2.out',
    stagger: {
      each: 0.1,
      from: 'start',
    },
  });
};

document.addEventListener('DOMContentLoaded', (_event) => {
  console.log('DOM fully loaded and parsed');

  animate();
});
