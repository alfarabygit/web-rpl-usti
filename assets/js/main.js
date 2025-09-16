/*=============== SHOW MENU ===============*/
const showMenu = (toogleId, navId) => {
  const toggle = document.getElementById(toogleId),
    nav = document.getElementById(navId);

  toggle.addEventListener("click", () => {
    //add show menu class to nav menu
    nav.classList.toggle("show-menu");
    //add show and hide menu icon
    toggle.classList.toggle("show-icon");
  });
};

showMenu("nav-toggle", "nav-menu");

/*=============== SWIPER HOME ===============*/
const swiperHome = new Swiper(".home__swiper", {
  loop: true,
  slidesPerView: "auto",

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
});

/*=============== NEWS SWIPER ===============*/
let swiperCards = new Swiper(".news__content", {
  loop: true,
  spaceBetween: 32,
  grabCursor: true,
  speed: 5000,
  slidesPerView: "auto",
  pagination: {
    el: ".swiper-pagination",
  },
  autoplay: {
    delay: 1,
    disableOnInteraction: false,
  },
  breakpoints: {
    576: {
      slidesPerView: 2,
    },
    968: {
      slidesPerView: 3,
    },
  },
});

/*==================== SCROLL REVEAL ANIMATION ====================*/
const sr = ScrollReveal({
  distance: "60px",
  duration: 2800,
  // reset: true,
});

sr.reveal(`.home__data, .home__swiper, .banner__container, .info__container, .form__container, .tik__container, .sisfo__container, .tifo__container, .news__container, .footer__logo, .footer__data, .footer__rights`, {
  origin: "top",
  interval: 100,
});

sr.reveal(`.about__data `, {
  origin: "left",
  interval: 100,
});

sr.reveal(`.about__img-overlay`, {
  origin: "right",
  interval: 100,
});
