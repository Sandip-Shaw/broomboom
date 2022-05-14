(function () {
	'use strict';

	let heroCarouselIndicators = document.querySelector('#hero-carousel-indicators');
	let heroCarouselItems = document.querySelectorAll('#heroCarousel .carousel-item');

	heroCarouselItems.forEach((item, index) => {
		index === 0
			? (heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "' class='active'></li>")
			: (heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "'></li>");
	});

	// aos
	window.addEventListener('load', () => {
		AOS.init({
			duration: 900,
			easing: 'ease-in-out',
			once: true,
		});
	});

	new Swiper('.slider', {
		speed: 500,
		loop: true,
		autoplay: {
			delay: 7000,
			disableOnInteraction: false,
		},
		slidesPerView: 'auto',
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true,
		},
	});
})();
