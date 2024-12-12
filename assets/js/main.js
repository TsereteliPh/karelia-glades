"use strict";

function get_siblings(elem) {
	// for collecting siblings
	let siblings = [];
	// if no parent, return no sibling
	if (!elem.parentNode) {
		return siblings;
	}
	// first child of the parent node
	let sibling = elem.parentNode.firstChild;
	// collecting siblings
	while (sibling) {
		if (sibling.nodeType === 1 && sibling !== elem) {
			siblings.push(sibling);
		}
		sibling = sibling.nextSibling;
	}
	return siblings;
}

function slideDown(elem) {
	elem.style.maxHeight = `${elem.scrollHeight}px`;
}

function slideToggle(elem) {
	if (elem.offsetHeight === 0) {
		elem.style.maxHeight = `${elem.scrollHeight}px`;
	} else {
		elem.style.maxHeight = 0;
	}
}

function accordion() {
	const accordionHolders = document.querySelectorAll('.js-accordion');

	accordionHolders.forEach(accordion => {
		const accordionBtns = accordion.querySelectorAll('button');

		const accordionBtnsClose = () => {
			for (let btn of accordionBtns) {
				btn.classList.remove('active');
				btn.nextElementSibling.style.maxHeight = 0;
			}
		}

		accordionBtns.forEach(btn => {
			btn.addEventListener('click', function() {
				if (this.classList.contains('active')) {
					accordionBtnsClose();
				} else {
					accordionBtnsClose();
					this.classList.add('active');
					slideToggle(this.nextElementSibling);
				}
			})
		});
	});
}

function setSidebarAndHeaderScrollClass() {
	const header = document.querySelector('.header');
	const sidebar = document.querySelector('.sidebar');

	window.addEventListener('scroll', function () {
		if (window.scrollY >= header.offsetHeight) {
			sidebar.classList.add('scroll');
			header.classList.add('scroll');
		} else {
			sidebar.classList.remove('scroll');
			header.classList.remove('scroll');
		}
	});
}

function setTelMask() {
	[].forEach.call(document.querySelectorAll('[type="tel"]'), function (input) {
		let keyCode;

		function mask(event) {
			event.keyCode && (keyCode = event.keyCode);
			let pos = this.selectionStart;
			if (pos < 3) event.preventDefault();
			let matrix = "+7 (___) ___-__-__",
				i = 0,
				def = matrix.replace(/\D/g, ""),
				val = this.value.replace(/\D/g, ""),
				new_value = matrix.replace(/[_\d]/g, function (a) {
					return i < val.length ? val.charAt(i++) || def.charAt(i) : a;
				});
			i = new_value.indexOf("_");
			if (i != -1) {
				i < 5 && (i = 3);
				new_value = new_value.slice(0, i);
			}
			let reg = matrix
				.substr(0, this.value.length)
				.replace(/_+/g, function (a) {
					return "\\d{1," + a.length + "}";
				})
				.replace(/[+()]/g, "\\$&");
			reg = new RegExp("^" + reg + "$");
			if (
				!reg.test(this.value) ||
				this.value.length < 5 ||
				(keyCode > 47 && keyCode < 58)
			)
				this.value = new_value;
			if (event.type == "blur" && this.value.length < 5) this.value = "";
		}

		input.addEventListener("input", mask, false);
		input.addEventListener("focus", mask, false);
		input.addEventListener("blur", mask, false);
		input.addEventListener("keydown", mask, false);
	});
}

function sendForm() {
	document.querySelectorAll("form[name]").forEach(function (form) {
		form.addEventListener("submit", function (e) {
			e.preventDefault();
			const form = this;
			form.classList.add("loader");
			let formData = new FormData(form);
			const formName = form.name;
			const fileInput = form.querySelector("input[type=file]");

			formData.append("action", "send_mail");

			if (formName) {
				formData.append("form_name", formName);
			} else {
				return;
			}

			if (fileInput) {
				Array.from(fileInput.files).forEach((file, key) => {
					formData.append(key.toString(), file);
				});
			}

			const response = fetch(adem_ajax.url, {
				method: "POST",
				body: formData,
			})
				.then((response) => response.text())
				.then((data) => {
					form.classList.remove("loader");
					Fancybox.close(true);
					form.reset();
					setTimeout(function () {
						Fancybox.show([
							{
								src: "#success",
								type: "inline",
							},
						]);
					}, 100);
				})
				.catch((error) => {
					console.error("Error:", error);
				});
		});
	});
}

function setFileName() {
	const fileInputs = document.querySelectorAll("input[type=file]");
	if (fileInputs) {
		fileInputs.forEach(function (input) {
			input.addEventListener("change", function (e) {
				e.target.nextElementSibling.textContent = e.target.files[0].name;
			});
		});
	}
}

function tabs() {
	const tabsLists = document.querySelectorAll(".js-tabs");
	if (tabsLists) {
		tabsLists.forEach(function (tabsList) {
			bindUIFunctions(tabsList);
		});
	}

	function bindUIFunctions(tabsList) {
		tabsList.addEventListener("click", function (e) {
			const tabItem = e.target.closest("li");
			if (tabItem.classList.contains("active")) {
				toggleMobileMenu(tabItem);
			}
			if (!tabItem.classList.contains("active") && e.target !== tabsList) {
				changeTab(tabItem);
			}
		});
	}

	function changeTab(tabItem) {
		const tabContainer = document.querySelector(
			"#" + tabItem.getAttribute("data-tab")
		);

		tabItem.classList.add("active");
		get_siblings(tabItem).forEach(function (tab) {
			tab.classList.remove("active");
		});

		tabContainer.classList.add("active");
		get_siblings(tabContainer).forEach(function (tab_container) {
			tab_container.classList.remove("active");
		});

		tabItem.parentNode.classList.remove("open");
	}

	function toggleMobileMenu(tabItem) {
		tabItem.parentNode.classList.toggle("open");
	}
}

//Ajax

function showMorePosts() {
	const show_more_btn = document.querySelector(".js-show-more");

	if (!show_more_btn) return;

	show_more_btn.addEventListener("click", function (e) {
		e.stopImmediatePropagation();
		const container = document.querySelector(".js-show-more-container");
		this.classList.add("btn-show-more--loading");

		const response = fetch(adem_ajax.url, {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded;charset=UTF-8",
			},
			body: new URLSearchParams({
				action: "load_more",
				query: posts,
				page: current_page,
			}),
		})
			.then((response) => response.text())
			.then((data) => {
				this.classList.remove("btn-show-more--loading");
				container.insertAdjacentHTML("beforeend", data);
				current_page++;
				if (current_page === max_pages) this.classList.add("hidden");
			})
			.catch((error) => {
				console.error("Error:", error);
			});
	});
}

document.addEventListener("DOMContentLoaded", function () {
	accordion();

	setSidebarAndHeaderScrollClass();

	setFileName();

	sendForm();

	setTelMask();

	tabs();

	showMorePosts();
});

//Fancybox

try {
	Fancybox.bind("[data-fancybox]", {
		animated: false,
	});

	Fancybox.bind('[data-src="#order-calc"]', {
		defaultDisplay: "block",
		dragToClose: false,
	});
} catch (error) {
	console.log(error);
}

//Swiper

//Слайдер blocks/rest

const welcomeCarousel = document.querySelector('.welcome__slider');

if (welcomeCarousel) {
	let welcomeSwiper = new Swiper(welcomeCarousel, {
		slidesPerView: 1,
		spaceBetween: 0,
		speed: 1400,
		allowTouchMove: false,
		autoplay: {
			delay: 4000,
		},
		navigation: {
			nextEl: '.welcome__slider-next',
			prevEl: '.welcome__slider-prev',
		},
		pagination: {
			el: '.welcome__slider-pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true,
		}
	});
}

const universalCarousels = document.querySelectorAll('.universal-block__slider');

if (universalCarousels) {
	universalCarousels.forEach(slider => {
		let universalSwiper = new Swiper(slider, {
			slidesPerView: 1,
			spaceBetween: 20,
			autoplay: {
				delay: 4000,
			},
			navigation: {
				nextEl: slider.querySelector('.universal-block__next'),
				prevEl: slider.querySelector('.universal-block__prev'),
			},
			pagination: {
				el: slider.querySelector('.universal-block__pagination'),
				bulletClass: 'pagination__bullet',
				bulletActiveClass: 'active',
				clickable: true,
			},
			breakpoints: {
				992: {
					spaceBetween: 0,
					speed: 1400,
				},
				578: {
					slidesPerView: 2
				}
			},
			on: {
				afterInit: function () {
					if (this.isLocked) {
						this.el.querySelector('.universal-block__panel').style.display = 'none';
					}
				}
			}
		});
	});
}

const fullsizeCarousel = document.querySelector('.fullsize-slider');

if (fullsizeCarousel) {
	const fullsizeCarouselText = fullsizeCarousel.querySelector('.fullsize-slider__text');
	const fullsizeCarouselIcon = fullsizeCarousel.querySelector('.fullsize-slider__icon');

	const slidesTextChanger = (slide) => {
		fullsizeCarouselText.textContent = slide.dataset.caption;

		if (slide.dataset.icon) {
			fullsizeCarouselIcon.classList.remove('hidden');
			fullsizeCarouselIcon.setAttribute('src', slide.dataset.icon)
		} else {
			fullsizeCarouselIcon.classList.add('hidden');
		}
	}

	let fullsizeSwiper = new Swiper(fullsizeCarousel, {
		slidesPerView: 1,
		spaceBetween: 0,
		speed: 1400,
		navigation: {
			nextEl: '.fullsize-slider__next',
			prevEl: '.fullsize-slider__prev',
		},
		pagination: {
			el: '.fullsize-slider__pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true,
		},
		on: {
			afterInit: function () {
				slidesTextChanger(this.slides[this.activeIndex]);
			},
			slideChange: function () {
				slidesTextChanger(this.slides[this.activeIndex]);
			}
		}
	});
}

const advantagesCarousel = document.querySelector('.advantages__slider');

if (advantagesCarousel) {
	let advantagesSwiper = new Swiper(advantagesCarousel, {
		slidesPerView: 'auto',
		spaceBetween: 20,
		autoplay: {
			delay: 4000,
		},
		pagination: {
			el: '.advantages__slider-pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true,
		},
		breakpoints: {
			992: {
				slidesPerView: 'auto',
				spaceBetween: 0,
				speed: 1400,
			},
			578: {
				slidesPerView: 2
			}
		}
	});
}

const gallerySliderHolders = document.querySelectorAll('.gallery-slider');

if (gallerySliderHolders) {
	gallerySliderHolders.forEach(holder => {
		let galleryBigSlider = holder.querySelector('.gallery-slider__big-slider');
		let galleryThumbSlider = holder.querySelector('.gallery-slider__thumb-slider');

		let galleryThumbSwiper = new Swiper(galleryThumbSlider, {
			spaceBetween: 10,
			slidesPerView: 2,
			watchSlidesProgress: true,
			breakpoints: {
				1440: {
					spaceBetween: 100,
					slidesPerView: 4,
				},
				769: {
					slidesPerView: 4,
				},
				577: {
					slidesPerView: 3
				}
			}
		});

		let bigProductSlider = new Swiper(galleryBigSlider, {
			slidesPerView: 1,
			spaceBetween: 10,
			thumbs: {
				swiper: galleryThumbSwiper,
			}
		});
	});
}

const singleServicesCarousel = document.querySelector('.single-services--slider');

if (singleServicesCarousel) {
	let singleServicesSwiper = new Swiper(singleServicesCarousel, {
		slidesPerView: 1,
		spaceBetween: 0,
		speed: 1400,
		allowTouchMove: false,
		autoplay: {
			delay: 6000,
		},
		navigation: {
			nextEl: '.single-services__next',
			prevEl: '.single-services__prev',
		},
		pagination: {
			el: '.single-services__pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true,
		},
		on: {
			afterInit: function() {
				if (this.slides.length === this.params.slidesPerView) {
					this.el.querySelector('.single-services__panel').style.display = 'none';
				}
			}
		}
	});
}

const villasCarousel = document.querySelector('.villas-slider__slider');

if (villasCarousel) {
	let villasSwiper = new Swiper(villasCarousel, {
		slidesPerView: 'auto',
		spaceBetween: 30,
		speed: 1400,
		autoplay: {
			delay: 4000,
		},
		navigation: {
			nextEl: villasCarousel.parentNode.parentNode.querySelector('.villas-slider__next'),
			prevEl: villasCarousel.parentNode.parentNode.querySelector('.villas-slider__prev'),
		},
		pagination: {
			el: '.villas-slider__pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true,
		},
		breakpoints: {
			1440: {
				spaceBetween: 130
			},
			992: {
				speed: 1400,
			},
		}
	});
}

const villaCardCarousels = document.querySelectorAll('.villa-card__gallery');

const villaCardSwiperInit = function (slider) {
	let villasCardSwiper = new Swiper(slider, {
		slidesPerView: 1,
		resistanceRatio: 0.3,
		navigation: {
			nextEl: slider.querySelector('.villa-card__gallery-next'),
			prevEl: slider.querySelector('.villa-card__gallery-prev'),
		},
		pagination: {
			el: slider.querySelector('.villa-card__gallery-pagination'),
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true,
		},
	});
}

if (villaCardCarousels) {
	villaCardCarousels.forEach(slider => {
		villaCardSwiperInit(slider);
	});
}

const servicesCarousel = document.querySelector('.services-slider__container');

if (servicesCarousel) {
	let servicesSwiper = new Swiper(servicesCarousel, {
		slidesPerView: 'auto',
		spaceBetween: 20,
		navigation: {
			nextEl: servicesCarousel.parentNode.querySelector('.services-slider__next'),
			prevEl: servicesCarousel.parentNode.querySelector('.services-slider__prev'),
		},
		pagination: {
			el: '.services-slider__pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true,
		},
		breakpoints: {
			1440: {
				slidesPerView: 3,
				spaceBetween: 120
			},
			992: {
				slidesPerView: 3
			},
			769: {
				slidesPerView: 2,
				spaceBetween: 60
			}
		}
	});
}

const specialOffersCarousel = document.querySelector('.special-offers-slider__container');

if (specialOffersCarousel) {
	let specialOffersSwiper = new Swiper(specialOffersCarousel, {
		slidesPerView: 'auto',
		spaceBetween: 10,
		autoHeight: true,
		pagination: {
			el: '.special-offers-slider__pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true,
		},
		breakpoints: {
			1440: {
				spaceBetween: 120,
				autoHeight: false
			},
			769: {
				spaceBetween: 60,
				autoHeight: false
			},
			577: {
				spaceBetween: 30,
				autoHeight: false
			}
		}
	});
}

const imageTextCarousel = document.querySelector('.image-text-slider__container');

if (imageTextCarousel) {
	let imageTextSwiper = new Swiper(imageTextCarousel, {
		slidesPerView: 'auto',
		spaceBetween: 20,
		autoHeight: true,
		navigation: {
			nextEl: imageTextCarousel.querySelector('.image-text-slider__next'),
			prevEl: imageTextCarousel.querySelector('.image-text-slider__prev'),
		},
		breakpoints: {
			992: {
				slidesPerView: 3,
				spaceBetween: 60,
				autoHeight: false
			},
			769: {
				slidesPerView: 2,
				spaceBetween: 60,
				autoHeight: false
			},
			577: {
				slidesPerView: 'auto',
				spaceBetween: 30,
				autoHeight: false
			}
		}
	});
}

const imageCarousel = document.querySelector('.image-slider__container');

if (imageCarousel) {
	let imageTextSwiper = new Swiper(imageCarousel, {
		slidesPerView: 'auto',
		initialSlide: 2,
		centeredSlides: true,
		effect: 'creative',
		creativeEffect: {
			prev: {
				translate: [-325, 0, -150],
			},
			next: {
				translate: [325, 0, -150],
			},
			limitProgress: 5,
		},
		pagination: {
			el: '.image-slider__pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true,
		},
		breakpoints: {
			992: {
				creativeEffect: {
					prev: {
						translate: [-425, 0, -150],
					},
					next: {
						translate: [425, 0, -150],
					},
				},
				limitProgress: 5,
			}
		}
	});
}



const activityCarousel = document.querySelector('.activity-slider__slider');

if (activityCarousel) {
	let activitySwiper = new Swiper(activityCarousel, {
		slidesPerView: 'auto',
		spaceBetween: 30,
		speed: 1400,
		autoplay: {
			delay: 4000,
		},
		navigation: {
			nextEl: activityCarousel.parentNode.parentNode.querySelector('.activity-slider__next'),
			prevEl: activityCarousel.parentNode.parentNode.querySelector('.activity-slider__prev'),
		},
		pagination: {
			el: '.activity-slider__pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true,
		},
		breakpoints: {
			1440: {
				spaceBetween: 130
			},
		}
	});
}

// Функционал шапки сайта

document.addEventListener("DOMContentLoaded", function(e) {
	const header = document.querySelector('.header');

	if (header) {
		const headerBurger = header.querySelector('.header__burger');
		const headerContent = header.querySelector('.header__content');

		const dropOpener = () => {
			header.classList.add('active');
			headerBurger.classList.add('active');
			headerContent.style.maxHeight = headerContent.scrollHeight + "px";
			document.body.style.overflow = 'hidden';
		}

		const dropCloser = () => {
			header.classList.remove('active');
			headerBurger.classList.remove('active');
			headerContent.style.maxHeight = 0;
			document.body.style.overflow = 'visible';
		}

		headerBurger.addEventListener('click', function() {
			if (this.classList.contains('active')) {
				dropCloser();
			} else {
				dropOpener();
			}
		})
	}
})

//Функционал сайдбара
const sidebar = document.querySelector('.sidebar');

if (sidebar) {
	sidebar.addEventListener('mouseover', function() {
		this.classList.add('active');
	});

	sidebar.addEventListener('mouseout', function() {
		this.classList.remove('active');
	});
}

// Передача услуги в модальное окно на страницы услуги

const serviceModalBtns = document.querySelectorAll('.js-service-button');

if (serviceModalBtns) {
	const singUpModalInput = document.querySelector('.js-service-input');

	serviceModalBtns.forEach(btn => {
		btn.addEventListener('click', () => {
			singUpModalInput.value = btn.dataset.service;
		});
	});
}

//Функционал блока .services__list

const servicesMoreBtns = document.querySelectorAll('.services__item-more');

if (servicesMoreBtns && (window.innerWidth <= 768)) {
	servicesMoreBtns.forEach(btn => {
		btn.addEventListener('click', function () {
			const servicesMoreContainer = btn.parentNode.querySelector('.services__item-dropdown');
			const servicesMoreBtnText = this.querySelector('.services__item-more-text');

			if (this.classList.contains('active')) {
				this.classList.remove('active');
				servicesMoreBtnText.innerHTML = 'Развернуть';
				servicesMoreContainer.classList.remove('active');
				slideToggle(servicesMoreContainer);
			} else {
				this.classList.add('active');
				servicesMoreBtnText.innerHTML = 'Свернуть';
				servicesMoreContainer.classList.add('active');
				slideDown(servicesMoreContainer);
			}
		});
	});
}

// Ajax загрузка категорий кастом постов villas

const villasCatBtns = document.querySelectorAll('.villas__cat');

if (villasCatBtns) {
	const villasList = document.querySelector('.villas__list');

	const checkMaxPages = async () =>
		await fetch(adem_ajax.url, {
			method: 'POST',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
			},
			body: new URLSearchParams({
				action: 'max_pages',
				query: posts,
			}),
		});

	villasCatBtns.forEach(btn => {
		btn.addEventListener('click', function() {
			const villasItems = villasList.querySelectorAll('.villas__item');
			const showMoreBtn = document.querySelector('.js-show-more');

			villasItems.forEach(item => item.classList.add('loader'));
			showMoreBtn.classList.add('hidden');

			const newQuery = JSON.parse(posts);
			newQuery['villa-category'] = this.dataset.slug;
			newQuery['term'] = this.dataset.slug;
			current_page = 1;
			posts = JSON.stringify(newQuery);

			const response = fetch(adem_ajax.url, {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
				},
				body: new URLSearchParams({
					action: 'load_cat',
					query: posts,
				}),
			})
				.then(response => response.text())
				.then(data => {
					for (let btn of villasCatBtns) {
						btn.classList.remove('active');
					}

					this.classList.add('active');

					villasList.innerHTML = data;

					const sliders = villasList.querySelectorAll('.swiper');

					if (sliders) {
						sliders.forEach(slider => {
							villaCardSwiperInit(slider);
						});
					}

					checkMaxPages()
						.then(response => response.text())
						.then(data => {
							max_pages = Number(data);

							if (max_pages === current_page) {
								showMoreBtn.classList.add('hidden');
							} else {
								showMoreBtn.classList.remove('hidden');
							}
						})
						.catch(error => {
							console.error('Error:', error);
						});
				})
				.catch((error) => {
					console.error('Error:', error);
				});
		});
	})
}

// Логика появления блока Travelline на главной странице

const travelline = document.querySelector('.js-travelline');

if (travelline && window.innerWidth > 768) {
	const travellineOpenBtn = document.querySelector('.welcome__travelline-open');
	const travellineCloseBtn = document.querySelector('.welcome__travelline-close');

	const travellineOpener = () => {
		travelline.classList.add('active');
        travellineOpenBtn.classList.remove('active');
	}

	const travellineCloser = () => {
		travelline.classList.remove('active');
        travellineOpenBtn.classList.add('active');
	}

	travellineOpenBtn.onclick = () => travellineOpener();

	travellineCloseBtn.onclick = () => travellineCloser();

	setTimeout(() => {
		travellineOpener();
	}, 500);
}
