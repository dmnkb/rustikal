import gsap from 'gsap';
import Alpine from 'alpinejs';

const animate = () => {
	// animation code
};

const onMenuOpen = () => {
	const navItems = document.querySelectorAll('.menu nav li');

	gsap.set(navItems, { opacity: 1, y: 0 });

	gsap.from(navItems, {
		duration: 1.25,
		opacity: 0,
		delay: 0.125,
		y: 60,
		ease: 'power4.out',
		stagger: {
			each: 0.1,
			from: 'start',
		},
	});
};

const onMenuClose = () => {
	const navItems = document.querySelectorAll('.menu nav li');

	gsap.to(navItems, {
		duration: 0.5,
		opacity: 0,
		y: -100,
		ease: 'power4.in',
		stagger: {
			each: 0.1,
			from: 'start',
		},
	});
};

document.addEventListener('DOMContentLoaded', (_event) => {
	console.log('DOM fully loaded and parsed');

	Alpine.start();

	animate();

	document.addEventListener('onMenuOpen', onMenuOpen);
	document.addEventListener('onMenuClose', onMenuClose);
});
