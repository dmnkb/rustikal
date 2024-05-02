import gsap from 'gsap';
import Alpine from 'alpinejs';

const animate = () => {
  gsap.to('.mask', { height: 0, ease: 'circ.inOut', duration: 1, delay: 0.5 });

  const headlineWords = document.querySelectorAll('h1 > span > span');

  gsap.from(headlineWords, {
    duration: 1.25,
    opacity: 0,
    delay: 1.5,
    y: 60,
    ease: 'power4.out',
    stagger: {
      each: 0.03,
      from: 'start',
    },
  });
};

const onMenuOpen = () => {
  const navItems = document.querySelectorAll('.menu nav li');

  gsap.from(navItems, {
    duration: 1.25,
    opacity: 0,
    delay: 0.125,
    y: 60,
    ease: 'power4.out',
    stagger: {
      each: 0.03,
      from: 'start',
    },
  });
};

document.addEventListener('DOMContentLoaded', (_event) => {
  console.log('DOM fully loaded and parsed');

  Alpine.start();

  // animate();

  document.addEventListener('onMenuOpen', onMenuOpen);
});
