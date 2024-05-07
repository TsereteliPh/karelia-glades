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

function setHeaderScrollClass() {
	const header = document.querySelector(".header");

	window.addEventListener("scroll", function () {
		if (window.scrollY >= header.offsetHeight) {
			header.classList.add("scroll");
		} else {
			header.classList.remove("scroll");
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

	setHeaderScrollClass();

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
			bulletActiveClass: 'active'
		}
	});
}

const aboutCarousel = document.querySelector('.about__slider');

if (aboutCarousel) {
	let aboutSwiper = new Swiper(aboutCarousel, {
		slidesPerView: 'auto',
		spaceBetween: 20,
		autoplay: {
			delay: 4000,
		},
		pagination: {
			el: '.about__slider-pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active'
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

const videoCarousel = document.querySelector('.video');

if (videoCarousel) {
	let videoSwiper = new Swiper(videoCarousel, {
		slidesPerView: 1,
		spaceBetween: 0,
		speed: 1400,
		navigation: {
			nextEl: '.video__next',
			prevEl: '.video__prev',
		},
		pagination: {
			el: '.video__pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active'
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
			bulletActiveClass: 'active'
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
			bulletActiveClass: 'active'
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
		autoHeight: true,
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
			bulletActiveClass: 'active'
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
			bulletActiveClass: 'active'
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
