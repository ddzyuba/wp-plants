import domReady from '@wordpress/dom-ready';
import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

domReady(() => {
  const containers = document.querySelectorAll('.wp-block-plants-testimonials');

  if (containers) {
    containers.forEach((container) => {
      const swiperSelector = container.querySelector('.swiper');

      const swiper = new Swiper(swiperSelector, {
				modules: [Navigation],
				slidesPerView: 1,
				spaceBetween: 30,
				navigation: {
					nextEl: container.querySelector('.swiper-button-next'),
					prevEl: container.querySelector('.swiper-button-prev'),
				},
				breakpoints: {
					768: {
						slidesPerView: 2,
					}
				},
			});
    });
  }
});

